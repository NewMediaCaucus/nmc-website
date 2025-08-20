#!/bin/bash

# Certbot renewal script for NMC Website
# This script runs certbot renew and reloads Apache if certificates are renewed

set -e

# Function to log messages
log() {
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] $1"
}

# Function to reload Apache
reload_apache() {
    log "Reloading Apache..."
    if docker exec nmc-website-prod-container apachectl -k graceful; then
        log "Apache reloaded successfully"
    else
        log "Warning: Failed to reload Apache"
        return 1
    fi
}

# Function to check if certificates were renewed
check_renewal() {
    local cert_dir="/etc/letsencrypt/live/newmediacaucus.org"
    local cert_file="$cert_dir/fullchain.pem"
    
    if [ -f "$cert_file" ]; then
        # Get the modification time of the certificate
        local cert_mtime=$(stat -c %Y "$cert_file" 2>/dev/null || stat -f %m "$cert_file" 2>/dev/null)
        local current_time=$(date +%s)
        local time_diff=$((current_time - cert_mtime))
        
        # If certificate was modified in the last 5 minutes, it was likely renewed
        if [ $time_diff -lt 300 ]; then
            return 0  # Certificate was renewed
        fi
    fi
    
    return 1  # Certificate was not renewed
}

# Function to run renewal
run_renewal() {
    log "Starting Certbot renewal process..."
    
    # Run certbot renew
    if certbot renew --webroot --webroot-path=/var/www/html --force-renewal --config-dir /etc/letsencrypt --logs-dir /var/log/letsencrypt; then
        log "Certbot renewal completed"
        
        # Check if certificates were actually renewed
        if check_renewal; then
            log "Certificates were renewed, reloading Apache"
            reload_apache
        else
            log "No certificates were renewed, skipping Apache reload"
        fi
    else
        log "Certbot renewal failed"
        return 1
    fi
    
    log "Renewal process completed"
}

# Main loop
log "Certbot renewal service started"

# Trap SIGTERM to exit gracefully
trap 'log "Received SIGTERM, shutting down..."; exit 0' TERM

# Continuous renewal loop
while true; do
    # Run renewal
    if run_renewal; then
        log "Renewal cycle completed successfully"
    else
        log "Renewal cycle failed, will retry in 12 hours"
    fi
    
    # Sleep for 12 hours (43200 seconds)
    log "Sleeping for 12 hours until next renewal..."
    sleep 43200 &
    wait $!
done 