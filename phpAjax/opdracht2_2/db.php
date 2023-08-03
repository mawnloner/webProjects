<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// connect to the database
$dbHostname = 'localhost';
$dbUsername = 'usrn';
$dbPassword = 'pswd!';
$dbDatabase = 'db';

// connect to the database
$mysqli = mysqli_connect($dbHostname, $dbUsername, $dbPassword, $dbDatabase);

?>