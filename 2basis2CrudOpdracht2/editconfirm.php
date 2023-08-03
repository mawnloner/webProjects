<?php
require 'config.php';

$id = $_GET['id'];

$queryGet = "SELECT * FROM `basisCrudTable` WHERE `id` = ".$id;
$resultGet = mysqli_query($mysqli, $queryGet);

if(mysqli_num_rows($resultGet) == 1) {
    $item = mysqli_fetch_array($resultGet);
}

$onderwerp = htmlspecialchars($_POST['onderwerp']);
$inhoud = htmlspecialchars($_POST['inhoud']);
$begindatum = htmlspecialchars($_POST['begindatum']);
$einddatum = htmlspecialchars($_POST['einddatum']);
$prioriteit = htmlspecialchars($_POST['prioriteit']);
$status = htmlspecialchars($_POST['status']);


$query = "UPDATE `basisCrudTable` SET `Onderwerp`='$onderwerp',`Inhoud`='$inhoud',`Begindatum`='$begindatum',
`Einddatum`='$einddatum',`Prioriteit`='$prioriteit',`Status`='$status'WHERE `ID`= $id";

$result = mysqli_query($mysqli, $query);

if ($result) {
    header("Location: showCalender.php");
} else {
    echo "JOOEEEE IS ERROR";
}
?>