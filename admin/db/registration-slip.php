<?php

include('../../includes/config.php');

$id = $_GET['id'];

$sql = "SELECT students.*,
        department.depart_name,
        course.course_name,
        center.center_name

        FROM students

        LEFT JOIN department
        ON department.id = students.depart_id

        LEFT JOIN course
        ON course.id = students.course_id

        LEFT JOIN center
        ON center.id = students.center_id

        WHERE students.id='$id'";

$query = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Registration Slip</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body onload="window.print()">

<div class="container mt-4">

    <div class="card">
        <h2 class="mb-1 m-auto text-center text-info">
        <?php echo $row['center_name']; ?>
        </h2>

        <div class="card-header text-center bg-dark text-white">

            <h5>Student Registration Slip</h5>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-8">

                    <table class="table table-bordered">

                        <tr>
                            <th>Centre ID</th>
                            <td><?php echo $row['center_id']; ?></td>
                        </tr>
                        <tr>
                            <th>Registration No.</th>
                            <td><?php echo $row['registration_no']; ?></td>
                        </tr>
                        <tr>
                            <th>Student Name</th>
                            <td><?php echo $row['stu_name']; ?></td>
                        </tr>

                        <tr>
                            <th>Department</th>
                            <td><?php echo $row['depart_name']; ?></td>
                        </tr>

                        <tr>
                            <th>Course</th>
                            <td><?php echo $row['course_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Session</th>
                            <td><?php echo $row['session']; ?></td>
                        </tr>

                        <tr>
                            <th>Mobile</th>
                            <td><?php echo $row['mobile']; ?></td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td><?php echo $row['email']; ?></td>
                        </tr>

                        <tr>
                            <th>Address</th>
                            <td><?php echo $row['address']; ?></td>
                        </tr>
                        <tr>
                            <th>Fees Paid</th>
                            <td><?php echo $row['fees']; ?></td>
                        </tr>

                    </table>

                </div>

                <div class="col-md-4 text-center">

                    <img src="../../center/uploads/students/<?php echo $row['photo']; ?>"
                        width="200"
                        
                        class="img-thumbnail">

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>