<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

include('../../includes/config.php');

header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $department_id = $_POST['department_id'];

    // Validation

    if(empty($department_id)){

        echo json_encode([
            'status' => 'error',
            'message' => 'Department ID Missing'
        ]);

        exit;
    }

    // Delete Query

    $sql = "DELETE FROM department WHERE id='$department_id'";

    $query = mysqli_query($conn, $sql);

    if($query){

        echo json_encode([
            'status' => 'success',
            'message' => 'Department Deleted Successfully'
        ]);

    }else{

        echo json_encode([
            'status' => 'error',
            'message' => mysqli_error($conn)
        ]);

    }

}
?>