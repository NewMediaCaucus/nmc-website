#!/bin/bash

# Certbot deploy-hook: reload Apache after a successful certificate renewal.

set -e

WEB_CONTAINER="nmc-website-prod-container"

log() {
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] Renewal Hook: $1"
}

log "Certificate renewal completed successfully"
log "Reloading Apache to apply new certificates..."

if ! docker ps --format '{{.Names}}' 2>/dev/null | grep -qx "$WEB_CONTAINER"; then
    log "Warning: $WEB_CONTAINER is not running; cannot reload Apache"
    exit 0
fi

if docker exec "$WEB_CONTAINER" apachectl -k graceful; then
    log "Apache reloaded successfully"
else
    log "Warning: Failed to reload Apache (new certs are on disk; restart web container if needed)"
fi

log "Renewal hook completed"
