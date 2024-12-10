<?php
session_start();
include('connect/database.php');

if (isset($_SESSION['USER'])) {
    $user_id = $_SESSION['USER'];
    $sql = "SELECT * FROM `user` WHERE `id` = '$user_id'";
    $USER = $conn->query($sql)->fetch();
}


if (isset($_GET['exit'])) {
    unset($_SESSION['USER']);

    echo '<script> document.location.href="index.php"</script>';
}
