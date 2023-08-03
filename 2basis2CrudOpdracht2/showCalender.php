<?php
require_once 'session.inc.php';
require 'config.php';

$query = "SELECT * FROM `basisCrudTable`";
$result = mysqli_query($mysqli, $query);

if (!$result): ?>
    <p>ERROR, no connie with dibberdatterbass ):</p>
    <p>error:
    <?php mysqli_connect_error(); ?>
    </p>
<?php endif;
?>

<a href="create.php">create new</a>
<a href="logout.php">logout</a>

<?php
if (mysqli_num_rows($result) > 0)
{ ?>
    <table border='1px'>
        <tr>
                <th>Onderwerp</th>
                <th>Inhoud</th>
            </tr>
        <?php
            while ($item = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td>
                            <a href="detail.php?id=<?= $item['ID']; ?>">
                                <?= $item['Onderwerp']; ?>
                            </a>
                        </td>
                        <td>
                            <p>
                                <?= $item['Inhoud'] ?>
                            </p>
                        </td>
                        <td>
                            <a href="delete.php?id=<?= $item['ID']; ?>">
                                delete
                            </a>
                        </td>
                        <td>
                            <a href="edit.php?id=<?= $item['ID']; ?>">
                                edit
                            </a>
                        </td>
                    </tr>
                    <?php
            } ?>
    </table>
<?php
} else {
    echo "<p>no items found!!1!!!!11!1</p>";
} ?>