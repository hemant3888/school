<?php

include '../includes/config.php';

if (isset($_POST['student_id'])) {

    $student_id = mysqli_real_escape_string(
        $conn,
        $_POST['student_id']
    );

    $query = mysqli_query($conn, "

    SELECT

    students.*,

    course.course_name,

    center.center_name

    FROM students

    LEFT JOIN course
    ON students.course_id = course.id

    LEFT JOIN center
    ON students.center_id = center.id

    WHERE students.id='$student_id'

    ");

    $row = mysqli_fetch_assoc($query);

?>

    <style>
        .id-card {

            width: 700px;

            min-width: 700px;
            font-family: 'Times New Roman', serif;
            height: 430px;

            border-radius: 20px;

            overflow: hidden;

            border: 3px solid #3d81cf;

            background: #fff;

            margin: auto;

            position: relative;

        }

        /* HEADER */

        .header {

            background: #3d81cf;

            color: #fff;

            height: 90px;

            display: flex;

            align-items: center;

            padding: 0 20px;

        }

        .logo img {

            width: 75px;
            padding: 0px;
            height: 75px;

        }

        .school-name {

            flex: 1;

            text-align: center;

        }

        .school-name h4 {

            margin: 0;
            font-weight: 600;
            color: #fff;
            white-space: nowrap;

            font-size: 26px;

        }

        /* CONTENT */

        .content {

            padding: 20px;

        }

        .photo-box {

            width: 150px;

            height: 190px;

            border: 2px solid #3d81cf;

            border-radius: 20px;

            overflow: hidden;

            float: left;

            margin-right: 25px;

        }

        .photo-box img {

            width: 100%;

            height: 100%;

            object-fit: cover;

        }

        .details {

            overflow: hidden;

        }

        .adm {

            text-align: left;

            font-size: 18px;

            font-weight: bold;

            margin-bottom: 10px;

        }

        .id-card-wrapper {

            width: 100%;

            overflow-x: auto;

            padding-bottom: 10px;

        }

        table {

            width: 100%;

        }

        table td {

            padding: 5px;

            font-size: 18px;

        }

        .label {

            color: #3d81cf;

            font-weight: bold;

            width: 150px;

        }

        .footer {

            position: absolute;

            bottom: 0;

            width: 100%;

            background: #3d81cf;

            color: #fff;

            text-align: center;

            height: 55px;

            line-height: 20px;

            font-size: 22px;



        }
    </style>
    <div class="id-card-wrapper">
        <div class="id-card">

            <!-- HEADER -->

            <div class="header">

                <div class="logo">

                    <img src="assets/logo/logo1.jpeg">

                </div>

                <div class="school-name">

                    <h4>

                        The Galaxy Institute of Information Technology

                    </h4>

                </div>

            </div>

            <!-- CONTENT -->

            <div class="content">

                <!-- PHOTO -->

                <div class="photo-box">

                    <img src="../center/uploads/students/<?php echo $row['photo']; ?>">

                </div>

                <!-- DETAILS -->

                <div class="details">

                    <div class="adm">

                        Enroll. No.
                        <?php echo $row['enroll_no']; ?>

                    </div>

                    <table>

                        <tr>

                            <td class="label">
                                Name
                            </td>

                            <td>
                                :
                            </td>

                            <td>
                                <?php echo $row['stu_name']; ?>
                            </td>

                        </tr>

                        <tr>

                            <td class="label">
                                Course
                            </td>

                            <td>
                                :
                            </td>

                            <td>
                                <?php echo $row['course_name']; ?>
                            </td>

                        </tr>

                        <tr>

                            <td class="label">
                                Father Name
                            </td>

                            <td>
                                :
                            </td>

                            <td>
                                <?php echo $row['father_name']; ?>
                            </td>

                        </tr>

                        <tr>

                            <td class="label">
                                DOB
                            </td>

                            <td>
                                :
                            </td>

                            <td>
                                <?php echo $row['dob']; ?>
                            </td>

                        </tr>

                        <tr>

                            <td class="label">
                                Mobile
                            </td>

                            <td>
                                :
                            </td>

                            <td>
                                <?php echo $row['mobile']; ?>
                            </td>

                        </tr>



                    </table>

                </div>

            </div>

            <!-- FOOTER -->

            <div class="footer">

                <?php echo $row['center_name']; ?>

            </div>

        </div>
    </div>
<?php
}
?>