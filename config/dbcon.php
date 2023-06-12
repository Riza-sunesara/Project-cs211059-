
<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "vegmart";

// Create a new mysqli object
$connection = new mysqli($hostname, $username, $password, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
else{
    
   echo "";
}

?>