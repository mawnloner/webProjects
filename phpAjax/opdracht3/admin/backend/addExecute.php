<?php
include_once '../../db.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['ISBN'];
    
    $sql = "INSERT INTO boeken (title, author, isbn) VALUES ('$title', '$author', '$isbn')";
    $result = mysqli_query($mysqli, $sql);

    if ($result) {
        header("Location: ../index.html");
    } else {
        echo "Er is iets fout gegaan";
    }
}
else {
    echo "post submit is niet set";
}
?>