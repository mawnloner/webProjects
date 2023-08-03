<?php
require 'config.php';
    
$id = $_GET['id'];

$query = "DELETE FROM `basisCrudTable` WHERE `ID`= ".$id;

$result = mysqli_query($mysqli, $query);

if ($result) {
    header("Location: showCalender.php");
} else {
    echo "JOOEEEE IS ERROR";
}
?>