<?php include 'header.php'; ?>

<style>
    .card {
        border-radius: 20px;
    }

    .form-control,
    .form-select,
    .input-group-text {
        height: 50px;
        border-radius: 10px;
    }

    textarea.form-control {
        height: auto;
    }

    .form-control:focus,
    .form-select:focus {
        box-shadow: none;
        border-color: #0d6efd;
    }

    .btn {
        border-radius: 10px;
        font-weight: 500;
    }

    .card-header {
        border-bottom: none;
    }

    .section-title {
        font-size: 18px;
        font-weight: 600;
        color: #0d6efd;
        margin-bottom: 20px;
        border-bottom: 1px dashed #ddd;
        padding-bottom: 10px;
    }

    small {
        font-size: 12px;
    }
</style>

<div class="container-fluid py-4">

    <div class="row justify-content-center">

        <div class="col-lg-11">

            <div class="card shadow border-0">

                <!-- HEADER -->

                <div class="card-header bg-primary text-white py-3 px-4 d-flex justify-content-between align-items-center">

                    <h4 class="mb-0">

                        <i class="bi bi-person-plus-fill me-2"></i>

                        Student Registration

                    </h4>

                    <a href="dashboard.php" class="btn btn-light btn-sm">

                        <i class="bi bi-arrow-left"></i> Back

                    </a>

                </div>

                <!-- BODY -->

                <div class="card-body p-4">

                    <form id="studentForm" enctype="multipart/form-data">

                        <!-- PERSONAL DETAILS -->
                        <input type="hidden"
                            name="center_id"
                            value="<?php echo $center; ?>">
                        <div class="section-title">

                            Personal Details

                        </div>

                        <div class="row">

                            <!-- STUDENT NAME -->

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">

                                    Student Name

                                </label>

                                <input type="text"
                                    name="student_name"
                                    class="form-control"
                                    placeholder="Enter Student Name">

                            </div>

                            <!-- FATHER NAME -->

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">

                                    Father Name

                                </label>

                                <input type="text"
                                    name="father_name"
                                    class="form-control"
                                    placeholder="Enter Father Name">

                            </div>

                            <!-- MOTHER NAME -->

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">

                                    Mother Name

                                </label>

                                <input type="text"
                                    name="mother_name"
                                    class="form-control"
                                    placeholder="Enter Mother Name">

                            </div>

                            <!-- MOBILE -->

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">

                                    Mobile Number

                                </label>

                                <input type="number"
                                    name="mobile"
                                    class="form-control"
                                    placeholder="Enter Mobile Number">

                            </div>

                            <!-- EMAIL -->

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">

                                    Email Address

                                </label>

                                <input type="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="Enter Email Address">

                            </div>

                            <!-- DOB -->

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">

                                    Date Of Birth

                                </label>

                                <input type="date"
                                    name="dob"
                                    class="form-control">

                            </div>

                            <!-- GENDER -->

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">

                                    Gender

                                </label>

                                <select name="gender" class="form-select">

                                    <option value="">Select Gender</option>

                                    <option value="Male">Male</option>

                                    <option value="Female">Female</option>

                                    <option value="Other">Other</option>

                                </select>

                            </div>

                            <!-- QUALIFICATION -->

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">

                                    Qualification

                                </label>

                                <input type="text"
                                    name="qualification"
                                    class="form-control"
                                    placeholder="Enter Qualification">

                            </div>

                            <!-- PHOTO -->

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">

                                    Student Photo

                                </label>

                                <input type="file"
                                    name="photo"
                                    class="form-control">

                                <small class="text-danger">

                                    Max Size: 2MB | JPG, PNG, JPEG

                                </small>

                            </div>

                        </div>

                        <!-- COURSE DETAILS -->

                        <div class="section-title">

                            Course Details

                        </div>

                        <div class="row">

                            <!-- DEPARTMENT -->

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">

                                    Department

                                </label>

                                <select name="department_id"
                                    id="department_id"
                                    class="form-select">

                                    <option value="">Select Department</option>

                                    <?php

                                    $department = mysqli_query($conn, "
                                    SELECT * FROM department
                                    ORDER BY depart_name ASC
                                    ");

                                    while ($dept = mysqli_fetch_assoc($department)) {
                                    ?>

                                        <option value="<?php echo $dept['id']; ?>">

                                            <?php echo $dept['depart_name']; ?>

                                        </option>

                                    <?php } ?>

                                </select>

                            </div>

                            <!-- COURSE -->

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">

                                    Course

                                </label>

                                <select name="course_id"
                                    id="course_id"
                                    class="form-select">

                                    <option value="">Select Course</option>

                                </select>

                            </div>
                            <!-- COURSE DETAILS BOX -->

                            <div class="col-md-6 mb-4">

                                <div class="card border-0 shadow-sm bg-light rounded-4 p-3">

                                    <h6 class="fw-bold text-primary mb-3">

                                        <i class="bi bi-info-circle me-2"></i>

                                        Course Details

                                    </h6>

                                    <p class="mb-2">

                                        <strong>Fees :</strong>

                                        <span id="courseFees">

                                            ₹0

                                        </span>

                                    </p>

                                    <p class="mb-2">

                                        <strong>Duration :</strong>

                                        <span id="courseDuration">

                                            --

                                        </span>

                                    </p>

                                    <p class="mb-0">

                                        <strong>Eligibility :</strong>

                                        <span id="courseEligibility">

                                            --

                                        </span>

                                    </p>

                                </div>

                            </div>
                            <?php

                            // CENTER QR FETCH

                            // $center_id = $_SESSION['center_id'];

                            $getQr = mysqli_query($conn, "
                                        SELECT qr_code 
                                        FROM center 
                                        WHERE id='$center'
                                        ");

                            $qrData = mysqli_fetch_assoc($getQr);

                            $qr_image = $qrData['qr_code'];

                            ?>


                            <div class="col-md-6 mb-4">

                                <!-- SHOW QR BUTTON -->

                                <button type="button"
                                    class="btn btn-success btn-sm rounded-pill"
                                    data-bs-toggle="modal"
                                    data-bs-target="#showQrModal">

                                    <i class="bi bi-qr-code-scan"></i>

                                    Show QR Code

                                </button>

                            </div>

                            <!-- FEES -->

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">

                                    Deposit Fees

                                </label>

                                <input type="number"
                                    name="fees"
                                    class="form-control"
                                    placeholder="Enter Fees Amount">

                                <small class="text-danger">

                                    Minimum Fees ₹1000 Required

                                </small>

                            </div>

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">

                                    Payment Screenshot

                                </label>

                                <input type="file"
                                    name="payment_screenshot"
                                    class="form-control">

                                <small class="text-danger">

                                    PNG, JPG, JPEG, PDF | Max 1MB

                                </small>

                            </div>
                            

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">

                                    Session

                                </label>
                                 <input type="text"
                                    name="session"
                                    class="form-control" placeholder="Example: May 2026 - May 2027">
                                

                            </div>

                        </div>

                        <!-- ADDRESS -->

                        <div class="section-title">

                            Address Details

                        </div>

                        <div class="row">

                            <div class="col-md-12 mb-4">

                                <label class="form-label fw-semibold">

                                    Full Address

                                </label>

                                <textarea name="address"
                                    rows="4"
                                    class="form-control"
                                    placeholder="Enter Full Address"></textarea>

                            </div>

                            <div class="col-md-4 mb-4">

                                <label class="form-label fw-semibold">

                                    State

                                </label>

                                <input type="text"
                                    name="state"
                                    class="form-control">

                            </div>

                            <div class="col-md-4 mb-4">

                                <label class="form-label fw-semibold">

                                    City

                                </label>

                                <input type="text"
                                    name="city"
                                    class="form-control">

                            </div>

                            <div class="col-md-4 mb-4">

                                <label class="form-label fw-semibold">

                                    Pincode

                                </label>

                                <input type="number"
                                    name="pincode"
                                    class="form-control">

                            </div>

                        </div>

                        <!-- BUTTON -->

                        <div class="text-end">

                            <button type="submit"
                                class="btn btn-primary px-5"
                                id="submitBtn">

                                Register Student

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>
<!-- QR CODE MODAL -->

<div class="modal fade"
    id="showQrModal"
    tabindex="-1"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 shadow-lg rounded-4">

            <!-- HEADER -->

            <div class="modal-header bg-success text-white">

                <h5 class="modal-title">

                    <i class="bi bi-qr-code"></i>

                    Scan QR Code

                </h5>

                <button type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal"></button>

            </div>

            <!-- BODY -->

            <div class="modal-body text-center">

                <?php if (!empty($qr_image) && file_exists('uploads/' . $qr_image)) { ?>

                    <img src="uploads/<?php echo $qr_image; ?>"
                        class="img-fluid rounded-4 border p-2 bg-light"
                        style="max-height:350px; object-fit:contain;">

                <?php } else { ?>

                    <div class="alert alert-danger mb-0">

                        QR Code Not Available

                    </div>

                <?php } ?>

            </div>

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function() {

        // LOAD COURSES

        $('#department_id').change(function() {

            let department_id = $(this).val();

            // RESET COURSE DETAILS

            $('#courseFees').html('₹0');

            $('#courseDuration').html('--');

            $('#courseEligibility').html('--');

            $.ajax({

                url: 'db/fetch-courses.php',

                type: 'POST',

                data: {
                    department_id: department_id
                },

                success: function(data) {

                    $('#course_id').html(data);

                }

            });

        });

        // FETCH COURSE DETAILS

        $('#course_id').change(function() {

            let course_id = $(this).val();

            $.ajax({

                url: 'db/fetch-course-details.php',

                type: 'POST',

                data: {
                    course_id: course_id
                },

                dataType: 'json',

                success: function(response) {

                    $('#courseFees').html('₹' + response.fees);

                    $('#courseDuration').html(response.duration);

                    $('#courseEligibility').html(response.eligibility);

                }

            });

        });

        // SUBMIT FORM

        $('#studentForm').submit(function(e) {

            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({

                url: 'db/add-student.php',

                type: 'POST',

                data: formData,

                contentType: false,

                processData: false,

                dataType: 'json',

                beforeSend: function() {

                    $('#submitBtn').html('Please Wait...');

                    $('#submitBtn').prop('disabled', true);

                },

                success: function(response) {

                    if (response.status == 'success') {

                        toastr.success(response.message);

                        $('#studentForm')[0].reset();

                    } else {

                        toastr.error(response.message);

                    }

                },

                error: function(xhr) {

                    console.log(xhr.responseText);

                    toastr.error('Server Error');

                },

                complete: function() {

                    $('#submitBtn').html('Register Student');

                    $('#submitBtn').prop('disabled', false);

                }

            });

        });

    });
</script>

<?php include 'footer.php'; ?>