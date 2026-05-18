<?php
include '../../includes/config.php';
include '../../includes/mail-config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['id']) && isset($_POST['enroll_no'])){

        $id = intval($_POST['id']);
        $enroll_no = mysqli_real_escape_string($conn, $_POST['enroll_no']);

        if(empty($enroll_no)){
            echo "empty";
            exit;
        }

        
        $getStudent = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
        $student = mysqli_fetch_assoc($getStudent);

        if(!$student){
            echo "not_found";
            exit;
        }

        
        $update = mysqli_query($conn, 
            "UPDATE students SET enroll_no='$enroll_no' WHERE id=$id"
        );

        if($update){

            
            $student_email = $student['email'];
            $student_name  = $student['stu_name'];
            $regis         = $student['registration_no'];

            $subject = "Enrollment Number Updated";

            $message = "
            Dear ".$student_name.",

            <br><br>

            Your enrollment number has been updated by admin.

            <br><br>

            <strong>Registration Number:</strong> ".$regis."

            <br><br>

            <strong>Updated Enrollment Number:</strong><br>
            ".$enroll_no."

            <br><br>

            Please keep it safe for future reference.

            <br><br>

            Thank You.
            ";

            
            $mailSend = sendMail($student_email, $subject, $message);

            if($mailSend){
                echo "success";
            }else{
                echo "mail_failed";
            }

        }else{
            echo "error";
        }

    }else{
        echo "invalid";
    }

}else{
    echo "invalid_request";
}