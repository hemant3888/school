<?php
include 'config.php';

// Sanitize the incoming ID
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if (isset($_POST['submit'])) {
   
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $mobile = mysqli_real_escape_string($conn, trim($_POST['mobile']));
    $address = mysqli_real_escape_string($conn, trim($_POST['address']));

  
    if (empty($email) || empty($name) || empty($mobile) || empty($address)) {
        echo "<script>alert('All fields are required.'); window.location.href='../edit_user.php?id=$id';</script>";
        exit;
    }

   
    $sql = "UPDATE `users` SET 
                `name` = '$name',
                `email` = '$email',
                `mobile` = '$mobile',
                `address` = '$address',
                `created_at` = NOW() 
            WHERE `id` = '$id'";

   
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('User updated successfully.'); window.location.href='../users.php';</script>";
    } else {
        echo "<script>alert('Database error: " . mysqli_error($conn) . "'); window.location.href='../edit_user.php?id=$id';</script>";
    }
}
?>