<?php

session_start();

header('Content-Type: application/json');

include('../../includes/config.php');


$user_id = $_SESSION['user_id'];

$newpassword = trim($_POST['newpassword']);

$renewpassword = trim($_POST['renewpassword']);


// Validation

if(empty($newpassword) || empty($renewpassword))
{
    echo json_encode([

        'status' => 'error',

        'message' => 'All fields are required'

    ]);

    exit;
}


// Password Match Check

if($newpassword != $renewpassword)
{
    echo json_encode([

        'status' => 'error',

        'message' => 'Passwords do not match'

    ]);

    exit;
}


// Password Length

if(strlen($newpassword) < 6)
{
    echo json_encode([

        'status' => 'error',

        'message' => 'Password must be at least 6 characters'

    ]);

    exit;
}


// Hash Password

$hashed_password = password_hash(
    $newpassword,
    PASSWORD_DEFAULT
);


// Update Password

$update = "UPDATE users SET

password='$hashed_password'

WHERE id='$user_id'";


$query = mysqli_query($conn, $update);


// Response

if($query)
{
    echo json_encode([

        'status' => 'success',

        'message' => 'Password Changed Successfully'

    ]);
}
else
{
    echo json_encode([

        'status' => 'error',

        'message' => mysqli_error($conn)

    ]);
}

?>