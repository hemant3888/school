<?php
include '../../includes/config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['enquiry_id']) && !empty($_POST['enquiry_id'])){

        $id = intval($_POST['enquiry_id']);

        $query = "DELETE FROM contact WHERE id = $id";

        if(mysqli_query($conn, $query)){
            echo "success";
        }else{
            echo "error";
        }

    }else{
        echo "invalid";
    }

}else{
    echo "invalid_request";
}