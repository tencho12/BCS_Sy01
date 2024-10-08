
<?php
ob_implicit_flush(true); // Disable output buffering
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

// Define the path to your PowerShell script
$psScriptPath = 'C:\wamp64\www\BCS_Sy01\broke\brute.ps1';

// Use popen to open a pipe and read the PowerShell script's output
$handle = popen("powershell -ExecutionPolicy Bypass -File $psScriptPath", "r");

if ($handle) {
    $lastOutput = ""; // Store the last output line to prevent duplication

    while (!feof($handle)) {
        $output = fgets($handle); // Get one line at a time

        // Only proceed if output is not empty and is different from the previous one
        if (trim($output) !== "" && $output !== $lastOutput) {
            if (strpos($output, '[SUCCESS]') !== false) {
                echo "<div class='success'>$output</div>";
            } elseif (strpos($output, '[FAILED]') !== false) {
                echo "<div class='failed'>$output</div>";
            } else {
                echo "<pre>$output</pre>";
            }

            // Set current output as last output to avoid repetition
            $lastOutput = $output;

            // Flush the output to send it to the browser immediately
            ob_flush();
            flush();
        }
    }

    pclose($handle);
} else {
    echo "<div>Error executing script</div>";
}

?>


