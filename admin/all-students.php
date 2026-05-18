<?php include 'header.php'; ?>
<style>
    table.dataTable td,
    table.dataTable th {

        white-space: nowrap;

    }
</style>

<div class="pagetitle">
    <h1>Students</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">All Students</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<div class="card">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-2 flex-wrap gap-2">
            <h5 class="card-title mb-0">All Students</h5>
        </div>
        <form method="GET">

            <div class="d-flex align-items-center gap-2 mb-3">

                <label class="fw-bold">
                    Filter By Center:
                </label>

                <select name="center_id"
                    class="form-select"
                    onchange="this.form.submit()"
                    style="max-width:450px;">

                    <option value="">
                        All Centers
                    </option>

                    <?php

                    $centerQuery = mysqli_query(
                        $conn,
                        "SELECT * FROM center ORDER BY center_name ASC"
                    );

                    while ($centerRow = mysqli_fetch_assoc($centerQuery)) {
                    ?>

                        <option value="<?php echo $centerRow['id']; ?>"

                            <?php
                            if (
                                isset($_GET['center_id']) &&
                                $_GET['center_id'] == $centerRow['id']
                            ) {
                                echo "selected";
                            }
                            ?>>

                            <?php echo $centerRow['center_name']; ?>

                        </option>

                    <?php
                    }
                    ?>

                </select>

            </div>

        </form>
        <div class="table-responsive">

            <table id="studentTable"
                class="table table-bordered table-striped nowrap align-middle"
                style="width:100%">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Student</th>
                        <th>Registration No.</th>

                        <th>Department</th>
                        <th>Course</th>
                        <th>Payment</th>
                        <th>Fees Status</th>
                        <th>Registration Slip</th>
                        <th>Student Details</th>
                        <th>Enrollment</th>

                        <th>Action</th>


                    </tr>

                </thead>

                <tbody>

                    <?php

                    $where = "WHERE 1";

                    if (isset($_GET['dept_id']) && $_GET['dept_id'] != '') {

                        $dept_id = mysqli_real_escape_string($conn, $_GET['dept_id']);

                        $where .= " AND students.depart_id = '$dept_id'";
                    }

                    if (isset($_GET['center_id']) && $_GET['center_id'] != '') {

                        $center_id = mysqli_real_escape_string($conn, $_GET['center_id']);

                        $where .= " AND students.center_id = '$center_id'";
                    }

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

        $where

        ORDER BY students.id DESC";

                    $query = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($query)) {

                    ?>

                        <tr>

                            <!-- ID -->
                            <td>
                                <?php echo $row['id']; ?>
                            </td>

                            <!-- Student -->
                            <td>

                                <div class="d-flex align-items-center gap-2">

                                    <?php
                                    if (!empty($row['photo'])) {
                                    ?>
                                        <img src="../center/uploads/students/<?php echo $row['photo']; ?>"
                                            width="45"
                                            height="45"
                                            style="border-radius:50%; object-fit:cover;">
                                    <?php
                                    } else {
                                    ?>
                                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                                            width="45"
                                            height="45"
                                            style="border-radius:50%;">
                                    <?php
                                    }
                                    ?>

                                    <div>
                                        <strong>
                                            <?php echo $row['stu_name']; ?>
                                        </strong>
                                        <br>

                                        <small>
                                            <?php echo $row['mobile']; ?>
                                        </small>
                                    </div>

                                </div>

                            </td>

                            <!-- registration number -->
                            <td>
                                <?php echo $row['registration_no']; ?>
                            </td>

                            <!-- Department -->
                            <td>
                                <?php echo $row['depart_name']; ?>
                            </td>

                            <!-- Course -->
                            <td>
                                <?php echo $row['course_name']; ?>
                            </td>
                            <!-- Fees Screenshot -->
                            <td>

                                <?php
                                if (!empty($row['payment_screenshot'])) {
                                ?>

                                    <button class="btn btn-info btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#feesModal<?php echo $row['id']; ?>">

                                        <i class="bi bi-eye"></i>
                                        View

                                    </button>

                                <?php
                                } else {
                                    echo '<span class="badge bg-danger">No Screenshot</span>';
                                }
                                ?>

                            </td>

                            <td>


                                <?php
                                if ($row['fees_status'] == 'paid') {
                                    echo '<span class="badge bg-success">Paid</span>';
                                } else {
                                    echo '<span class="badge bg-warning text-dark">Pending</span>';
                                }
                                ?>
                            </td>

                            <!-- Registration Slip -->
                            <td>

                                <?php
                                if ($row['fees_status'] == 'paid') {
                                ?>

                                    <a href="db/registration-slip.php?id=<?php echo $row['id']; ?>"
                                        class="btn btn-success btn-sm"
                                        target="_blank">

                                        <i class="bi bi-file-earmark-pdf"></i>
                                        Download PDF

                                    </a>

                                <?php
                                } else {
                                ?>

                                    <button class="btn btn-secondary btn-sm" disabled>

                                        <i class="bi bi-lock"></i>
                                        Disabled

                                    </button>

                                <?php
                                }
                                ?>

                            </td>

                            <!-- View Details -->
                            <td>

                                <button class="btn btn-primary btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#studentModal<?php echo $row['id']; ?>">

                                    <i class="bi bi-eye"></i>
                                    View

                                </button>

                            </td>
                            <td>

                                <?php
                                if ($row['fees_status'] == 'paid') {

                                    if (!empty($row['enroll_no'])) {
                                ?>

                                        <span class="badge bg-success mb-1">
                                            <?php echo $row['enroll_no']; ?>
                                        </span>

                                        <br>

                                        <button class="btn btn-success btn-sm" disabled>
                                            Generated
                                        </button>


                                        <button class="btn btn-warning btn-sm editEnrollment"
                                            data-id="<?php echo $row['id']; ?>"
                                            data-enroll="<?php echo $row['enroll_no']; ?>">

                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                    <?php
                                    } else {
                                    ?>

                                        <button class="btn btn-primary btn-sm generateEnrollment"
                                            data-id="<?php echo $row['id']; ?>">

                                            <i class="bi bi-file-earmark-text"></i>
                                            Generate
                                        </button>

                                    <?php
                                    }
                                } else {
                                    ?>

                                    <button class="btn btn-secondary btn-sm" disabled>
                                        <i class="bi bi-lock"></i>
                                        Locked
                                    </button>

                                <?php
                                }
                                ?>

                            </td>
                            <td>

                                <button class="btn btn-danger btn-sm deleteStudent"
                                    data-id="<?php echo $row['id']; ?>">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </td>

                        </tr>









                    <?php
                    }
                    ?>

                </tbody>

            </table>
            <?php

            mysqli_data_seek($query, 0);

            while ($row = mysqli_fetch_assoc($query)) {

            ?>

                <!-- PAYMENT SCREENSHOT MODAL -->

                <div class="modal fade"
                    id="feesModal<?php echo $row['id']; ?>"
                    tabindex="-1">

                    <div class="modal-dialog modal-dialog-centered modal-lg">

                        <div class="modal-content">

                            <div class="modal-header bg-dark text-white">

                                <h5 class="modal-title">

                                    Payment Screenshot

                                </h5>

                                <button type="button"
                                    class="btn-close btn-close-white"
                                    data-bs-dismiss="modal"></button>

                            </div>

                            <div class="modal-body text-center">

                                <img src="../center/uploads/payments/<?php echo $row['payment_screenshot']; ?>"
                                    class="img-fluid rounded shadow">

                            </div>

                        </div>

                    </div>

                </div>
                <!-- Fees Status -->


                <!-- MODAL START -->

                <div class="modal fade"
                    id="studentModal<?php echo $row['id']; ?>"
                    tabindex="-1">

                    <div class="modal-dialog modal-lg modal-dialog-scrollable">

                        <div class="modal-content">

                            <div class="modal-header bg-dark text-white">

                                <h5 class="modal-title">

                                    Student Full Details

                                </h5>

                                <button type="button"
                                    class="btn-close btn-close-white"
                                    data-bs-dismiss="modal"></button>

                            </div>

                            <div class="modal-body">

                                <div class="row">

                                    <!-- LEFT -->
                                    <div class="col-md-6 mb-3">

                                        <table class="table table-bordered">

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
                                                <th>Email</th>
                                                <td><?php echo $row['email']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>Mobile</th>
                                                <td><?php echo $row['mobile']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>DOB</th>
                                                <td><?php echo $row['dob']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Qualification</th>
                                                <td><?php echo $row['qualification']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>Gender</th>
                                                <td><?php echo $row['gender']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Registration Date</th>
                                                <td><?php echo date("d M Y", strtotime($row['created_at'])); ?></td>
                                            </tr>

                                        </table>

                                    </div>

                                    <!-- RIGHT -->
                                    <div class="col-md-6 mb-3">

                                        <table class="table table-bordered">

                                            <tr>
                                                <th>Department</th>
                                                <td><?php echo $row['depart_name']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>Course</th>
                                                <td><?php echo $row['course_name']; ?></td>
                                            </tr>



                                            <tr>
                                                <th>Address</th>
                                                <td><?php echo $row['address']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>State</th>
                                                <td><?php echo $row['state']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>City</th>
                                                <td><?php echo $row['city']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>PIN</th>
                                                <td><?php echo $row['pincode']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Session</th>
                                                <td><?php echo $row['session']; ?></td>
                                            </tr>



                                        </table>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- MODAL END -->

            <?php
            }
            ?>
        </div>

    </div>

