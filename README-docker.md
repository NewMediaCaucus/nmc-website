# README

This details the steps for getting Docker set up to run the New Media Caucus website.

## Step 0: Install Docker Engine and Docker Compose.
Before we can start, you will have to install the Docker Engine on your computer. This is best done on a laptop or workstation (non-servers) by installing the Docker Desktop application. Docker Desktop will install Compose for you.
You can follow the official documentation here for your OS:

Linux: https://docs.docker.com/engine/install/

macOS: https://docs.docker.com/desktop/install/mac-install/

Windows: https://docs.docker.com/desktop/install/windows-install/

## Step 1. Create an id.env file.
You're going to generate an id.env file for your computer. We have id.env in .gitignore so it won't share your id up to GitHub.com. Your ID is just a simple number, such as ```1001```. You need Docker to use this same ID to run Apache with the same ID as the ID that mount's your local filesystem.

### Windows Users
Right-click on the the *create-id-windows.ps1* file and select "Run with Powershell." 
This will create your id.env file. If you don't have Windows Powershell installed you can get it at [learn.microsoft.com](https://learn.microsoft.com/powershell/scripting/overview?view=powershell-7.1). 

### Mac Users
Double-click the *create-id-mac.command* file
This will create your id.env file.
You may need to enter your username and password to run this.

### Linux Users
Run *create-id-linux.sh* from the terminal 
This will create your id.env file. You may need to run this as sudo.
```$ sudo create-id-linux.sh```



## Step 2. Make the entrypoint.sh script executable and run it.
There's a script that your docker will need to run. So you need to use this command to make it executable... The ```+x``` is for eXecutable.

```chmod +x entrypoint.sh```

## Step 3. Build and run your DEV environment using docker's compose.
Now use this command to build your dev environment. This uses the ```docker compose``` command. Compose let's you get fancy with your Docker setups.

```sudo docker compose -f docker-compose.dev.yml up --build -d```

## Step 4. Try it out! Start the development (also known as dev) container with docker-compose.
```docker compose -f docker-compose.dev.yml up -d```

This should now be serving this repo on http://localhost:8080
You'll notice our development port is 8080. If you need to change it for yourself, just edit the ports line in your docker-compose.dev.yml

You can also stop the container with docker-compose.
```docker compose -f docker-compose.dev.yml down```

## Building and running the production (also known as prod) containers.
The production containers are setup to be the production (prod) environment. 

You might ask yourself, how might dev and prod need to be different?
- prod needs to have certificates setup so https:// works, not just http://.
- dev should have logging turned on, where prod should only have mininal logging.
- dev should have autoreload capabilitites so devs can see changes in the browser right away. Prod should not.

The beauty of Docker is only one developer has to set this up and everybody else gets it for free.

### Building and running prod
This should only be done on the prod server. It won't harm your dev setup, it just won't work
```docker compose -f docker-compose.prod.yml up --build -d```

### Restarting apache in the prod container
Run this docker command to restart the container.
```sudo docker restart nmc-website-prod-container```


