# This windows powershell script will get your current user's userid and save it to a file called id.env
# Docker uses this file to run apache as the same ID.
# This gives both you and your Docker's apache user access to your shared volumes.

# Step 1. Double-click this file to run it. It should create an id.env file.
# Step 2. Check to see if you now have a new id.env file in your directory.
# Step 3. If so, you're good to go.

# Get the current user's SID
$userSID = (Get-WmiObject Win32_UserAccount -Filter "Name='$env:USERNAME'").SID

# Define the path to the id.env file in the current directory
$currentDirectory = Get-Location
$filePath = "$currentDirectory\id.env"

# Write the USERID to the id.env file
"USERID=$userSID" | Out-File -FilePath $filePath -Encoding utf8