<?php include 'header.php'; ?>

<style>

  

    /* MAIN CARD */

    .verification-card{

        border-radius:30px;

        overflow:hidden;

        box-shadow:0 15px 40px rgba(0,0,0,0.08);

        border:none;
            margin: 15px;

    }

    /* HEADER */

    .verification-header{

        background:#0065CD;

        padding:10px 5px;

        text-align:center;

        color:#fff;

    }

    .verification-header h2{

        font-size:20px;

        font-weight:700;

        margin-bottom:10px;

    }

    .verification-header p{

        margin:0;

        font-size:12px;

        opacity:0.9;

    }

    /* FORM */

    .verification-form{

        padding:30px;

    }

    .verification-form label{

        font-weight:600;

        margin-bottom:10px;

        color:#222;

    }

    .verification-form .form-control{

        height:40px;

        border-radius:14px;

        border:1px solid #dcdcdc;

        font-size:16px;

        padding-left:18px;

        box-shadow:none;

    }

    .verification-form .form-control:focus{

        border-color:#00b074;

        box-shadow:0 0 0 0.15rem rgba(0,176,116,0.15);

    }

    /* BUTTON */

    .verify-btn{

        height:34px;
        margin-top: 5px;

        border-radius:50px;

        font-size:12px;

        font-weight:600;

        background:#0065CD;

        border:none;

        transition:0.3s;

    }

    .verify-btn:hover{

        transform:translateY(-1px);

        box-shadow:#FC9928;

    }

    /* RESULT */

    #verificationResult{

        margin-top:40px;

    }

    /* MOBILE */

    @media(max-width:768px){

        .verification-form{

            padding:20px 10px;

        }

        .verification-header h2{

            font-size:20px;

        }
         .verification-form .form-control{

        height:30px;

    


        font-size:12px;

        padding-left:12px;

        

    }

    }

</style>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8 col-md-10 col-12">

            <div class="card verification-card">

                <!-- HEADER -->

                <div class="verification-header">

                    <h2>

                        <i class="bi bi-patch-check-fill"></i>

                       ID Card
                    </h2>

                    <p>

                        Enter Enrollment Number & Date of Birth

                    </p>

                </div>

                <!-- FORM -->

                <div class="verification-form">

                    <form id="verifyForm">

                        <div class="mb-4">

                            <label>

                                Enrollment Number

                            </label>

                            <input type="text"
                                name="enrollment_no"
                                class="form-control"
                                placeholder="Enter Enrollment Number"
                                required>

                        </div>

                        <div class="mb-4">

                            <label>

                                Date of Birth

                            </label>

                            <input type="date"
                                name="dob"
                                class="form-control"
                                required>

                        </div>

                        <button type="submit"
                            class="btn btn-success verify-btn w-100">

                            <i class="bi bi-search"></i>

                            Verify Student

                        </button>

                    </form>

                    <!-- RESULT -->

                    <div id="verificationResult"></div>

                </div>

            </div>

        </div>

    </div>

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

$('#verifyForm').submit(function(e){

    e.preventDefault();

    $.ajax({

        url: 'db/id-card-verify.php',

        type: 'POST',

        data: $(this).serialize(),

        beforeSend:function(){

            $('#verificationResult').html(`
            
                <div class="text-center">

                    <div class="spinner-border text-success"></div>

                </div>

            `);

        },

        success:function(response){

            $('#verificationResult').html(response);

        },

        error:function(xhr){

            console.log(xhr.responseText);

            $('#verificationResult').html(`
            
                <div class="alert alert-danger">
                    AJAX Error
                </div>

            `);

        }

    });

});

</script>

<?php include 'footer.php'; ?>