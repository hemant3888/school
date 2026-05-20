<?php

include '../../includes/config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $student_id = mysqli_real_escape_string(
        $conn,
        $_POST['student_id']
    );

    $stu_name = mysqli_real_escape_string(
        $conn,
        $_POST['stu_name']
    );

    $father_name = mysqli_real_escape_string(
        $conn,
        $_POST['father_name']
    );

    $mother_name = mysqli_real_escape_string(
        $conn,
        $_POST['mother_name']
    );

    $department_id = mysqli_real_escape_string(
        $conn,
        $_POST['department_id']
    );

    $course_id = mysqli_real_escape_string(
        $conn,
        $_POST['course_id']
    );

    $mobile = mysqli_real_escape_string(
        $conn,
        $_POST['mobile']
    );

    $email = mysqli_real_escape_string(
        $conn,
        $_POST['email']
    );

    $dob = mysqli_real_escape_string(
        $conn,
        $_POST['dob']
    );

    $gender = mysqli_real_escape_string(
        $conn,
        $_POST['gender']
    );

    $qualification = mysqli_real_escape_string(
        $conn,
        $_POST['qualification']
    );

    $fees = mysqli_real_escape_string(
        $conn,
        $_POST['fees']
    );

    $session = mysqli_real_escape_string(
        $conn,
        $_POST['session']
    );

    $state = mysqli_real_escape_string(
        $conn,
        $_POST['state']
    );

    $city = mysqli_real_escape_string(
        $conn,
        $_POST['city']
    );

    $pincode = mysqli_real_escape_string(
        $conn,
        $_POST['pincode']
    );

    $address = mysqli_real_escape_string(
        $conn,
        $_POST['address']
    );

    // OLD IMAGE FETCH

    $old_query = mysqli_query($conn,"

        SELECT photo FROM students

        WHERE id='$student_id'

    ");

    $old_data = mysqli_fetch_assoc($old_query);

    $old_image = $old_data['photo'];

    $image_name = $old_image;

    // NEW IMAGE UPLOAD

    if(isset($_FILES['image']) && $_FILES['image']['name'] != '')
    {

        $image = $_FILES['image']['name'];

        $tmp_name = $_FILES['image']['tmp_name'];

        $extension = pathinfo($image, PATHINFO_EXTENSION);

        $new_image = time().rand().'.'.$extension;

        $upload_path = '../uploads/students/'.$new_image;

        // OLD IMAGE DELETE

        if(!empty($old_image) && file_exists('../uploads/students/'.$old_image))
        {

            unlink('../uploads/students/'.$old_image);

        }

        move_uploaded_file($tmp_name, $upload_path);

        $image_name = $new_image;

    }

    $update = mysqli_query($conn,"

        UPDATE students SET

        stu_name='$stu_name',

        father_name='$father_name',

        mother_name='$mother_name',

        depart_id='$department_id',

        course_id='$course_id',

        mobile='$mobile',

        email='$email',

        dob='$dob',

        gender='$gender',

        qualification='$qualification',

        fees='$fees',

        session='$session',

        state='$state',

        city='$city',

        pincode='$pincode',

        address='$address',

        photo='$image_name'

        WHERE id='$student_id'

    ");

    if($update)
    {

        echo json_encode([

            'status' => 'success',

            'message' => 'Student updated successfully'

        ]);

    }
    else
    {

        echo json_encode([

            'status' => 'error',

            'message' => 'Update failed'

        ]);

    }

}
?>