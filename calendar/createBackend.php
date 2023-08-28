<?php
$onderwerp = htmlspecialchars($_POST['onderwerp']);
$inhoud = htmlspecialchars($_POST['inhoud']); 
$begindatum = htmlspecialchars($_POST['begindatum']);
$eindatum = htmlspecialchars($_POST['einddatum']);
$prioriteit = htmlspecialchars($_POST['prioriteit']);
$status = htmlspecialchars($_POST['status']);
$submitBtn = htmlspecialchars($_POST['submitBtn']);

if(isset($submitBtn) &&
    isset($onderwerp) &&
    isset($inhoud) &&
    isset($begindatum) &&
    isset($eindatum) &&
    isset($prioriteit) &&
    isset($status)) {

    require 'config.php';

    $query = "INSERT INTO `basisCrudTable`(`Onderwerp`, `Inhoud`, `Begindatum`, `Einddatum`, `Prioriteit`, `Status`)
    VALUES ('$onderwerp','$inhoud','$begindatum','$eindatum','$prioriteit','$status')";
        
    $result = mysqli_query($mysqli, $query);
        
    if ($result) {
        header("Location: showCalender.php");
    } else {
        echo "JOOEEEE IS ERROR";
    }
}

?>