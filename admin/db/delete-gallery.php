<?php
include '../../includes/config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['id']) && !empty($_POST['id'])){

        $id = intval($_POST['id']);

        
        $get = mysqli_query($conn, "SELECT image FROM gallery WHERE id = $id");
        $row = mysqli_fetch_assoc($get);

        if($row){

            $fileName = $row['image'];
            $filePath = "../uploads/gallery/" . $fileName;

            // 🔥 DB se delete
            $delete = mysqli_query($conn, "DELETE FROM gallery WHERE id = $id");

            if($delete){

                // 🔥 Folder se bhi delete
                if(file_exists($filePath)){
                    unlink($filePath);
                }

                echo "success";

            }else{
                echo "db_error";
            }

        }else{
            echo "not_found";
        }

    }else{
        echo "invalid";
    }

}else{
    echo "invalid_request";
}