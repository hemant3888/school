<?php include 'header.php'; ?>

<style>
    /* body{
            background:#f5f5f5;
            font-family: Arial, sans-serif;
        } */

    .main-wrapper {
        background: #fff;
        padding: 25px;
        margin: 30px auto;
        border: 1px solid #ddd;
        border-radius: 6px;
        width: 80%;
    }

    .section-title {
        font-size: 34px;
        font-weight: bold;
        color: #0d2b66;
        margin-bottom: 25px;
        border-bottom: 2px solid #f97316;
        display: inline-block;
        padding-bottom: 8px;
    }

    .form-group label {
        font-size: 12px;
        font-weight: 600;
        color: #333;
    }

    .required {
        color: red;
    }

    .form-control {
        border-radius: 2px;
        height: 34px;
        box-shadow: none;
    }

    textarea.form-control {
        height: 60px;
        resize: none;
    }

    .upload-note {
        font-size: 11px;
        color: #666;
        margin-top: 5px;
        line-height: 18px;
    }

    .divider {
        border-top: 1px solid #ddd;
        margin: 30px 0;
    }

    .captcha-box {
        border: 1px solid #ddd;
        width: 300px;
        height: 78px;
        padding: 15px;
        float: right;
        margin-top: 20px;
        background: #fafafa;
    }

    .submit-btn {
        margin-top: 20px;
        float: right;
        clear: both;
    }

    .btn-primary {
        background: #4285f4;
        border-color: #4285f4;
        padding: 10px 25px;
    }

    @media(max-width:767px) {

        .section-title {
            font-size: 24px;
        }

        .main-wrapper {
            width: 100%;
        }

        .captcha-box {
            width: 100%;
            float: none;
        }

        .submit-btn {
            width: 100%;
        }

        .submit-btn .btn {
            width: 100%;
        }
    }
</style>


