# This windows powershell script will get your current user's userid and save it to a file called id.env
# Docker uses this file to run apache as the same ID.
# This gives both you and your Docker's apache user access to your shared volumes.

# Step 1. Double-click this file to run it. It should create an id.env file.
# Step 2. Check to see if you now have a new id.env file in your directory.
# Step 3. If so, you're good to go.

# Get the current user's SID
# Debugging: Output the current username and domain
Write-Output "Username: $env:USERNAME"
Write-Output "Domain: $env:USERDOMAIN"

# Get the current user's SID
$userAccount = Get-WmiObject Win32_UserAccount -Filter "Name='$env:USERNAME' AND Domain='$env:USERDOMAIN'"

# Debugging: Output the user account object
Write-Output "User Account: $userAccount"

# Retrieve the SID
$userSID = [System.Security.Principal.WindowsIdentity]::GetCurrent().User.Value

# Debugging: Output the SID
Write-Output "User SID: $userSID"

# Define the path to the id.env file in the current directory
$currentDirectory = Get-Location
Write-Output "Current Directory: $currentDirectory"

# Define the target subdirectory and append it to the current directory
$targetSubDirectory = "Documents\GitHub\nmc-website"
$targetDirectory = Join-Path -Path $currentDirectory -ChildPath $targetSubDirectory
Write-Output "Target Directory: $targetDirectory"

# Define the path to the id.env file in the target directory
$filePath = Join-Path -Path $targetDirectory -ChildPath "id.env"
Write-Output "File Path: $filePath"

# Write the USERID to the id.env file
try {
    "USERID=$userSID" | Out-File -FilePath $filePath -Encoding utf8
    Write-Output "Successfully wrote to $filePath"
} catch {
    Write-Output "Failed to write to $filePath"
    Write-Output $_.Exception.Message
}