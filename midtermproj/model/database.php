<?php

// Connect to the MySQL database using PDO
$dsn = "mysql:host=localhost;dbname=zippyusedautos"; // the DSN string for the MySQL database
$username = "root"; // the username for the MySQL database
$password = "7077Mgh257!!!!!"; // the password for the MySQL database

try {
    $db = new PDO($dsn, $username, $password); // create a new PDO connection using the DSN, username, and password
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage(); // if the connection fails, display an error message
}

?>