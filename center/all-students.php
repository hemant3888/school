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

        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <h5 class="card-title mb-0">All Students</h5>
        </div>

        <div class="table-responsive">

            <table id="studentTable"
                class="table table-bordered table-striped nowrap align-middle"
                style="width:100%">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Student</th>
                        <th>Registration No.</th>
                        <th>Enrollment No.</th>
                        <th>Department</th>
                        <th>Course</th>
                        <th>Payment</th>
                        <th>Fees Status</th>
                        <th>Registration Slip</th>
                        <th>Student Details</th>
                        <th>Action</th>


                    </tr>

                </thead>

                <tbody>

                    <?php

                    $where = "";

                    if (isset($_GET['dept_id']) && $_GET['dept_id'] != '') {

                        $dept_id = mysqli_real_escape_string($conn, $_GET['dept_id']);

                        $where = "WHERE students.depart_id = '$dept_id'";
                    }

                    $sql = "SELECT students.*,
                        department.depart_name,
                        course.course_name

                        FROM students

                        LEFT JOIN department
                        ON department.id = students.depart_id

                        LEFT JOIN course
                        ON course.id = students.course_id

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
                                        <img src="uploads/students/<?php echo $row['photo']; ?>"
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
                            <!-- enrollment number -->
                            <td>
                                <?php
                                if (!empty($row['enroll_no'])) {
                                    echo $row['enroll_no'];
                                } else {
                                    echo '<span class="badge bg-danger">Pending</span>';
                                }

                                ?>
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

                                <div class="form-check form-switch">

                                    <input class="form-check-input feesToggle"
                                        type="checkbox"
                                        data-id="<?php echo $row['id']; ?>"
                                        <?php if ($row['fees_status'] == 'paid') {
                                            echo "checked";
                                        } ?>>

                                    <label class="form-check-label">

                                        <?php
                                        if ($row['fees_status'] == 'paid') {
                                            echo '<span class="badge bg-success">Paid</span>';
                                        } else {
                                            echo '<span class="badge bg-warning text-dark">Pending</span>';
                                        }
                                        ?>

                                    </label>

                                </div>

                            </td>

                            <!-- Registration Slip -->
                            <td>

                                <?php
                                if ($row['fees_status'] == 'paid') {
                                ?>

                                    <a href="db/generate-slip.php?id=<?php echo $row['id']; ?>"
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

                                <button class="btn btn-danger btn-sm deleteStudent"
                                    data-id="<?php echo $row['id']; ?>">

                                    <i class="bi bi-trash"></i>

                                </button>
                                <button class="btn btn-info btn-sm editstudent" data-id="<?php echo $row['id']; ?>">


                                    <i class="bi bi-pencil"></i>
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

                                <img src="uploads/payments/<?php echo $row['payment_screenshot']; ?>"
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
<!-- EDIT STUDENT MODAL -->

<div class="modal fade" id="editStudentModal" tabindex="-1">

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Edit Student
                </h5>

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <form id="editStudentForm" enctype="multipart/form-data">

                    <input type="hidden"
                        name="student_id"
                        id="edit_student_id">

                    <div class="row">

                        <!-- LEFT COLUMN -->

                        <div class="col-md-6">

                            <!-- STUDENT NAME -->

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Student Name
                                </label>

                                <input type="text"
                                    name="stu_name"
                                    id="edit_stu_name"
                                    class="form-control">

                            </div>
                            <!-- STUDENT PHOTO -->

                            <div class="mb-3">

                                <label class="form-label fw-semibold">

                                    Student Photo

                                </label>

                                <input type="file"
                                    name="image"
                                    class="form-control">

                                <small class="text-danger">

                                    Max Size: 2MB | JPG, PNG, JPEG

                                </small>

                            </div>

                            <!-- FATHER NAME -->

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Father Name
                                </label>

                                <input type="text"
                                    name="father_name"
                                    id="edit_father_name"
                                    class="form-control">

                            </div>

                            <!-- MOTHER NAME -->

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Mother Name
                                </label>

                                <input type="text"
                                    name="mother_name"
                                    id="edit_mother_name"
                                    class="form-control">

                            </div>
                            <!-- Department -->

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Department
                                </label>

                                <select
                                    name="department_id"
                                    id="edit_depart"
                                    class="form-control">

                                    <option value="">
                                        Select Department
                                    </option>

                                    <?php

                                    $department_query = mysqli_query($conn, "
    
        SELECT * FROM department
    
    ");

                                    while ($department = mysqli_fetch_assoc($department_query)) {
                                    ?>

                                        <option value="<?php echo $department['id']; ?>">

                                            <?php echo $department['depart_name']; ?>

                                        </option>

                                    <?php
                                    }
                                    ?>

                                </select>

                            </div>
                            <!-- MOBILE -->

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Mobile
                                </label>

                                <input type="text"
                                    name="mobile"
                                    id="edit_mobile"
                                    class="form-control">

                            </div>

                            <!-- EMAIL -->

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Email
                                </label>

                                <input type="email"
                                    name="email"
                                    id="edit_email"
                                    class="form-control">

                            </div>

                            <!-- DOB -->

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    DOB
                                </label>

                                <input type="date"
                                    name="dob"
                                    id="edit_dob"
                                    class="form-control">

                            </div>

                            <!-- GENDER -->

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Gender
                                </label>

                                <select name="gender"
                                    id="edit_gender"
                                    class="form-control">

                                    <option value="Male">Male</option>

                                    <option value="Female">Female</option>

                                    <option value="Other">Other</option>

                                </select>

                            </div>

                        </div>

                        <!-- RIGHT COLUMN -->

                        <div class="col-md-6">

                            <!-- QUALIFICATION -->

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Qualification
                                </label>

                                <input type="text"
                                    name="qualification"
                                    id="edit_qualification"
                                    class="form-control">

                            </div>

                            <!-- FEES -->

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Fees
                                </label>

                                <input type="text"
                                    name="fees"
                                    id="edit_fees"
                                    class="form-control">

                            </div>

                            <!-- SESSION -->

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Session
                                </label>

                                <input type="text"
                                    name="session"
                                    id="edit_session"
                                    class="form-control">

                            </div>

                            <!-- course -->

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Course
                                </label>

                                <select
                                    name="course_id"
                                    id="edit_course"
                                    class="form-control">

                                    <option value="">
                                        Select Course
                                    </option>

                                </select>

                            </div>



                            <!-- STATE -->

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    State
                                </label>

                                <input type="text"
                                    name="state"
                                    id="edit_state"
                                    class="form-control">

                            </div>

                            <!-- CITY -->

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    City
                                </label>

                                <input type="text"
                                    name="city"
                                    id="edit_city"
                                    class="form-control">

                            </div>

                            <!-- PINCODE -->

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Pincode
                                </label>

                                <input type="text"
                                    name="pincode"
                                    id="edit_pincode"
                                    class="form-control">

                            </div>

                            <!-- ADDRESS -->

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Address
                                </label>

                                <textarea
                                    name="address"
                                    id="edit_address"
                                    rows="4"
                                    class="form-control"></textarea>

                            </div>

                        </div>

                    </div>

                    <div class="text-end">

                        <button type="submit"
                            class="btn btn-primary">

                            <i class="bi bi-check-circle"></i>

                            Update Student

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
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
    $('#edit_depart').change(function() {

        let department_id = $(this).val();

        $.ajax({

            url: 'db/fetch-course.php',

            type: 'POST',

            data: {
                department_id: department_id
            },

            success: function(data) {

                $('#edit_course').html(data);

            }

        });

    });
</script>


<script>
    $(document).on('click', '.editstudent', function() {

        let student_id = $(this).data('id');

        $.ajax({

            url: 'db/get-student.php',

            type: 'POST',

            data: {
                student_id: student_id
            },

            success: function(response) {

                let data = JSON.parse(response);

                if (data.status == 'success') {

                    $('#edit_student_id').val(data.student.id);

                    $('#edit_stu_name').val(data.student.stu_name);

                    $('#edit_mobile').val(data.student.mobile);
                    $('#edit_depart').val(data.student.depart_id);
                    $('#edit_course').val(data.student.course_id);

                    $('#edit_email').val(data.student.email);
                    $('#edit_state').val(data.student.state);
                    $('#edit_city').val(data.student.city);
                    $('#edit_pincode').val(data.student.pincode);
                    $('#edit_session').val(data.student.session);
                    $('#edit_fees').val(data.student.fees);
                    $('#edit_qualification').val(data.student.qualification);
                    $('#edit_dob').val(data.student.dob);
                    $('#edit_mother_name').val(data.student.mother_name);
                    $('#edit_father_name').val(data.student.father_name);

                    $('#edit_address').val(data.student.address);

                    $('#editStudentModal').modal('show');

                } else {

                    alert(data.message);

                }

            }

        });

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
    $('#editStudentForm').submit(function(e){

    e.preventDefault();
       let formData = new FormData(this);

    $.ajax({

        url:'db/update-student.php',

        type:'POST',

         data:formData,
           processData:false,

        contentType:false,

        success:function(response)
        {

            let res = JSON.parse(response);

            if(res.status == 'success')
            {

                toastr.success(res.message);

                $('#editStudentModal').modal('hide');

                location.reload();

            }
            else
            {

                toastr.error(res.message);

            }

        }

    });

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

<?php include 'footer.php' ?>