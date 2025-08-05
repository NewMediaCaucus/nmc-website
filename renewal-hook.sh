#!/bin/bash

# Certbot renewal hook script for NMC Website
# This script is called by Certbot after successful certificate renewal

set -e

# Function to log messages
log() {
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] Renewal Hook: $1"
}

# Log the renewal event
log "Certificate renewal completed successfully"

# Reload Apache to pick up the new certificates
log "Reloading Apache to apply new certificates..."
if docker exec nmc-website-prod-container apachectl -k graceful; then
    log "Apache reloaded successfully"
else
    log "Warning: Failed to reload Apache"
    exit 1
fi

log "Renewal hook completed successfully" 