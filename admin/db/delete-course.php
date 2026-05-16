<?php

include '../../includes/config.php';

header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $course_id = trim($_POST['course_id']);

    // VALIDATION

    if(empty($course_id))
    {

        echo json_encode([
            'status' => 'error',
            'message' => 'Course ID Missing'
        ]);

        exit;

    }

    // ESCAPE

    $course_id = mysqli_real_escape_string($conn, $course_id);

    // CHECK COURSE EXIST

    $check = mysqli_query($conn,"
    SELECT * FROM course
    WHERE id = '$course_id'
    ");

    if(mysqli_num_rows($check) == 0)
    {

        echo json_encode([
            'status' => 'error',
            'message' => 'Course Not Found'
        ]);

        exit;

    }

    // DELETE QUERY

    $delete = mysqli_query($conn,"
    DELETE FROM course
    WHERE id = '$course_id'
    ");

    if($delete)
    {

        echo json_encode([
            'status' => 'success',
            'message' => 'Course Deleted Successfully'
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