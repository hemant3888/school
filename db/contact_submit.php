<?php
include '../includes/config.php';

header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // VALIDATION
    if(empty($name) || empty($email) || empty($subject) || empty($message)){
        echo json_encode([
            "status" => "error",
            "message" => "All fields are required"
        ]);
        exit;
    }

    // INSERT
    $query = "INSERT INTO contact (name,email,subject,message) 
              VALUES ('$name','$email','$subject','$message')";

    if(mysqli_query($conn, $query)){
        echo json_encode([
            "status" => "success",
            "message" => "Message sent successfully!"
        ]);
    }else{
        echo json_encode([
            "status" => "error",
            "message" => "Database error"
        ]);
    }

}else{
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request"
    ]);
}