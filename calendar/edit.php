<?php 
require_once 'session.inc.php';
require 'config.php';
$id = $_GET['id'];

$query = "SELECT * FROM `basisCrudTable` WHERE `id` = ".$id;
$result = mysqli_query($mysqli, $query);
?>

<h1>U wilt het volgende item bewerken</h1>
    <?php 
    if(mysqli_num_rows($result) == 1) {
        $item = mysqli_fetch_array($result);
    ?>
        <ul>
            <li><b>Onderwerp:</b> <?= $item['Onderwerp'] ?></li>
            <li><b>Inhoud:</b> <?= $item['Inhoud'] ?></li>
            <li><b>Begindatum:</b> <?= $item['Begindatum'] ?></li>
            <li><b>Einddatum:</b> <?= $item['Einddatum'] ?></li>
            <li><b>Prioriteit:</b> <?= $item['Prioriteit'] ?></li>
            <li><b>Status:</b> <?php
                    if($item['Status'] === "n") {
                        echo "not started";
                    } else if($item['Status'] === "b") {
                        echo "started";
                    } else if($item['Status'] === "a") {
                        echo "finished";
                    }
                ?></li>
        </ul>
    <?php
    }
    ?>

<h1>U kunt hier de gegevens bewerken</h1>
<form action="editconfirm.php?id=<?= $item['ID']; ?>" method="post">
    <div>
        <label for="onderwerp">onderwerp</label>
        <input type="text" name="onderwerp" value="<?= $item['Onderwerp'] ?>">
    </div>
    <div>
        <label for="inhoud">inhoud</label>
        <input type="text" name="inhoud" value="<?= $item['Inhoud'] ?>">
    </div>
    <div>
        <label for="begindatum">begindatum</label>
        <input type="date" name="begindatum" value="<?= $item['Begindatum'] ?>">
    </div>
    <div>
        <label for="einddatum">einddatum</label>
        <input type="date" name="einddatum" value="<?= $item['Einddatum'] ?>">
    </div>
    <div>
        <label for="prioriteit">prioriteit</label>
        <input type="number" name="prioriteit" value="<?= $item['Prioriteit'] ?>" min="0" max="5">
    </div>
    <div>
        <label for="status">status</label>
        <select name="status" required>
            <!-- CHECK WHICH ONE IS SELECTED IN DB, THE ONE THAT IS SELECTED GETS THE ATRIBUTE SELECTED -->
            <option value="n" <?php if($item['Status'] === "n") { echo "selected"; } ?>>not started</option>
            <option value="b" <?php if($item['Status'] === "b") { echo "selected"; } ?>>started</option>
            <option value="a" <?php if($item['Status'] === "a") { echo "selected"; } ?>>finished</option>
        </select>
    </div>
    <div>
        <input type="submit" value="bewerken maar">
    </div>
</form>