</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    $(document).on('click', '.generateEnrollment', function() {

        var student_id = $(this).data('id');

        if (confirm('Generate Enrollment Number?')) {

            $.ajax({

                url: 'db/generate-enrollment.php',

                type: 'POST',

                data: {
                    student_id: student_id
                },

                success: function(response) {

                    if (response == 'success') {
                        alert('Enrollment Generated Successfully');

                        location.reload();
                    } else {
                        alert(response);
                    }

                }

            });

        }

    });
</script>
<script>
    $(document).on('click', '.deleteStudent', function() {

        var student_id = $(this).data('id');

        if (confirm('Are you sure you want to delete this student?')) {

            $.ajax({

                url: 'db/delete-student.php',

                type: 'POST',

                data: {
                    student_id: student_id
                },

                success: function(response) {

                    if (response == 'success') {
                        alert('Student Deleted Successfully');

                        location.reload();
                    } else {
                        alert('Something went wrong');
                    }

                }

            });

        }

    });
</script>
<script>
    document.getElementById('departmentFilter').addEventListener('change', function() {

        let dept_id = this.value;

        if (dept_id != '') {
            window.location.href = '?dept_id=' + dept_id;
        } else {
            window.location.href = 'all-cources.php';
        }

    });
</script>
<script>
    $(document).ready(function() {

        $('#studentTable').DataTable({

            responsive: false,
            scrollX: true,

            autoWidth: false,
            pageLength: 10,

            ordering: true

        });

    });
