<?php
include('../includes/config.php');
include('../includes/mail-config.php');

error_reporting(0);
ini_set('display_errors', 0);
header('Content-Type: application/json');

$email = mysqli_real_escape_string($conn, $_POST['email']);


$check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

if(mysqli_num_rows($check) > 0){

  
    $token = bin2hex(random_bytes(16));

    
    $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

   
    mysqli_query($conn, "
        UPDATE users SET 
        reset_token='$token',
        token_expire='$expiry'
        WHERE email='$email'
    ");

    // 🔗 Reset link (IMPORTANT: BASE_URL use kar)
    $link = BASE_URL . "set-password.php?token=".$token;

    $subject = "Reset Your Password";

    $message = "
    Hello,<br><br>
    You requested to reset your password.<br><br>

    <a href='$link'>Click here to reset password</a><br><br>

    This link will expire in 1 hour.<br><br>

    Thank You
    ";

    sendMail($email, $subject, $message);

    echo json_encode([
        "status" => "success",
        "message" => "Reset link sent to your email"
    ]);

}else{

    echo json_encode([
        "status" => "error",
        "message" => "Email not found"
    ]);
}