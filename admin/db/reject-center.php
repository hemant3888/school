<?php

include('../../includes/config.php');

include('../../includes/mail-config.php');

if (!isset($_GET['id'])) {

    die('Invalid Request');
}

$center_id = intval($_GET['id']);

#############################
# FETCH CENTER
#############################

$sql = "SELECT * FROM center
WHERE id='$center_id'";

$query = mysqli_query($conn, $sql);

$center = mysqli_fetch_assoc($query);

if (!$center) {

    die('Center Not Found');
}

#############################
# STATUS CHECK
#############################

if ($center['status'] != 'pending' && $center['status'] != 'rejected') {

    die('Already Processed');
}

#############################
# UPDATE STATUS
#############################

$update_sql = "UPDATE center
SET status='rejected'
WHERE id='$center_id'";

mysqli_query($conn, $update_sql);

#############################
# EMAIL BODY
#############################

$body = "

<h2>Center Request Rejected</h2>

<p>
Hello <b>" . $center['center_name'] . "</b>,
</p>

<p>
Your center request has been rejected by admin.
</p>

<p>
Please contact support for more details.
</p>

";

#############################
# SEND MAIL
#############################

sendMail(
    $center['email'],
    'Center Rejected',
    $body
);

#############################
# REDIRECT
#############################

header('Location:../all-center-request.php?rejected=1');

exit;
