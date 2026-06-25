#!/bin/bash

# Certbot renewal script for NMC Website
# Runs certbot renew on a schedule; deploy-hook reloads Apache when certs change.

set -e

WEB_CONTAINER="nmc-website-prod-container"

log() {
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] $1"
}

webserver_running() {
    docker ps --format '{{.Names}}' 2>/dev/null | grep -qx "$WEB_CONTAINER"
}

run_renewal() {
    log "Starting Certbot renewal process..."

    if ! webserver_running; then
        log "Warning: $WEB_CONTAINER is not running; HTTP-01 renewal will fail until it is up"
    fi

    if certbot renew \
        --webroot \
        --webroot-path=/var/www/html \
        --config-dir /etc/letsencrypt \
        --logs-dir /var/log/letsencrypt \
        --deploy-hook /scripts/renewal-hook.sh; then
        log "Certbot renewal check completed"
        return 0
    fi

    log "Certbot renewal failed"
    return 1
}

log "Certbot renewal service started"

trap 'log "Received SIGTERM, shutting down..."; exit 0' TERM

while true; do
    if run_renewal; then
        log "Renewal cycle completed successfully"
    else
        log "Renewal cycle failed, will retry in 12 hours"
    fi

    log "Sleeping for 12 hours until next renewal check..."
    sleep 43200 &
    wait $!
done
