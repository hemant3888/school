<?php
include 'config.php';
session_start();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $p = $_POST['password'];
    $password = md5($p);
    $sql = "SELECT * FROM `admin` where user_name='$username' and password='$password'";
    $res = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
        $_SESSION['username'] = $row['user_name'];
        $_SESSION['id'] = $row['id'];
        echo "<script>window.location.href='../dashboard.php'</script>";
    } else {
        echo "<script>alert('Please Enter Valid Username And Password!');
        window.location.href='../index.php'</script>";
    }
}
