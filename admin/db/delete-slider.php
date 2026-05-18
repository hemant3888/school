
<?php
include '../../includes/config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['id']) && !empty($_POST['id'])){

        $id = intval($_POST['id']);

        
        $get = mysqli_query($conn, "SELECT image FROM slider WHERE id = $id");
        $row = mysqli_fetch_assoc($get);
        $countQuery = mysqli_query($conn, "SELECT COUNT(*) as total FROM slider");
$countData = mysqli_fetch_assoc($countQuery);

if($countData['total'] <= 1){
    echo "cannot_delete";
    exit;
}

        if($row){

            $fileName = $row['image'];
            $filePath = "../uploads/slider/" . $fileName;

           
            $delete = mysqli_query($conn, "DELETE FROM slider WHERE id = $id");

            if($delete){

               
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