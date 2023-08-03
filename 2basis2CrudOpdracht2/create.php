<?php
require_once 'session.inc.php';
?>

<form action="createBackend.php" method="post">
    <div>
        <label for="onderwerp">onderwerp</label>
        <input type="text" name="onderwerp" required>
    </div>
    <div>
        <label for="inhoud">inhoud</label>
        <input type="text" name="inhoud" required>
    </div>
    <div>
        <label for="begindatum">begindatum</label>
        <input type="date" name="begindatum" required>
    </div>
    <div>
        <label for="einddatum">einddatum</label>
        <input type="date" name="einddatum" required>
    </div>
    <div>
        <label for="prioriteit">prioriteit</label>
        <input type="number" name="prioriteit" required min="0", max="5">
    </div>
    <div>
        <label for="status">status</label>
        <select name="status" required>
            <option value="n">not started</option>
            <option value="b">started</option>
            <option value="a">finished</option>
        </select>
    </div>
    <div>
        <input type="submit" name="submitBtn" value="versturen maar">
    </div>
</form>