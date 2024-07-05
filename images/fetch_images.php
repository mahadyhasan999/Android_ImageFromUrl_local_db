<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imagedb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement
$sql = "SELECT image_url FROM images";
$result = $conn->query($sql);

// Initialize an array to store image URLs
$images = array();

if ($result) {
    // Fetch the results
    while ($row = $result->fetch_assoc()) {
        $images[] = $row['image_url'];
    }
    // Free result set
    $result->free();
} else {
    // Handle query error
    echo json_encode(["error" => "Query failed: " . $conn->error]);
    $conn->close();
    exit;
}

// Set the content type to application/json
header('Content-Type: application/json');

// Encode the array to JSON and output it
echo json_encode($images);

// Close the connection
$conn->close();

