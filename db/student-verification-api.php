<?php

include '../includes/config.php';

if(isset($_POST['enrollment_no']) && isset($_POST['dob']))
{

    $enrollment_no = mysqli_real_escape_string($conn, trim($_POST['enrollment_no']));
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);

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

        WHERE students.enroll_no='$enrollment_no'
        AND students.dob='$dob'

    ");

    if(mysqli_num_rows($query) > 0)
    {

        $row = mysqli_fetch_assoc($query);

?>

        <div class="card border-0 shadow rounded-4 overflow-hidden">

            <div class="bg-success text-white text-center py-3">

                <h4 class="mb-0">

                    <i class="bi bi-patch-check-fill"></i>

                    VERIFIED STUDENT

                </h4>

            </div>

            <div class="card-body p-4">

                <div class="row align-items-center">

                    <div class="col-md-4 text-center mb-4">

                        <img src="<?php echo BASE_URL; ?>/center/uploads/students/<?php echo $row['photo']; ?>"
                            class="img-fluid rounded-4 border"
                            style="height:200px; object-fit:cover;">

                    </div>

                    <div class="col-md-8">

                        <table class="table table-bordered">

                            <tr>
                                <th>Student Name</th>
                                <td><?php echo $row['stu_name']; ?></td>
                            </tr>

                            <tr>
                                <th>Enrollment No</th>
                                <td><?php echo $row['enroll_no']; ?></td>
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
                                <th>Center</th>
                                <td><?php echo $row['center_name']; ?></td>
                            </tr>
                            <tr>
                                <th>Session</th>
                                <td><?php echo $row['session']; ?></td>
                            </tr>

                           

                            <tr>
                                <th>Status</th>
                                <td>

                                    <span class="badge bg-success px-3 py-2">

                                        VERIFIED

                                    </span>

                                </td>
                            </tr>

                        </table>

                        <!-- PRINT BUTTON -->

                        <a href="verification-pdf.php?id=<?php echo $row['id']; ?>"
                            target="_blank"
                            class="btn btn-warning rounded-pill px-4 " style="margin-bottom: 10px;">

                            <i class="bi bi-file-earmark-pdf"></i>

                            Print PDF

                        </a>

                    </div>

                </div>

            </div>

        </div>

<?php

    }
    else
    {

        echo '

        <div class="alert alert-danger text-center rounded-4">

            <i class="bi bi-x-circle"></i>

            Invalid Enrollment Number or DOB

        </div>

        ';

    }

}
?>