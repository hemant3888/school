 <?php include 'header.php'; ?>

 <!-- ── PROFILE ── -->
 <main class="main" id="main" style="margin-left: 0px;">



     <div id="page-profile">
         <div class="sec-header">
             <div class="sec-title">Change Password</div>
         </div>
         <form id="passwordForm">

             <div class="profile-section">

                 <div class="form-row">

                     <div class="form-group">
                         <label>New Password</label>

                         <input type="password"
                             name="new_password"
                             id="new_password"
                             placeholder="Enter new password">
                     </div>

                     <div class="form-group">
                         <label>Confirm Password</label>

                         <input type="password"
                             name="confirm_password"
                             id="confirm_password"
                             placeholder="Confirm new password">
                     </div>

                 </div>

                 <button type="submit" class="submit-btn">
                     <i class="bi bi-check2-circle"></i>
                     &nbsp; Update Password
                 </button>

             </div>

         </form>
     </div><!-- /profile -->

 </main>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script>

$("#passwordForm").submit(function(e){

    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({

        url : "db/change-password.php",

        type : "POST",

        data : formData,

        processData : false,

        contentType : false,

        dataType : "json",

       success:function(response)
{

    if(response.status == "success")
    {

        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: response.message,
            showConfirmButton: false,
            timer: 3000
        });

        $("#passwordForm")[0].reset();

    }
    else
    {

        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: response.message,
            showConfirmButton: false,
            timer: 3000
        });

    }

}

    });

});

</script>

 <?php include 'footer.php'; ?>