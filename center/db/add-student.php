<?php

include '../../includes/config.php';

header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $center_id      = trim($_POST['center_id']);
    $student_name    = trim($_POST['student_name']);
    $father_name     = trim($_POST['father_name']);
    $mother_name     = trim($_POST['mother_name']);
    $mobile          = trim($_POST['mobile']);
    $email           = trim($_POST['email']);
    $dob             = trim($_POST['dob']);
    $gender          = trim($_POST['gender']);
    $qualification   = trim($_POST['qualification']);

    $department_id   = trim($_POST['department_id']);
    $course_id       = trim($_POST['course_id']);

    $fees            = trim($_POST['fees']);
    $session         = trim($_POST['session']);

    $address         = trim($_POST['address']);
    $state           = trim($_POST['state']);
    $city            = trim($_POST['city']);
    $pincode         = trim($_POST['pincode']);

    // VALIDATION

    if(empty($student_name))
    {
        echo json_encode([
            'status'=>'error',
            'message'=>'Student Name Required'
        ]);
        exit;
    }

    if($fees < 1000)
    {
        echo json_encode([
            'status'=>'error',
            'message'=>'Minimum Fees ₹1000 Required'
        ]);
        exit;
    }

    // PHOTO VALIDATION

    if($_FILES['photo']['name'] != '')
    {

        $photo = $_FILES['photo'];

        $photo_size = $photo['size'];

        $photo_ext = strtolower(pathinfo($photo['name'],PATHINFO_EXTENSION));

        $allowed_photo = ['jpg','jpeg','png'];

        if(!in_array($photo_ext,$allowed_photo))
        {
            echo json_encode([
                'status'=>'error',
                'message'=>'Invalid Photo Format'
            ]);
            exit;
        }

        if($photo_size > 2097152)
        {
            echo json_encode([
                'status'=>'error',
                'message'=>'Photo Max 2MB Allowed'
            ]);
            exit;
        }

        $photo_name = time().'_photo.'.$photo_ext;

        move_uploaded_file($photo['tmp_name'],'../uploads/students/'.$photo_name);

    }

    // PAYMENT FILE VALIDATION

    if($_FILES['payment_screenshot']['name'] != '')
    {

        $payment = $_FILES['payment_screenshot'];

        $payment_size = $payment['size'];

        $payment_ext = strtolower(pathinfo($payment['name'],PATHINFO_EXTENSION));

        $allowed_payment = ['jpg','jpeg','png','pdf'];

        if(!in_array($payment_ext,$allowed_payment))
        {
            echo json_encode([
                'status'=>'error',
                'message'=>'Invalid Payment File'
            ]);
            exit;
        }

        if($payment_size > 1048576)
        {
            echo json_encode([
                'status'=>'error',
                'message'=>'Payment File Max 1MB Allowed'
            ]);
            exit;
        }

        $payment_name = time().'_payment.'.$payment_ext;

        move_uploaded_file($payment['tmp_name'],'../uploads/payments/'.$payment_name);

    }

    // REGISTRATION NUMBER

    $registration_no = 'TGIIT'.date('Y').date('m').rand(1000,9999);

    // INSERT QUERY

    $insert = mysqli_query($conn,"

    INSERT INTO students

    (
        registration_no,
        center_id,
        depart_id,
        course_id,

        stu_name,
        father_name,
        mother_name,

        mobile,
        email,
        dob,
        gender,

        qualification,

        fees,
        session,
        address,
        state,
        city,
        pincode,

        photo,
        payment_screenshot,

        fees_status,
        status

    )

    VALUES

    (
        '$registration_no',
        '$center_id',
        '$department_id',
        '$course_id',

        '$student_name',
        '$father_name',
        '$mother_name',

        '$mobile',
        '$email',
        '$dob',
        '$gender',

        '$qualification',

        '$fees',
        '$session',

        '$address',
        '$state',
        '$city',
        '$pincode',

        '$photo_name',
        '$payment_name',

        'pending',
        'pending'
    )

    ");

    if($insert)
    {

        echo json_encode([
            'status'=>'success',
            'message'=>'Student Registered Successfully'
        ]);

    }
    else
    {

        echo json_encode([
            'status'=>'error',
            'message'=>'Database Error'
        ]);

    }

}
?>