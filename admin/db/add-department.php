<?php

include('../../includes/config.php');

header('Content-Type: application/json');

$response = [];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $department_name = trim($_POST['department_name']);
   $short_name = strtoupper(trim($_POST['short_name']));
    $description = trim($_POST['description']);

    // Validation

    if(empty($department_name)){

        $response = [
            'status' => 'error',
            'message' => 'Department name is required'
        ];

        echo json_encode($response);
        exit;
    }
    if(empty($short_name)){

        $response = [
            'status' => 'error',
            'message' => 'Short name is required'
        ];

        echo json_encode($response);
        exit;
    }

    if(empty($description)){

        $response = [
            'status' => 'error',
            'message' => 'Description is required'
        ];

        echo json_encode($response);
        exit;
    }

    // Escape Data

    $department_name = mysqli_real_escape_string($conn, $department_name);
    $short_name = mysqli_real_escape_string($conn, $short_name);
    $description = mysqli_real_escape_string($conn, $description);

    // Insert Query

    $sql = "INSERT INTO department
    (depart_name, short_name, description)
    VALUES
    ('$department_name','$short_name','$description')";

    $query = mysqli_query($conn, $sql);

    if($query){

        $response = [
            'status' => 'success',
            'message' => 'Department Added Successfully'
        ];

    }else{

        $response = [
            'status' => 'error',
            'message' => mysqli_error($conn)
        ];

    }

    echo json_encode($response);

}
?>