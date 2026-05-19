<?php

include('../../includes/config.php');

include('../../includes/mail-config.php');

if(!isset($_GET['id'])){

    die('Invalid Request');
}

$center_id = intval($_GET['id']);


//  FETCH CENTER


$sql = "SELECT * FROM center
WHERE id='$center_id'";

$query = mysqli_query($conn,$sql);

$center = mysqli_fetch_assoc($query);

if(!$center){

    die('Center Not Found');
}


//  STATUS CHECK


if($center['status'] != 'pending'){

    die('Already Processed');
}


//  GENERATE TOKEN


$token = bin2hex(random_bytes(32));

$token_expire = date(
    'Y-m-d H:i:s',
    strtotime('+1 day')
);


//  INSERT USER


$user_sql = "INSERT INTO users(

    center_id,
    name,
    email,
    mobile,
    role,
    status,
    reset_token,
    token_expire

) VALUES (

    '".$center['id']."',
    '".$center['center_name']."',
    '".$center['email']."',
    '".$center['mobile']."',
    'center',
    'active',
    '".$token."',
    '".$token_expire."'

)";

$user_query = mysqli_query($conn,$user_sql);

if(!$user_query){

    die(mysqli_error($conn));
}


//  UPDATE CENTER STATUS


$update_sql = "UPDATE center
SET status='approved'
WHERE id='$center_id'";

mysqli_query($conn,$update_sql);


//  SET PASSWORD LINK


$reset_link = "http://localhost/school/set-password.php?token=".$token;


//  EMAIL TEMPLATE


$body = "

<h2>Center Approved</h2>

<p>
Hello <b>".$center['center_name']."</b>,
</p>

<p>
Your center request has been approved.
</p>

<p>
Click below button to set password:
</p>

<p>
<a href='".$reset_link."'
style='
background:#198754;
padding:12px 20px;
color:white;
text-decoration:none;
border-radius:5px;
'>
Set Password
</a>
</p>

<p>
This link expires in 24 hours.
</p>

";


//  SEND EMAIL

sendMail(
    $center['email'],
    'Center Approved',
    $body
);

//  REDIRECT

header('Location:../all-center-request.php?approved=1');

exit;