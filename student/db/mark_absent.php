<?php

date_default_timezone_set('Asia/Kolkata');

require_once '../../includes/config.php';

$yesterday = date('Y-m-d',strtotime('-1 day'));

$students = mysqli_query(
    $conn,
    "SELECT id FROM users WHERE status=1"
);

while($student = mysqli_fetch_assoc($students))
{
    $userId = $student['id'];

    $check = mysqli_query(
        $conn,
        "SELECT id
         FROM attendance
         WHERE user_id='$userId'
         AND date='$yesterday'"
    );

    if(mysqli_num_rows($check) == 0)
    {
        mysqli_query(
            $conn,
            "INSERT INTO attendance
            (
                user_id,
                date,
                attendance_status
            )
            VALUES
            (
                '$userId',
                '$yesterday',
                'Absent'
            )"
        );
    }
}