<?php

date_default_timezone_set('Asia/Kolkata');

session_start();
require_once '../../includes/config.php';

header('Content-Type: application/json');

$user_id = $_SESSION['user_id'];

$action = $_POST['action'] ?? '';

if($action == 'checkin')
{
    $today = date('Y-m-d');

    $check = $conn->prepare("
        SELECT id
        FROM attendance
        WHERE user_id = ?
        AND date = ?
    ");

    $check->bind_param("is",$user_id,$today);
    $check->execute();

    $result = $check->get_result();

    if($result->num_rows > 0)
    {
        echo json_encode([
            'status'=>false,
            'message'=>'Already checked in today'
        ]);
        exit;
    }

    $insert = $conn->prepare("
        INSERT INTO attendance
        (
            user_id,
            date,
            login_time,
            attendance_status
        )
        VALUES
        (
            ?,
            ?,
            NOW(),
            'Present'
        )
    ");

    $insert->bind_param("is",$user_id,$today);
    $insert->execute();

    echo json_encode([
        'status'=>true,
        'message'=>'Check In Successful'
    ]);
}



if($action == 'checkout')
{
    $today = date('Y-m-d');

    $attendance = $conn->prepare("
        SELECT *
        FROM attendance
        WHERE user_id=?
        AND date=?
        LIMIT 1
    ");

    $attendance->bind_param("is",$user_id,$today);
    $attendance->execute();

    $row = $attendance->get_result()->fetch_assoc();

    if(!$row)
    {
        echo json_encode([
            'status'=>false,
            'message'=>'Please check in first'
        ]);
        exit;
    }

    if(!empty($row['logout_time']))
    {
        echo json_encode([
            'status'=>false,
            'message'=>'Already checked out'
        ]);
        exit;
    }

    $login = strtotime($row['login_time']);
    $logout = time();

    $seconds = $logout - $login;

    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds % 3600) / 60);

    $workingHours = $hours.'h '.$minutes.'m';

    $update = $conn->prepare("
        UPDATE attendance
        SET
        logout_time = NOW(),
        working_hours = ?
        WHERE id = ?
    ");

    $update->bind_param(
        "si",
        $workingHours,
        $row['id']
    );

    $update->execute();

    echo json_encode([
        'status'=>true,
        'message'=>'Check Out Successful'
    ]);
}