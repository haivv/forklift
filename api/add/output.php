<?php
// Specify the path to the JSON file
$jsonFilePath = 'data.json';

// Read the JSON file
$jsonString = file_get_contents($jsonFilePath);

if ($jsonString === false) {
    echo 'Failed to read the JSON file.';
} else {
    // Set the appropriate content type and output the JSON data
    header('Content-Type: application/json');
    echo $jsonString;
}
?>
