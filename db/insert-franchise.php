<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
header('Content-Type: application/json');
include('../includes/config.php');

$response = [];

$errors = [];

// validations

if(empty($_POST['name'])){
    $errors['name'] = 'Name is required';
}

if(empty($_POST['father_name'])){
    $errors['father_name'] = 'Father name is required';
}

if(empty($_POST['phone'])){
    $errors['phone'] = 'Phone is required';
}

if(empty($_POST['email'])){
    $errors['email'] = 'Email is required';
}

// file validations

if(empty($_FILES['photo']['name'])){
    $errors['photo'] = 'Photo is required';
}

if(empty($_FILES['document']['name'])){
    $errors['document'] = 'Document is required';
}

if(count($errors) > 0){

    echo json_encode([
        'status' => 'error',
        'errors' => $errors
    ]);

    exit;
}

########################
# FILE UPLOADS
########################

// owner photo

$photo = time().'_photo_'.$_FILES['photo']['name'];

move_uploaded_file(
    $_FILES['photo']['tmp_name'],
    '../uploads/owners/photos/'.$photo
);

// owner document

$document = time().'_document_'.$_FILES['document']['name'];

move_uploaded_file(
    $_FILES['document']['tmp_name'],
    '../uploads/owners/documents/'.$document
);

// centre document

$centre_document = time().'_centre_document_'.$_FILES['centre_document']['name'];

move_uploaded_file(
    $_FILES['centre_document']['tmp_name'],
    '../uploads/centers/documents/'.$centre_document
);

########################
# INSERT OWNER
########################

$owner_sql = "INSERT INTO center_owner(

    name,
    father_name,
    mother_name,
    mobile,
    aadhar,
    address,
    city,
    district,
    state,
    email,
    photo,
    document

) VALUES (

    '".$_POST['name']."',
    '".$_POST['father_name']."',
    '".$_POST['mother_name']."',
    '".$_POST['phone']."',
    '".$_POST['aadhar_no']."',
    '".$_POST['address']."',
    '".$_POST['city']."',
    '".$_POST['district']."',
    '".$_POST['state']."',
    '".$_POST['email']."',
    '".$photo."',
    '".$document."'

)";

mysqli_query($conn,$owner_sql);

$owner_id = mysqli_insert_id($conn);

########################
# INSERT CENTER
########################

$center_sql = "INSERT INTO center(

    owner_id,
    center_name,
    owner_name,
    address,
    landmark,
    city,
    district,
    state,
    email,
    mobile,
    document

) VALUES (

    '".$owner_id."',
    '".$_POST['centre_name']."',
    '".$_POST['name']."',
    '".$_POST['centre_address']."',
    '".$_POST['centre_landmark']."',
    '".$_POST['centre_city']."',
    '".$_POST['centre_district']."',
    '".$_POST['centre_state']."',
    '".$_POST['centre_email']."',
    '".$_POST['centre_phone']."',
    '".$centre_document."'

)";

mysqli_query($conn,$center_sql) or die(mysqli_error($conn));

echo json_encode([

    'status' => 'success',
    'message' => 'Franchise enquiry submitted successfully'

]);

?>