<div class="container">
    <div class="main-wrapper">

        <!-- Personal Details -->
        <h2 class="section-title">Franchiser Personal Details</h2>

        <form id="franchiseForm" enctype="multipart/form-data">

            <!-- Owner Details -->
            <!-- <h3>Owner Details</h3> -->

            <div class="row">

                <div class="col-md-4">
                    <label>Name *</label>
                    <input type="text" name="name" id="name" class="form-control capitalize">
                    <small class="text-danger error_name"></small>
                </div>

                <div class="col-md-4">
                    <label>Father Name *</label>
                    <input type="text" name="father_name" id="father_name" class="form-control capitalize">
                    <small class="text-danger error_father_name"></small>
                </div>

                <div class="col-md-4">
                    <label>Mother Name *</label>
                    <input type="text" name="mother_name" id="mother_name" class="form-control capitalize">
                    <small class="text-danger error_mother_name"></small>
                </div>

            </div>

            <br>

            <div class="row">

                <div class="col-md-4">
                    <label>Phone *</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                    <small class="text-danger error_phone"></small>
                </div>

                <div class="col-md-4">
                    <label>Aadhar No *</label>
                    <input type="text" name="aadhar_no" id="aadhar_no" class="form-control">
                    <small class="text-danger error_aadhar_no"></small>
                </div>

                <div class="col-md-4">
                    <label>Address *</label>
                    <textarea name="address" id="address" class="form-control capitalize"></textarea>
                    <small class="text-danger error_address"></small>
                </div>

            </div>

            <br>

            <div class="row">

                <div class="col-md-4">
                    <label>City *</label>
                    <input type="text" name="city" id="city" class="form-control capitalize">
                    <small class="text-danger error_city"></small>
                </div>

                <div class="col-md-4">
                    <label>District *</label>
                    <input type="text" name="district" id="district" class="form-control capitalize">
                    <small class="text-danger error_district"></small>
                </div>

                <div class="col-md-4">
                    <label>State *</label>
                    <input type="text" name="state" id="state" class="form-control capitalize">
                    <small class="text-danger error_state"></small>
                </div>

            </div>

            <br>

            <div class="row">

                <div class="col-md-6">
                    <label>Email *</label>
                    <input type="email" name="email" id="email" class="form-control">
                    <small class="text-danger error_email"></small>
                </div>

            </div>

            <br>

            <div class="row">

                <div class="col-md-6">
                    <label>Photo *</label>
                    <input type="file" name="photo" id="photo" class="form-control" accept=".jpg,.jpeg,.png">

                    <small>
                        Only JPG, JPEG, PNG allowed.
                    </small>

                    <small class="text-danger error_photo"></small>
                </div>

                <div class="col-md-6">
                    <label>Document (PDF) *</label>
                    <input type="file" name="document" id="document" class="form-control" accept=".pdf">

                    <small>
                        Only PDF allowed.
                    </small>

                    <small class="text-danger error_document"></small>
                </div>

            </div>

            <hr>

            <!-- Centre Details -->
            <h3 class="section-title">Institute / Centre Details</h3>

            <div class="row">

                <div class="col-md-4">
                    <label>Centre Name *</label>
                    <input type="text" name="centre_name" id="centre_name" class="form-control capitalize">
                    <small class="text-danger error_centre_name"></small>
                </div>

            </div>

            <br>

            <div class="row">

                <div class="col-md-6">
                    <label>Centre Address *</label>
                    <textarea name="centre_address" id="centre_address" class="form-control capitalize"></textarea>
                    <small class="text-danger error_centre_address"></small>
                </div>

                <div class="col-md-6">
                    <label>Centre Landmark *</label>
                    <textarea name="centre_landmark" id="centre_landmark" class="form-control"></textarea>
                    <small class="text-danger error_centre_landmark"></small>
                </div>

            </div>

            <br>

            <div class="row">

                <div class="col-md-4">
                    <label>Centre City *</label>
                    <input type="text" name="centre_city" id="centre_city" class="form-control capitalize">
                    <small class="text-danger error_centre_city"></small>
                </div>

                <div class="col-md-4">
                    <label>Centre District *</label>
                    <input type="text" name="centre_district" id="centre_district" class="form-control capitalize">
                    <small class="text-danger error_centre_district"></small>
                </div>

                <div class="col-md-4">
                    <label>Centre State *</label>
                    <input type="text" name="centre_state" id="centre_state" class="form-control capitalize">
                    <small class="text-danger error_centre_state"></small>
                </div>

            </div>

            <br>

            <div class="row">

                <div class="col-md-6">
                    <label>Centre Email *</label>
                    <input type="email" name="centre_email" id="centre_email" class="form-control">
                    <small class="text-danger error_centre_email"></small>
                </div>

                <div class="col-md-6">
                    <label>Centre Phone *</label>
                    <input type="text" name="centre_phone" id="centre_phone" class="form-control">
                    <small class="text-danger error_centre_phone"></small>
                </div>

            </div>

            <br>

            <div class="row">

                <div class="col-md-6">
                    <label>Centre Document (PDF) *</label>

                    <input type="file"
                        name="centre_document"
                        id="centre_document"
                        class="form-control"
                        accept=".pdf">

                    <small>
                        Only PDF allowed.
                    </small>

                    <small class="text-danger error_centre_document"></small>
                </div>

            </div>

            <br>

            <button type="submit" id="submitBtn" class="btn btn-primary">
                Submit
            </button>

        </form>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    $(document).on('input', '.capitalize', function () {

    let value = $(this).val();

    value = value.toLowerCase().replace(/\b\w/g, function(char){

        return char.toUpperCase();

    });

    $(this).val(value);

});

$('#franchiseForm').submit(function(e){

    e.preventDefault();

    let formData = new FormData(this);

    $('.text-danger').html('');

    $('#submitBtn').prop('disabled', true).text('Processing...');

    $.ajax({

        url : 'db/insert-franchise.php',

        type : 'POST',

        data : formData,

        processData : false,

        contentType : false,

        dataType : 'json',

        success:function(res){

            $('#submitBtn').prop('disabled', false).text('Submit');

            console.log(res);

            if(res.status == 'success'){

                alert(res.message);

                $('#franchiseForm')[0].reset();

            }

            if(res.status == 'error'){

                $.each(res.errors,function(key,value){

                    $('.error_'+key).html(value);

                });

            }

        },

        error:function(xhr){

            $('#submitBtn').prop('disabled', false).text('Submit');

            console.log(xhr.responseText);

            alert('Something went wrong');

        }

    });

});

</script>

<?php include 'footer.php'; ?>