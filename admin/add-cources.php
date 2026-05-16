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

</style>

<div class="container-fluid py-4">

    <div class="row justify-content-center">

        <div class="col-lg-8 col-md-10 col-12">

            <div class="card shadow border-0 rounded-4 overflow-hidden">

                <!-- Header -->

                <div class="card-header bg-primary text-white py-3 px-4 d-flex justify-content-between align-items-center">

                    <div>

                        <h4 class="mb-0">

                            <i class="bi bi-journal-bookmark-fill me-2"></i>

                            Add Course

                        </h4>

                    </div>

                    <a href="all-cources.php" class="btn btn-light btn-sm">

                        <i class="bi bi-arrow-left"></i> Back

                    </a>

                </div>

                <!-- Body -->

                <div class="card-body p-4">

                    <form id="courseForm">

                        <!-- Department -->

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Select Department

                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-light">

                                    <i class="bi bi-building"></i>

                                </span>

                                <select name="dept_id"
                                        id="dept_id"
                                        class="form-select">

                                    <option value="">Select Department</option>

                                    <?php

                                    $department = mysqli_query($conn,"
                                    SELECT * FROM department
                                    ORDER BY depart_name ASC
                                    ");

                                    while($dept = mysqli_fetch_assoc($department))
                                    {
                                    ?>

                                    <option value="<?php echo $dept['id']; ?>">

                                        <?php echo $dept['depart_name']; ?>

                                    </option>

                                    <?php } ?>

                                </select>

                            </div>

                        </div>

                      
                           <!-- Course code -->

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Course Code

                            </label>
                             <div class="input-group">
                                        <span class="input-group-text bg-light">

                                                <i class="bi bi-book"></i>

                                            </span>
                                        <input type="text"
                                                name="course_code"
                                                id="course_code"
                                                class="form-control"
                                                placeholder="Example: BCA, BBA, etc." required>
                                    
                            </div>
                        </div>
                        <!-- Course Name -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Course Name

                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-light">

                                    <i class="bi bi-book"></i>

                                </span>

                                <input type="text"
                                       name="course_name"
                                       id="course_name"
                                       class="form-control"
                                       placeholder="Enter Course Name">

                            </div>

                        </div>

                        <!-- Fees -->

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Course Fees

                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-light">

                                    <i class="bi bi-currency-rupee"></i>

                                </span>

                                <input type="text"
                                       name="fees"
                                       id="fees"
                                       class="form-control"
                                       placeholder="Enter Course Fees">

                            </div>

                        </div>

                        <!-- Duration -->

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Course Duration

                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-light">

                                    <i class="bi bi-clock-history"></i>

                                </span>

                                <input type="text"
                                       name="duration"
                                       id="duration"
                                       class="form-control"
                                       placeholder="Example: 3 Years">

                            </div>

                        </div>

                        <!-- Eligibility -->

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Eligibility

                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-light">

                                    <i class="bi bi-person-check"></i>

                                </span>

                                <input type="text"
                                       name="eligiblity"
                                       id="eligiblity"
                                       class="form-control"
                                       placeholder="Example: 12th Pass">

                            </div>

                        </div>

                      

                        <!-- Buttons -->

                        <div class="d-flex justify-content-end gap-2">

                            <button type="reset"
                                    class="btn btn-light border px-4">

                                Reset

                            </button>

                            <button type="submit"
                                    class="btn btn-primary px-4"
                                    id="submitBtn">

                                Add Course

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- JQUERY -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- TOASTR -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>

$(document).ready(function(){

    $('#courseForm').submit(function(e){

        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({

            url: 'db/add-cource.php',

            type: 'POST',

            data: formData,

            contentType: false,

            processData: false,

            dataType: 'json',

            beforeSend:function(){

                $('#submitBtn').html('Please Wait...');

                $('#submitBtn').prop('disabled', true);

            },

            success:function(data){

                if(data.status == 'success'){

                    toastr.success(data.message);

                    $('#courseForm')[0].reset();

                }
                else
                {
                    toastr.error(data.message);
                }

            },

            error:function(xhr){

                console.log(xhr.responseText);

                toastr.error('Server Error');

            },

            complete:function(){

                $('#submitBtn').html('Add Course');

                $('#submitBtn').prop('disabled', false);

            }

        });

    });

});

</script>

<?php include 'footer.php'; ?>