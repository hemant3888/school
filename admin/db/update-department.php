<?php

include '../../includes/config.php';

header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $department_id   = trim($_POST['department_id']);
    $department_name = trim($_POST['department_name']);
    $short_name      = trim($_POST['short_name']);
    $description     = trim($_POST['description']);

    // VALIDATION

    if(empty($department_id))
    {

        echo json_encode([
            'status' => 'error',
            'message' => 'Department ID Missing'
        ]);

        exit;

    }

    if(empty($department_name))
    {

        echo json_encode([
            'status' => 'error',
            'message' => 'Department Name Required'
        ]);

        exit;

    }

    // UPPERCASE SHORT NAME

    $short_name = strtoupper($short_name);

    // ESCAPE

    $department_id   = mysqli_real_escape_string($conn, $department_id);
    $department_name = mysqli_real_escape_string($conn, $department_name);
    $short_name      = mysqli_real_escape_string($conn, $short_name);
    $description     = mysqli_real_escape_string($conn, $description);

    // UPDATE QUERY

    $update = mysqli_query($conn,"

    UPDATE department

    SET

    depart_name = '$department_name',
    short_name      = '$short_name',
    description     = '$description'

    WHERE id = '$department_id'

    ");

    if($update)
    {

        echo json_encode([
            'status' => 'success',
            'message' => 'Department Updated Successfully'
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