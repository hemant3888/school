<?php

// include '../../includes/config.php';

// if(isset($_POST['department_id']))
// {

//     $department_id = $_POST['department_id'];

//     $query = mysqli_query($conn,"

//         SELECT * FROM course

//         WHERE depart_id='$department_id'

//     ");

//     echo '<option value="">Select Course</option>';

//     while($course = mysqli_fetch_assoc($query))
//     {

//         echo '

//         <option value="'.$course['id'].'">

//             '.$course['course_name'].'

//         </option>

//         ';

//     }

// }



?>
<?php

include '../../includes/config.php';

if(isset($_POST['department_id']))
{

    $department_id = mysqli_real_escape_string(
        $conn,
        $_POST['department_id']
    );

    $query = mysqli_query($conn, "

        SELECT * FROM course

        WHERE depart_id = '$department_id'

    ");

    if(mysqli_num_rows($query) > 0)
    {

        echo '<option value="">Select Course</option>';

        while($course = mysqli_fetch_assoc($query))
        {

            echo '

                <option value="'.$course['id'].'">

                    '.$course['course_name'].'

                </option>

            ';

        }

    }
    else
    {

        echo '<option value="">No Course Found</option>';

    }

}
else
{

    echo '<option value="">Department ID Missing</option>';

}
?>