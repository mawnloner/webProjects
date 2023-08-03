<?php
require 'config.php';

$username = $_POST['user'];
$password = $_POST['password'];

echo "<p>test</p>";

if(isset($username) && isset($password)) {
    $password=sha1($password);
    $query = "SELECT * FROM `basisCrudUsers` WHERE `username`='$username' AND `password`='$password'";
    $result = mysqli_query($mysqli, $query);

    if(mysqli_num_rows($result) == 1) {
        echo "<p>logged in</p>";
        session_start();
        $_SESSION['username'] = $username;
        header("location:showCalender.php");

    } else {
        echo "<p>combination of username and password does not exist</p>";
    }
    }
?>

<!-- LOGIN IS epischeBuggy AND  cartercar -->