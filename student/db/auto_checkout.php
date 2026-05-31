<?php

date_default_timezone_set('Asia/Kolkata');

require_once '../../includes/config.php';

$currentTime = date('H:i:s');

if($currentTime < '21:00:00')
{
    exit;
}

$query = "
SELECT *
FROM attendance
WHERE date = CURDATE()
AND logout_time IS NULL
AND login_time IS NOT NULL
";

$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($result))
{
    $login = strtotime($row['login_time']);

    $logout = strtotime(date('Y-m-d').' 21:00:00');

    $seconds = $logout - $login;

    $hours = floor($seconds / 3600);

    $minutes = floor(($seconds % 3600) / 60);

    $workingHours = $hours.'h '.$minutes.'m';

    $logoutTime = date('Y-m-d').' 21:00:00';

    mysqli_query(
        $conn,
        "UPDATE attendance
         SET
         logout_time='$logoutTime',
         working_hours='$workingHours',
         attendance_status='Auto Checkout'
         WHERE id=".$row['id']
    );
}

echo "Done";