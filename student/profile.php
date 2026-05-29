 <?php include 'header.php'; ?>

 <!-- ── PROFILE ── -->
 <main class="main" id="main" style="margin-left: 0px;">

   <div id="page-profile">
     <div class="sec-header">
       <div class="sec-title">My Profile</div>
     </div>
     <div class="profile-section">
       <div class="pf-header">
         <div class="pf-av">
          <img src="../center/uploads/students/<?php echo $photo; ?>" alt="Profile">
        </div>
         <h3><?php echo $name; ?></h3>
         <p><?php echo $course;?></p>
         <div class="pbadge" style="margin-top:9px"><?php echo $enrollment; ?></div>
       </div>
       <form id="profileForm" enctype="multipart/form-data">

         <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

         <div class="form-row">

           <div class="form-group">
             <label>Full Name</label>

             <input type="text"
               name="name"
               value="<?php echo $name; ?>" readonly>
           </div>

           <div class="form-group">
             <label>Enrollment Number</label>

             <input type="text"
               value="<?php echo $enrollment; ?>"
               readonly>
           </div>

         </div>

         <div class="form-row">

           <div class="form-group">
             <label>Email Address</label>

             <input type="email"
               name="email"
               value="<?php echo $email; ?>">
           </div>

           <div class="form-group">
             <label>Mobile Number</label>

             <input type="tel"
               name="mobile"
               value="<?php echo $mobile; ?>">
           </div>

         </div>

         <div class="form-row">

           <div class="form-group">
             <label>Department</label>

             <input type="text"
               value="<?php echo $department; ?>"
               readonly>
           </div>

           <div class="form-group">
             <label>Current Course</label>

             <input type="text"
               value="<?php echo $course; ?>"
               readonly>
           </div>

         </div>

         <div class="form-row full">

           <div class="form-group">

             <label>Upload Profile Photo</label>

             <div class="upload-box"
               onclick="document.getElementById('fi').click()">

               <i class="bi bi-cloud-arrow-up"></i>

               <p>Tap to upload photo</p>

               <span>JPG,JPEG,PNG · Max 2MB</span>

             </div>

             <input type="file"
               name="photo"
               id="fi"
               accept="image/*"
               style="display:none">

           </div>

         </div>

         <button type="submit" class="submit-btn">
           <i class="bi bi-check2-circle"></i>
           &nbsp; Update Profile
         </button>

       </form>
     </div>
   </div><!-- /profile -->
 </main>
 <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script>
   $("#profileForm").submit(function(e) {

     e.preventDefault();

     let formData = new FormData(this);

     $.ajax({

       url: "db/edit-profile.php",

       type: "POST",

       data: formData,

       processData: false,

       contentType: false,

       dataType: "json",

       success: function(response) {

         if (response.status == "success") {

           Swal.fire({
             icon: 'success',
             title: 'Success',
             text: response.message
           });

         } else {

           Swal.fire({
             icon: 'error',
             title: 'Error',
             text: response.message
           });

         }

       }

     });

   });
 </script>
 <?php include 'footer.php'; ?>