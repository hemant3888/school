<?php

include 'includes/config.php';

$id = $_GET['id'];

$query = mysqli_query($conn, "

    SELECT 
        students.*,
        course.course_name,
        course.duration,
        center.center_name

    FROM students

    LEFT JOIN course 
    ON students.course_id = course.id

    LEFT JOIN center
    ON students.center_id = center.id

    WHERE students.id='$id'

");

$row = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Verification Certificate</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
        }

        .certificate {

            max-width: 900px;
            margin: 30px auto;
            background: #fff;

            border: 2px solid #FC9928;

            padding: 20px;

            border-radius: 20px;

            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);

        }

        /* PHOTO BOX */

        .student-photo-wrapper {

            position: relative;

            width: 220px;

            margin: auto;

        }

        .student-photo {

            width: 100%;
            height: 230px;

            object-fit: cover;

            border-radius: 20px;

            border: 3px solid #fff;

            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);

        }

        /* VERIFIED BADGE */

        .verified-stamp {
            position: absolute;
            bottom: 10px;
            right: -5px;

            width: 100px;
            /* size control */
            opacity: 0.9;

            transform: rotate(-20deg);
            /* thoda tilted look (real stamp jaisa) */

            pointer-events: none;
            /* click block na kare */

            filter: drop-shadow(0 5px 10px rgba(0, 0, 0, 0.3));
        }

        /* PRINT BUTTON HIDE */

        @media print {

            .print-btn {
                display: none;
            }

            body {
                background: #fff;
            }

        }
    </style>

</head>

<body>

    <div class="certificate">

        <div class="text-center mb-4">

            <h1 class="fw-bold text-uppercase" style="color:#FC9928;">

                STUDENT VERIFICATION

            </h1>

            <h5 class="text-muted">

                Official Verification Document

            </h5>

        </div>

        <div class="row g-4">

            <div class="col-md-4 text-center">

                <div class="student-photo-wrapper">

                    <!-- STUDENT PHOTO -->

                    <img src="<?php echo BASE_URL; ?>center/uploads/students/<?php echo $row['photo']; ?>"
                        class="student-photo">

                    <!-- VERIFIED BADGE -->

                    <img src="<?php echo BASE_URL; ?>assets/images/stamp.png" class="verified-stamp">

                </div>

            </div>

            <div class="col-md-8">

                <table class="table table-bordered">
                    <tr>
                        <th>Enrollment No</th>
                        <td><?php echo $row['enroll_no']; ?></td>
                    </tr>
                    <tr>
                        <th>Student Name</th>
                        <td><?php echo $row['stu_name']; ?></td>
                    </tr>


                    <tr>
                        <th>Father Name</th>
                        <td><?php echo $row['father_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Mother Name</th>
                        <td><?php echo $row['mother_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td><?php echo date('d M Y', strtotime($row['dob'])); ?></td>
                    </tr>

                    <tr>
                        <th>Course</th>
                        <td><?php echo $row['course_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Duration</th>
                        <td><?php echo $row['duration']; ?></td>
                    </tr>


                    <tr>
                        <th>Session</th>
                        <td><?php echo $row['session']; ?></td>
                    </tr>
                    <tr>
                        <th>Center</th>
                        <td><?php echo $row['center_name']; ?></td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>

                            <span class="badge bg-success">

                                VERIFIED

                            </span>

                        </td>
                    </tr>

                </table>

            </div>

        </div>

        <div class="text-center mt-2">

            <button onclick="window.print()" class="btn btn-warning px-5 rounded-pill print-btn" style="background-color: #FC9928;">

                Print Now

            </button>

        </div>

    </div>

</body>

</html>