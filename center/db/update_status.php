<?php
include('config.php');

$id = $_POST['id'];
$status = $_POST['status'];

if(empty($id) || empty($status)){
    echo json_encode(['status'=>'error']);
    exit;
}

$stmt = $conn->prepare("UPDATE enquiry SET status=? WHERE id=?");
$stmt->bind_param("si",$status,$id);

if($stmt->execute()){
    echo json_encode(['status'=>'success']);
} else {
    echo json_encode(['status'=>'error']);
}
?>