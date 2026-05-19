<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];

    if ($password === $conpassword) {
        echo $sql = "UPDATE `users` SET `password`=md5($password) WHERE `userid`='$id'";
        if (mysqli_query($conn, $sql)) {
            header('location: ../dashboard.php');
            exit;
        }
    } else {
        echo "<script>alert('Password not same!');window.location.href='../changepassword.php';</script>";
    }
}
