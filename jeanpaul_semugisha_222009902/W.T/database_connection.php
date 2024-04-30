<?php
// Database connection parameters
$host = "localhost";
$username = "jeanpaulSEMUGISHA";
$password = "222009902";
$database = "online_learning_platform";

try {
    // Create connection
    $connection = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($connection->connect_error) {
        throw new Exception("Connection failed: " . $connection->connect_error);
    }
} catch (Exception $e) {
    // Log the error to a file or display a user-friendly message
    error_log("Database connection error: " . $e->getMessage());
    die("Database connection error. Please try again later.");
}
?>
