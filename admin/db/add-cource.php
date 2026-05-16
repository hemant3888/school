<?php

include '../../includes/config.php';

header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $dept_id     = trim($_POST['dept_id']);
    $course_name = trim($_POST['course_name']);
    $fees        = trim($_POST['fees']);
    $duration    = trim($_POST['duration']);
    $eligiblity  = trim($_POST['eligiblity']);
 $course_code = strtoupper(trim($_POST['course_code']));

    // VALIDATION

    if(empty($dept_id))
    {
        echo json_encode([
            'status' => 'error',
            'message' => 'Please Select Department'
        ]);
        exit;
    }

    if(empty($course_name))
    {
        echo json_encode([
            'status' => 'error',
            'message' => 'Course Name Required'
        ]);
        exit;
    }

    // ESCAPE

    $dept_id     = mysqli_real_escape_string($conn, $dept_id);
    $course_name = mysqli_real_escape_string($conn, $course_name);
    $fees        = mysqli_real_escape_string($conn, $fees);
    $duration    = mysqli_real_escape_string($conn, $duration);
    $eligiblity  = mysqli_real_escape_string($conn, $eligiblity);
    $course_code = mysqli_real_escape_string($conn, $course_code);

    // INSERT QUERY

    $insert = "INSERT INTO course
    (
        depart_id,
        course_name,
        fees,
        duration,
        eligiblity,
        
        course_code,
        status
    )

    VALUES
    (
        '$dept_id',
        '$course_name',
        '$fees',
        '$duration',
        '$eligiblity',
        '$course_code',
        'active'
    )";

    $query = mysqli_query($conn, $insert);

    if($query)
    {
        echo json_encode([
            'status' => 'success',
            'message' => 'Course Added Successfully'
        ]);
    }
    else
    {
        echo json_encode([
            'status' => 'error',
            'message' => 'Database Error'
        ]);
    }

}
?>