<?php
$mysqli = new mysqli('127.0.0.1', 'lizh1851_601', '12345', 'lizh1851_finalproject');
if ($mysqli->connect_errno) {
    echo "Error: Failed to make a MySQL connection, here is why: </br>";
    echo "Errno: " . $mysqli->connect_errno . "</br>";
    echo "Error: " . $mysqli->connect_error . "</br>";
    
    exit;
}
?>