<?php

session_start();

include('../../includes/config.php');

header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $user_id = $_POST['user_id'];

   

    $email = trim($_POST['email']);

    $mobile = trim($_POST['mobile']);

    // USER FETCH

    $user_query = mysqli_query($conn, "

        SELECT * FROM users

        WHERE id = '$user_id'

    ");

    $user = mysqli_fetch_assoc($user_query);

    $student_id = $user['student_id'];

    $old_photo = $user['image'];

    // VALIDATION

    if(empty($email) || empty($mobile))
    {

        echo json_encode([
            'status' => 'error',
            'message' => 'All fields are required'
        ]);

        exit;

    }

    // PHOTO UPDATE

    $photo_name = $old_photo;

    if(isset($_FILES['photo']) && $_FILES['photo']['name'] != '')
    {

        $photo = $_FILES['photo'];

        $photo_ext = strtolower(pathinfo($photo['name'], PATHINFO_EXTENSION));

        $allowed = ['jpg','jpeg','png'];

        if(!in_array($photo_ext, $allowed))
        {

            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid image format'
            ]);

            exit;

        }

        if($photo['size'] > 2097152)
        {

            echo json_encode([
                'status' => 'error',
                'message' => 'Image max 2MB allowed'
            ]);

            exit;

        }

        // DELETE OLD IMAGE

        if($old_photo != '' && file_exists('../../center/uploads/students/'.$old_photo))
        {
            unlink('../../center/uploads/students/'.$old_photo);
        }

        // NEW IMAGE

        $photo_name = time().'_photo.'.$photo_ext;

        move_uploaded_file(

            $photo['tmp_name'],

            '../../center/uploads/students/'.$photo_name

        );

    }

    // USERS UPDATE

    $update_user = mysqli_query($conn, "

        UPDATE users

        SET

       
        email = '$email',
        mobile = '$mobile',
        image = '$photo_name'

        WHERE id = '$user_id'

    ");

    // STUDENTS UPDATE

    $update_student = mysqli_query($conn, "

        UPDATE students

        SET

  
        email = '$email',
        mobile = '$mobile',
        photo = '$photo_name'

        WHERE id = '$student_id'

    ");

    if($update_user && $update_student)
    {



        echo json_encode([
            'status' => 'success',
            'message' => 'Profile updated successfully'
        ]);

    }
    else
    {

        echo json_encode([
            'status' => 'error',
            'message' => 'Database error'
        ]);

    }

}
?>