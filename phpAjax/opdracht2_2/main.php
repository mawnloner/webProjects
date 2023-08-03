<?php
// use php to read all values of a database table and put it in a json array

// connect to the database
include_once 'db.php';

// get the data from the database
$query = "SELECT * FROM `boeken`";
$result = mysqli_query($mysqli, $query);

// put the data in an array
$boeken = array();
while ($row = mysqli_fetch_assoc($result)) {
    $boeken[] = $row;
}

// convert the array to json
$json = json_encode($boeken);

// output the json
echo $json;
?>