<?php

session_start();

header('Content-Type: application/json');

include('../../includes/config.php');


$id = $_POST['id'];

$name = trim($_POST['name']);

$mobile = trim($_POST['mobile']);

$email = trim($_POST['email']);


// Validation

if (empty($name) || empty($mobile) || empty($email)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'All fields are required'
    ]);

    exit;
}


// Old User Data
$sql = "SELECT * FROM users WHERE id='$id'";

$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

$old_image = $user['image'] ?? '';

$image_name = $old_image;


// Image Upload

if (
    isset($_FILES['image']) &&
    $_FILES['image']['error'] == 0
) {
    $tmp_name = $_FILES['image']['tmp_name'];

    $image_name = time() . '_' . $_FILES['image']['name'];

    move_uploaded_file(
        $tmp_name,
        "../assets/uploads/" . $image_name
    );

    // Delete Old Image

    if (
        !empty($old_image) &&
        file_exists("../assets/uploads/" . $old_image)
    ) {
        unlink("../assets/uploads/" . $old_image);
    }
}


// Update Query

$update = "UPDATE users SET

name='$name',
mobile='$mobile',
email='$email',
image='$image_name'

WHERE id='$id'";

$query = mysqli_query($conn, $update);

if (!$query) {
    echo json_encode([
        'status' => 'error',
        'message' => mysqli_error($conn)
    ]);

    exit;
}


// Response

if ($query) {
    $_SESSION['name'] = $name;

    echo json_encode([

        'status' => 'success',

        'message' => 'Profile Updated Successfully'

    ]);
} else {
    echo json_encode([

        'status' => 'error',

        'message' => 'Update Failed'

    ]);
}
