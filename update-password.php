

// include('includes/config.php');

// $password = $_POST['password'];

// $token = $_POST['token'];

// $hashed_password = password_hash(
//     $password,
//     PASSWORD_DEFAULT
// );

// $sql = "UPDATE users SET

// password = '".$hashed_password."',
// reset_token = NULL,
// token_expire = NULL

// WHERE reset_token='$token'";

// mysqli_query($conn,$sql);

// header('Location:login.php');

// exit;
<?php

include('includes/config.php');

$password = $_POST['password'];
$token = $_POST['token'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "UPDATE users SET
password = '$hashed_password',
reset_token = NULL,
token_expire = NULL
WHERE reset_token='$token'
AND token_expire >= NOW()";

$result = mysqli_query($conn,$sql);

if(mysqli_affected_rows($conn) > 0){
    header('Location:login.php?reset=success');
}else{
    echo "Invalid or expired token";
}

exit;