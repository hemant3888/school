<?php

include '../../includes/config.php';

if(isset($_POST['center_id']))
{

    $center_id = mysqli_real_escape_string($conn, $_POST['center_id']);

    if(isset($_FILES['qr_code']) && $_FILES['qr_code']['error'] == 0)
    {

        $file_name  = time().'_'.$_FILES['qr_code']['name'];
        $tmp_name   = $_FILES['qr_code']['tmp_name'];

        $upload_path = '../uploads/'.$file_name;

        move_uploaded_file($tmp_name, $upload_path);

        // OLD IMAGE DELETE (OPTIONAL)

        $old = mysqli_query($conn, "SELECT qr_code FROM center WHERE id='$center_id'");

        $oldData = mysqli_fetch_assoc($old);

        if(!empty($oldData['qr_code']) && file_exists('../uploads/'.$oldData['qr_code']))
        {
            unlink('../uploads/'.$oldData['qr_code']);
        }

        // UPDATE QUERY

        $update = mysqli_query($conn, "UPDATE center SET qr_code='$file_name' WHERE id='$center_id'");

        if($update)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }

    }
    else
    {
        echo 0;
    }

}
?>