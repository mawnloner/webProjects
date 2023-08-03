<?php 
require_once 'session.inc.php';
require 'config.php';
$id = $_GET['id'];

$query = "SELECT * FROM `basisCrudTable` WHERE `id` = ".$id;
$result = mysqli_query($mysqli, $query);
?>

<h1>WEET JE HET ZEKER?</h1>
<p>
    je wilt dus het volgende verwijderen:
    <?php 
    if(mysqli_num_rows($result) == 1) {
        $item = mysqli_fetch_array($result);
    ?>
        <ul>
            <li><?= $item['ID'] ?></li>
            <li><?= $item['Onderwerp'] ?></li>
            <li><?= $item['Inhoud'] ?></li>
            <li><?= $item['Begindatum'] ?></li>
            <li><?= $item['Einddatum'] ?></li>
            <li><?= $item['Status'] ?></li>
        </ul>
    <?php
    }
    ?>
</p>
<a
    href="deleteconfirm.php?id=<?= $item['ID']; ?>">
    yes, delete
</a>
<br>
<a
    href="showCalender.php">
    no please (:
</a>