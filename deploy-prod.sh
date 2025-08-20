#!/bin/bash

# Production deployment script for NMC Website
# This script builds and deploys the website using Docker without Docker Compose

set -e

echo "Starting production deployment..."

# Build the Docker images
echo "Building Docker images..."
sudo docker build -f Dockerfile.prod -t nmc-website-prod .
sudo docker build -f Dockerfile.certbot -t nmc-website-certbot .

# Create the network if it doesn't exist
echo "Setting up Docker network..."
sudo docker network create nmc-website_webnet 2>/dev/null || true

# Stop and remove existing containers
echo "Stopping existing containers..."
sudo docker stop nmc-website-prod-container certbot 2>/dev/null || true
sudo docker rm nmc-website-prod-container certbot 2>/dev/null || true

# Start the webserver container
echo "Starting webserver container..."
sudo docker run -d \
  --name nmc-website-prod-container \
  --hostname newmediacaucus.org \
  -p 80:80 \
  -p 443:443 \
  -v /home/nmcdev/nmc-website:/var/www/html/ \
  -v ./custom-php.prod.ini:/etc/php/8.3/apache2/conf.d/custom-php.ini \
  -v ./php-logs:/var/log/php-logs \
  -v ./apache-logs:/var/log/apache2 \
  -v /etc/letsencrypt:/etc/letsencrypt \
  --network nmc-website_webnet \
  nmc-website-prod

# Check if certificate exists, if not create it
if [ ! -f "/etc/letsencrypt/live/newmediacaucus.org/fullchain.pem" ]; then
    echo "Creating initial SSL certificate..."
    sudo docker run --rm \
      -v /etc/letsencrypt:/etc/letsencrypt \
      -v ./letsencrypt-logs:/var/log/letsencrypt \
      -v /var/run/docker.sock:/var/run/docker.sock \
      -v /home/nmcdev/nmc-website:/var/www/html \
      --network nmc-website_webnet \
      nmc-website-certbot \
      certbot certonly \
      --webroot \
      --webroot-path=/var/www/html \
      --email admin@newmediacaucus.org \
      --agree-tos \
      --no-eff-email \
      --domains newmediacaucus.org,www.newmediacaucus.org
else
    echo "SSL certificate already exists, skipping initial creation"
fi

# Start the certbot container for automatic renewal
echo "Starting certbot container for automatic renewal..."
sudo docker run -d \
  --name certbot \
  -v /etc/letsencrypt:/etc/letsencrypt \
  -v ./letsencrypt-logs:/var/log/letsencrypt \
  -v /var/run/docker.sock:/var/run/docker.sock \
  -v /home/nmcdev/nmc-website:/var/www/html \
  --network nmc-website_webnet \
  nmc-website-certbot

# Check container status
echo "Checking container status..."
sudo docker ps

echo "Production deployment completed successfully!"
echo "Website should be accessible at: https://newmediacaucus.org" 