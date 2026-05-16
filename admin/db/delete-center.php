<?php

include '../../includes/config.php';

if(isset($_POST['center_id']))
{
    $center_id = $_POST['center_id'];

    // Center ka owner_id nikalna
    $getCenter = "SELECT owner_id FROM center WHERE id = '$center_id'";
    $centerResult = mysqli_query($conn, $getCenter);

    if(mysqli_num_rows($centerResult) > 0)
    {
        $centerData = mysqli_fetch_assoc($centerResult);

        $owner_id = $centerData['owner_id'];

        // Pehle center delete karo
        $deleteCenter = "DELETE FROM center WHERE id = '$center_id'";

        if(mysqli_query($conn, $deleteCenter))
        {
            // Fir owner delete karo
            $deleteOwner = "DELETE FROM center_owner WHERE id = '$owner_id'";

            mysqli_query($conn, $deleteOwner);

            echo "success";
        }
        else
        {
            echo "error";
        }
    }
    else
    {
        echo "error";
    }
}

?>