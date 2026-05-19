<?php

include('../../includes/config.php');

if(isset($_POST['student_id']))
{
    $student_id = $_POST['student_id'];

    $check = mysqli_query($conn,
    "SELECT fees_status FROM students WHERE id='$student_id'");

    $row = mysqli_fetch_assoc($check);

    if($row['fees_status'] == 'pending')
    {
        $status = 'paid';
    }
    else
    {
        $status = 'pending';
    }

    mysqli_query($conn,
    "UPDATE students
    SET fees_status='$status'
    WHERE id='$student_id'");

    echo "success";
}

?>