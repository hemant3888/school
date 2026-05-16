<?php include 'header.php'; ?>
<style>

    .card {
    border-radius: 20px;
}

.form-control,
.input-group-text {
    height: 50px;
    border-radius: 10px;
}

textarea.form-control {
    height: auto;
}

.form-control:focus {
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

                <!-- Card Header -->
                <div class="card-header bg-primary text-white py-3 px-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0">
                            <i class="bi bi-building-add me-2"></i>
                            Add Department
                        </h4>
                    </div>

                    <a href="all-departments.php" class="btn btn-light btn-sm">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                </div>

                <!-- Card Body -->
                <div class="card-body p-4">

                   <form id="departmentForm">

    <!-- Department Name -->
    <div class="mb-4">
        <label class="form-label fw-semibold">
            Department Name
        </label>

        <div class="input-group">
            <span class="input-group-text bg-light">
                <i class="bi bi-bookmark-star"></i>
            </span>

            <input type="text"
                   name="department_name"
                   id="department_name"
                   class="form-control"
                   placeholder="Enter Department Name">
        </div>
    </div>
    <!-- Department Name -->
    <div class="mb-4">
        <label class="form-label fw-semibold">
            Short Name
        </label>

        <div class="input-group">
            <span class="input-group-text bg-light">
                <i class="bi bi-bookmark-star"></i>
            </span>

            <input type="text"
                   name="short_name"
                   id="short_name"
                   class="form-control"
                   placeholder="Enter Short Name">
        </div>
    </div>

    <!-- Description -->
    <div class="mb-4">
        <label class="form-label fw-semibold">
            Department Description
        </label>

        <textarea name="description"
                  id="description"
                  rows="5"
                  class="form-control"
                  placeholder="Enter Department Description"></textarea>
    </div>

    <!-- Buttons -->
    <div class="d-flex justify-content-end gap-2">

        <button type="reset" class="btn btn-light border px-4">
            Reset
        </button>

        <button type="submit" class="btn btn-primary px-4" id="submitBtn">
            Add Department
        </button>

    </div>

</form>

                </div>

            </div>

        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>

$(document).ready(function(){

    $('#departmentForm').submit(function(e){

        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({

            url: 'db/add-department.php',

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

                    $('#departmentForm')[0].reset();

                }else{

                    toastr.error(data.message);

                }

            },

            error:function(xhr){

                console.log(xhr.responseText);

                toastr.error('Server Error');

            },

            complete:function(){

                $('#submitBtn').html('Add Department');

                $('#submitBtn').prop('disabled', false);

            }

        });

    });

});

</script>
<?php include 'footer.php'; ?>
