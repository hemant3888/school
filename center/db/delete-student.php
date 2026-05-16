<?php

include('../../includes/config.php');

if(isset($_POST['student_id']))
{

    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);

    // GET STUDENT IMAGE

    $getStudent = mysqli_query($conn,
    "SELECT photo FROM students WHERE id='$student_id'");

    $student = mysqli_fetch_assoc($getStudent);

    // DELETE IMAGE

    if(!empty($student['photo']) &&
       file_exists('../uploads/students/'.$student['photo']))
    {

        unlink('../uploads/students/'.$student['photo']);

    }

    // DELETE PAYMENT SCREENSHOT

    $getPayment = mysqli_query($conn,
    "SELECT payment_screenshot FROM students WHERE id='$student_id'");

    $payment = mysqli_fetch_assoc($getPayment);

    if(!empty($payment['payment_screenshot']) &&
       file_exists('../uploads/payments/'.$payment['payment_screenshot']))
    {

        unlink('../uploads/payments/'.$payment['payment_screenshot']);

    }

    // DELETE STUDENT

    $delete = mysqli_query($conn,
    "DELETE FROM students WHERE id='$student_id'");

    if($delete)
    {
        echo "success";
    }
    else
    {
        echo "error";
    }

}

?>