<?php

include '../../includes/config.php';

$course_id = $_POST['course_id'];

$query = mysqli_query($conn,"

SELECT * FROM course

WHERE id = '$course_id'

");

$row = mysqli_fetch_assoc($query);

echo json_encode([

    'fees' => $row['fees'],

    'duration' => $row['duration'],

    'eligibility' => $row['eligiblity']

]);

?>