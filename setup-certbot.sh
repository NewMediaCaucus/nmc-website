#!/bin/bash

# Certbot setup script for NMC Website
# This script helps with initial Certbot setup and certificate acquisition

set -e

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Function to log messages with colors
log() {
    echo -e "${GREEN}[$(date '+%Y-%m-%d %H:%M:%S')]${NC} $1"
}

warn() {
    echo -e "${YELLOW}[$(date '+%Y-%m-%d %H:%M:%S')] WARNING:${NC} $1"
}

error() {
    echo -e "${RED}[$(date '+%Y-%m-%d %H:%M:%S')] ERROR:${NC} $1"
}

# Function to check if Docker is running
check_docker() {
    if ! docker info > /dev/null 2>&1; then
        error "Docker is not running. Please start Docker and try again."
        exit 1
    fi
    log "Docker is running"
}

# Function to check if domain is accessible
check_domain() {
    local domain="newmediacaucus.org"
    log "Checking if domain $domain is accessible..."
    
    if curl -s -I "http://$domain" > /dev/null 2>&1; then
        log "Domain $domain is accessible"
    else
        warn "Domain $domain is not accessible. Make sure DNS is configured correctly."
        read -p "Continue anyway? (y/N): " -n 1 -r
        echo
        if [[ ! $REPLY =~ ^[Yy]$ ]]; then
            exit 1
        fi
    fi
}

# Function to create necessary directories
create_directories() {
    log "Creating necessary directories..."
    
    sudo mkdir -p /etc/letsencrypt
    sudo mkdir -p letsencrypt-logs
    sudo mkdir -p letsencrypt-work
    
    # Set proper permissions
    sudo chown -R root:root /etc/letsencrypt
    sudo chmod -R 755 /etc/letsencrypt
    sudo chown -R root:root letsencrypt-logs
    sudo chmod -R 755 letsencrypt-logs
    
    log "Directories created and permissions set"
}

# Function to build Certbot image
build_certbot() {
    log "Building Certbot Docker image..."
    
    if docker build -f Dockerfile.certbot -t nmc-website-certbot .; then
        log "Certbot image built successfully"
    else
        error "Failed to build Certbot image"
        exit 1
    fi
}

# Function to start production environment
start_production() {
    log "Starting production environment..."
    
    if sudo docker compose -f docker-compose.prod.yml up --build -d; then
        log "Production environment started successfully"
    else
        error "Failed to start production environment"
        exit 1
    fi
}

# Function to check container status
check_containers() {
    log "Checking container status..."
    
    if sudo docker ps | grep -q "certbot"; then
        log "Certbot container is running"
    else
        error "Certbot container is not running"
        return 1
    fi
    
    if sudo docker ps | grep -q "nmc-website-prod-container"; then
        log "Web server container is running"
    else
        error "Web server container is not running"
        return 1
    fi
}

# Function to check certificate status
check_certificates() {
    log "Checking certificate status..."
    
    if sudo docker exec certbot certbot certificates; then
        log "Certificates are properly configured"
    else
        warn "No certificates found or certificates are invalid"
        return 1
    fi
}

# Function to show logs
show_logs() {
    log "Recent Certbot logs:"
    sudo docker logs certbot --tail 20
}

# Main setup process
main() {
    log "Starting Certbot setup for NMC Website..."
    
    # Check prerequisites
    check_docker
    check_domain
    
    # Create directories
    create_directories
    
    # Build Certbot image
    build_certbot
    
    # Start production environment
    start_production
    
    # Wait a moment for containers to start
    log "Waiting for containers to start..."
    sleep 10
    
    # Check container status
    if check_containers; then
        log "All containers are running"
    else
        error "Some containers failed to start"
        show_logs
        exit 1
    fi
    
    # Check certificates
    if check_certificates; then
        log "Setup completed successfully!"
        log "Your website should now be accessible with HTTPS"
    else
        warn "Certificates may not be properly configured"
        log "Check the logs below for more information:"
        show_logs
        log "You may need to manually obtain certificates"
    fi
    
    log "Setup process completed"
}

# Run main function
main "$@" 