</script>
<script>
    $(document).on('change', '.feesToggle', function() {

        var student_id = $(this).data('id');

        $.ajax({

            url: "db/update-fees-status.php",
            type: "POST",
            data: {

                student_id: student_id

            },

            success: function(response) {

                location.reload();

            }

        });

    });
</script>
<script>
    $(document).on('click', '.editEnrollment', function() {

        let id = $(this).data('id');
        let currentEnroll = $(this).data('enroll');

        let newEnroll = prompt("Edit Enrollment Number:", currentEnroll);

        if (newEnroll != null && newEnroll != '') {

            $.ajax({
                url: 'db/update-enrollment.php',
                type: 'POST',
                data: {
                    id: id,
                    enroll_no: newEnroll
                },
                success: function(response) {

                    if (response.trim() === 'success') {
                        toastr.success("Enrollment Updated & Email Sent");
                        location.reload();

                    } else if (response.trim() === 'mail_failed') {
                        toastr.warning("Updated but Email Failed");

                    } else if (response.trim() === 'empty') {
                        toastr.error("Enrollment cannot be empty");

                    } else {
                        toastr.error("Update Failed");
                    }
                },
                error: function() {
                    toastr.error("Server Error");
                }
            });

        }

    });
</script>

<?php include 'footer.php' ?>