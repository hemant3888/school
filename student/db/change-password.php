<?php

session_start();

include('../../includes/config.php');

header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $user_id = $_SESSION['user_id'];

    $new_password = trim($_POST['new_password']);

    $confirm_password = trim($_POST['confirm_password']);

    // VALIDATION

    if(empty($new_password) || empty($confirm_password))
    {
        echo json_encode([
            'status' => 'error',
            'message' => 'All fields are required'
        ]);
        exit;
    }

    // PASSWORD LENGTH

    if(strlen($new_password) < 6)
    {
        echo json_encode([
            'status' => 'error',
            'message' => 'Password minimum 6 characters required'
        ]);
        exit;
    }

    // MATCH CHECK

    if($new_password != $confirm_password)
    {
        echo json_encode([
            'status' => 'error',
            'message' => 'Passwords do not match'
        ]);
        exit;
    }

    // HASH PASSWORD

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // UPDATE QUERY

    $update = mysqli_query($conn, "

        UPDATE users

        SET password = '$hashed_password'

        WHERE id = '$user_id'

    ");

    if($update)
    {
        echo json_encode([
            'status' => 'success',
            'message' => 'Password updated successfully'
        ]);
    }
    else
    {
        echo json_encode([
            'status' => 'error',
            'message' => 'Database error'
        ]);
    }

}
?>