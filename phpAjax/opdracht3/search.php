<?php
// enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// use php to select the data from a database table and put it in a json array

// connect to the database
include_once 'db.php';

// get the input
$search = $_GET['search'];

// get the data from the database
$query = "SELECT * FROM `boeken` WHERE `title` LIKE '".$search."%'";
$result = mysqli_query($mysqli, $query);

if($result) {
    // put the data in an array
    $boeken = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $boeken[] = $row;
    }
    
    // convert the array to json
    $json = json_encode($boeken);
    
    // output the json
    echo $json;
} else {
    echo 'error';
}
?>