# Certbot SSL Certificate Management

This document explains how SSL certificates are managed for the New Media Caucus website using Certbot and Docker.

## Overview

The website uses Let's Encrypt SSL certificates managed by Certbot running in a Docker container. The setup includes:

- Automatic certificate renewal
- Apache reload after certificate renewal
- Proper logging and error handling
- Integration with the main web server container

## File Structure

```
├── Dockerfile.certbot          # Certbot container definition
├── certbot-renew.sh           # Main renewal script
├── renewal-hook.sh            # Post-renewal hook script
├── setup-certbot.sh           # Automated setup script
├── docker-compose.prod.yml    # Production Docker Compose config
├── letsencrypt-logs/          # Certbot log files
└── letsencrypt-work/          # Certbot working directory
```

## Initial Setup

### 1. Prerequisites

- Docker and Docker Compose installed
- Domain pointing to your server (newmediacaucus.org)
- Ports 80 and 443 open on your server
- Docker socket access for container communication

### 2. First-Time Certificate Acquisition

To obtain SSL certificates for the first time:

```bash
# Build and start the production environment
sudo docker compose -f docker-compose.prod.yml up --build -d

# Check if containers are running
sudo docker ps

# View Certbot logs
sudo docker logs certbot
```

### 3. Manual Certificate Acquisition (if needed)

If automatic certificate acquisition fails, you can manually obtain certificates:

```bash
# Stop the certbot container
sudo docker stop certbot

# Run certbot manually for initial certificate
sudo docker run --rm \
  -v /etc/letsencrypt:/etc/letsencrypt \
  -v ./letsencrypt-logs:/var/log/letsencrypt \
  -v /var/run/docker.sock:/var/run/docker.sock \
  --network nmc-website_webnet \
  nmc-website-certbot \
  certbot certonly \
  --webroot \
  --webroot-path=/var/www/html \
  --email admin@newmediacaucus.org \
  --agree-tos \
  --no-eff-email \
  --domains newmediacaucus.org

# Restart the certbot container
sudo docker start certbot
```

## Automatic Renewal

The Certbot container is configured to automatically renew certificates every 12 hours. The renewal process:

1. Checks if certificates need renewal
2. Renews certificates if necessary
3. Reloads Apache to apply new certificates
4. Logs all activities

### Renewal Process

The renewal is handled by `certbot-renew.sh` which:

- Runs `certbot renew` with force-renewal flag
- Checks if certificates were actually renewed
- Reloads Apache only if certificates were renewed
- Provides detailed logging

### Monitoring Renewals

Check renewal status:

```bash
# View recent logs
sudo docker logs certbot --tail 50

# Check certificate expiration
sudo docker exec certbot certbot certificates

# View renewal logs
sudo tail -f letsencrypt-logs/letsencrypt.log
```

## Troubleshooting

### Common Issues

#### 1. Certificate Renewal Fails

```bash
# Check Certbot logs
sudo docker logs certbot

# Check if domain is accessible
curl -I http://newmediacaucus.org/.well-known/acme-challenge/

# Verify DNS settings
nslookup newmediacaucus.org
```

#### 2. Apache Not Reloading

```bash
# Check if Apache container is running
sudo docker ps | grep nmc-website-prod-container

# Test Apache reload manually
sudo docker exec nmc-website-prod-container apachectl -k graceful

# Check Apache logs
sudo docker logs nmc-website-prod-container
```

#### 3. Permission Issues

```bash
# Check file permissions
ls -la /etc/letsencrypt/
ls -la letsencrypt-logs/

# Fix permissions if needed
sudo chown -R root:root /etc/letsencrypt/
sudo chmod -R 755 /etc/letsencrypt/
```

#### 4. Container Restarting Issues

If the certbot container keeps restarting with "unrecognized arguments" errors:

```bash
# Check if the image was built correctly
sudo docker inspect nmc-website-certbot | grep -A 5 -B 5 "Cmd"

# Force rebuild the image
sudo docker build --no-cache -f Dockerfile.certbot -t nmc-website-certbot .

# Remove and recreate the container
sudo docker rm -f certbot
sudo docker run -d \
  --name certbot \
  --network nmc-website_webnet \
  -v /etc/letsencrypt:/etc/letsencrypt \
  -v ./letsencrypt-logs:/var/log/letsencrypt \
  -v /var/run/docker.sock:/var/run/docker.sock \
  -e DOMAIN=newmediacaucus.org \
  -e EMAIL=admin@newmediacaucus.org \
  --restart unless-stopped \
  nmc-website-certbot
```

#### 5. Network Issues

