<?php
include '.env';
ini_set('display_errors', 1);
error_reporting(E_ALL);

$dbHostname = 'localhost';
$dbUsername = 'usrn';
$dbPassword = 'pswd!';
$dbDatabase = 'db';

echo "username: " . $dbUsername;

$mysqli = mysqli_connect($dbHostname, $dbUsername, $dbPassword, $dbDatabase);

if (!$mysqli): ?>
    <p>ERROR, no connie with dibberdatterbass ):</p>
    <p>error:
    <?php mysqli_connect_error(); ?>
    </p>
<?php endif; ?>