<?php
// echo "Attempting to connect<br>";

// Set your Google Cloud MySQL instance details
$host = '34.69.121.100';
$username = 'root';
$password = '@PA5_2023';
$database = 'Practical5';

// Connect to the Google Cloud MySQL instance
try {
    $connection = new mysqli($host, $username, $password, $database);

    if ($connection->connect_error) {
        throw new Exception("Connection failed: " . $connection->connect_error);
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// else {
//     echo "Success";
// }

// printf("System status: %s<br>", $connection->stat());
// // $connection->select_db($database);

?>