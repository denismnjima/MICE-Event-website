<?php

$host = 'localhost';
$user = 'root';
$password = 'Parakenya2002!!!!';
$dbname = 'afica_micu';

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Close the connection when done
// mysqli_close($conn);
?>