If you get "network not found" errors:

```bash
# Check existing networks
sudo docker network ls

# Check what network your containers are using
sudo docker inspect nmc-website-prod-container | grep -A 5 -B 5 "NetworkMode"

# Use the correct network name (usually project_name_webnet)
sudo docker run -d \
  --name certbot \
  --network nmc-website_webnet \
  # ... rest of your run command
```

### Manual Renewal

If automatic renewal isn't working, you can manually renew:

```bash
# Stop the certbot container
sudo docker stop certbot

# Run manual renewal
sudo docker run --rm \
  -v /etc/letsencrypt:/etc/letsencrypt \
  -v ./letsencrypt-logs:/var/log/letsencrypt \
  -v /var/run/docker.sock:/var/run/docker.sock \
  --network nmc-website_webnet \
  nmc-website-certbot \
  /bin/bash /scripts/certbot-renew.sh

# Restart the certbot container
sudo docker start certbot
```

## Configuration Files

### Dockerfile.certbot

The Certbot container is built from a custom Dockerfile that:

- Uses the official certbot/certbot image
- Installs additional tools (curl, bash)
- Copies renewal scripts
- **IMPORTANT**: Overrides the ENTRYPOINT from the base image with `ENTRYPOINT []`
- Sets up proper permissions

**Key Fix**: The base certbot image has an ENTRYPOINT set to `certbot`, which was causing our CMD to be passed as arguments to certbot instead of being executed directly. The `ENTRYPOINT []` line fixes this issue.

### certbot-renew.sh

The main renewal script that:

- Runs certbot renew with proper flags
- Checks if certificates were actually renewed
- Reloads Apache only when necessary
- Provides comprehensive logging
- Runs in a continuous loop with 12-hour intervals

### renewal-hook.sh

A post-renewal hook that:

- Is called by Certbot after successful renewal
- Reloads Apache to apply new certificates
- Logs the renewal process

## Security Considerations

1. **Certificate Storage**: Certificates are stored in `/etc/letsencrypt/` which is mounted as a volume
2. **Log Files**: Logs are stored in `./letsencrypt-logs/` for monitoring
3. **Docker Socket**: The certbot container needs access to the Docker socket to reload Apache
4. **Permissions**: All files should have appropriate permissions

## Maintenance

### Regular Tasks

1. **Monitor Logs**: Check logs weekly for any renewal issues
2. **Update Certbot**: Update the certbot image periodically
3. **Backup Certificates**: Consider backing up `/etc/letsencrypt/` directory
4. **Test Renewal**: Periodically test manual renewal

### Log Rotation

Certbot logs can grow large over time. Consider implementing log rotation:

```bash
# Add to crontab for weekly log cleanup
0 2 * * 0 find /path/to/letsencrypt-logs -name "*.log" -mtime +30 -delete
```

## Emergency Procedures

### Certificate Expiration

If certificates expire:

1. Stop the certbot container
2. Manually obtain new certificates
3. Restart the certbot container
4. Verify the website loads with HTTPS

### Complete Reset

If the certificate setup is completely broken:

```bash
# Stop all containers
sudo docker compose -f docker-compose.prod.yml down

# Remove certificate directories
sudo rm -rf /etc/letsencrypt/
sudo rm -rf letsencrypt-logs/
sudo rm -rf letsencrypt-work/

# Recreate directories
sudo mkdir -p /etc/letsencrypt/
sudo mkdir -p letsencrypt-logs/
sudo mkdir -p letsencrypt-work/

# Restart with fresh certificates
sudo docker compose -f docker-compose.prod.yml up --build -d
```

## Testing Your Setup

### Quick Health Check

```bash
# Check container status
sudo docker ps

# Check certificate status
sudo docker exec certbot certbot certificates

# Check renewal logs
sudo docker logs certbot --tail 20

# Test manual renewal
sudo docker exec certbot /bin/bash /scripts/certbot-renew.sh
```

### Expected Results

- **Container Status**: Should show "Up" instead of "Restarting"
- **Certificates**: Should show valid certificates with expiration dates
- **Logs**: Should show renewal attempts every 12 hours
- **Apache**: Should reload after successful renewals

## Support

For issues with SSL certificates:

1. Check the logs first: `sudo docker logs certbot`
2. Verify domain configuration
3. Check firewall settings
4. Contact the system administrator

## References

- [Certbot Documentation](https://certbot.eff.org/docs/)
- [Let's Encrypt Documentation](https://letsencrypt.org/docs/)
- [Docker Certbot Image](https://hub.docker.com/r/certbot/certbot/) 