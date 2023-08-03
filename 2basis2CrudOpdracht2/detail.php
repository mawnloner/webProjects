<?php
require_once 'session.inc.php';
$id = $_GET['id'];

require 'config.php';

$query = "SELECT * FROM `basisCrudTable` WHERE `id` =".$id;
$result = mysqli_query($mysqli, $query);

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