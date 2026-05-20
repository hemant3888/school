<?php

include '../../includes/config.php';

if(isset($_POST['student_id']))
{

    $student_id = mysqli_real_escape_string(
        $conn,
        $_POST['student_id']
    );

    $query = mysqli_query($conn, "

        SELECT 
            students.*,

            department.depart_name,

            course.course_name

        FROM students

        LEFT JOIN department
        ON students.depart_id = department.id

        LEFT JOIN course
        ON students.course_id = course.id

        WHERE students.id='$student_id'

    ");

    if(mysqli_num_rows($query) > 0)
    {

        $student = mysqli_fetch_assoc($query);

        echo json_encode([

            'status' => 'success',

            'student' => $student

        ]);

    }
    else
    {

        echo json_encode([

            'status' => 'error',

            'message' => 'Student not found'

        ]);

    }

}
?>