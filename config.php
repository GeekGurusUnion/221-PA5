<?php
echo "attempt connect";

// Set your Google Cloud MySQL instance details
$host = '34.69.121.100';
$username = 'root';
$password = '@PA5_2023';
$database = 'wine';

// Connect to the Google Cloud MySQL instance
$connection = new mysqli($host, $username, $password, $database);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


?>