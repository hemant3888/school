<?php

session_start();

header("Content-Type: application/json");

include('../includes/config.php');

$data = json_decode(file_get_contents("php://input"), true);

$email = trim($data['email']);

$password = trim($data['password']);


// Validation

if(empty($email) || empty($password))
{
    echo json_encode([
        'status' => 'error',
        'message' => 'All fields are required'
    ]);

    exit;
}


// User Check

$sql = "SELECT * FROM users
WHERE email = '$email'
LIMIT 1";

$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);


// Email Check

if(!$user)
{
    echo json_encode([
        'status' => 'error',
        'message' => 'Email not found'
    ]);

    exit;
}


// Password Verify

if(!password_verify($password, $user['password']))
{
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid password'
    ]);

    exit;
}


// Status Check

if($user['status'] != 'active')
{
    echo json_encode([
        'status' => 'error',
        'message' => 'Account inactive'
    ]);

    exit;
}


// Session Store

$_SESSION['user_id'] = $user['id'];

$_SESSION['name'] = $user['name'];

$_SESSION['role'] = $user['role'];


// Role Redirect

$redirect = '';

if($user['role'] == 'admin')
{
   $redirect = BASE_URL . 'admin/dashboard.php';
}
elseif($user['role'] == 'center')
{
    $redirect = BASE_URL . 'center/dashboard.php';
}
elseif($user['role'] == 'teacher')
{
    $redirect = BASE_URL . 'teacher/dashboard.php';
}
elseif($user['role'] == 'student')
{
    $redirect = BASE_URL . 'student/dashboard.php';
}


// Final Response

echo json_encode([

    'status' => 'success',

    'message' => 'Login successful',

    'redirect' => $redirect

]);

?>