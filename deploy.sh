#!/bin/bash

# Directory where your application is deployed
DEPLOY_DIR="/home/nmcdev/nmc-website"

# Navigate to the deployment directory
cd $DEPLOY_DIR || exit

# Pull the latest changes from the main branch
git pull origin main

# Restart the Apache service in the nmc-website-prod-container docker container.
# Note: This command assumes that the container is named nmc-website-prod-container.
# Note: 
sudo /usr/bin/docker exec nmc-website-prod-container service apache2 restart

echo "Deployment completed and Apache restarted."
