<?php
include '../../includes/config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){

        $image = $_FILES['image'];

        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);

      
        $allowed = ['jpg','jpeg','png','webp'];

        if(!in_array(strtolower($ext), $allowed)){
            echo "Invalid file type";
            exit;
        }

      
        $fileName = time() . rand(1000,9999) . "." . $ext;

        $uploadPath = "../uploads/slider/" . $fileName;

       if(move_uploaded_file($image['tmp_name'], $uploadPath)){

   
    $query = "INSERT INTO slider (image) VALUES ('$fileName')";

    if(mysqli_query($conn, $query)){
        echo "success";
    }else{
        echo "Database Error";
    }

}else{
    echo "Upload Failed";
}

    }else{
        echo "No File Selected";
    }

}else{
    echo "Invalid Request";
}