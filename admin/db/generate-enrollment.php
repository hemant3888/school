<?php

include('../../includes/config.php');

include('../../includes/mail-config.php');

if(isset($_POST['student_id']))
{

    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);

    // STUDENT DATA

    $sql = "SELECT students.*,
            department.short_name

            FROM students

            LEFT JOIN department
            ON department.id = students.depart_id

            WHERE students.id='$student_id'";

    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($query);

    // CHECK ALREADY GENERATED

    if(!empty($row['enroll_no']))
    {
        echo "Enrollment already generated";
        exit;
    }

    // COURSE SHORT NAME

    $short_name = strtoupper($row['short_name']);

    // REGISTRATION DATE

    $reg_date = strtotime($row['created_at']);

    // YEAR

    $year = date('y', $reg_date);

    // MONTH

    $month = date('m', $reg_date);

    // RANDOM 4 DIGITS

    $random = rand(1000,9999);

    // ENROLLMENT NUMBER

    $enrollment_no = "TGIIT/".$short_name."/".$year.$month.$random;

    // UPDATE STUDENT

    $update = mysqli_query($conn,

    "UPDATE students
    SET enroll_no='$enrollment_no'
    WHERE id='$student_id'");

   if($update)
{

    // SEND EMAIL

    $student_email = $row['email'];

    $student_name = $row['stu_name'];

    $regis = $row['registration_no'];

    $subject = "Enrollment Number Generated";

    $message = "

    Dear ".$student_name.",

    <br><br>

    Registration number: ".$regis."

    <br><br>

    Your enrollment number has been generated successfully.

    <br><br>

    <strong>Enrollment Number:</strong>

    ".$enrollment_no."

    <br><br>

    Thank You.

    ";

    // SEND MAIL FUNCTION

    $mailSend = sendMail($student_email, $subject, $message);

    if($mailSend)
    {
        echo "success";
    }
    else
    {
        echo "Email sending failed";
    }

}

}
?>