<?php include 'header.php'; ?>



<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>

      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card" style="border: 1px solid #00b074;">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="assets/uploads/<?php echo (!empty($image) && file_exists('assets/uploads/' . $image))
                                      ? $image
                                      : 'user.png'; ?>"
            alt="Profile"
            class="rounded-circle">

          <h3><b><?php echo $name; ?></b></h3>
          <h3><?php echo $email; ?></h3>

        </div>
      </div>
      <div class="text-center my-2">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateQrModal">
          <i class="bi bi-qr-code"></i> Update QR
        </button>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card" style="border: 1px solid #00b074;">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">

              <h5 class="card-title">Profile Details</h5>

              <!-- <div class="row">
                <div class="col-lg-3 col-md-4 label ">User Name:</div>
                <div class="col-lg-9 col-md-8"><?php echo $username; ?></div>
              </div> -->

              <div class="row">
                <div class="col-lg-3 col-md-4 label "> Name:</div>
                <div class="col-lg-9 col-md-8"><?php echo $name; ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Mobile:</div>
                <div class="col-lg-9 col-md-8"><?php echo $mobile; ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email:</div>
                <div class="col-lg-9 col-md-8"><?php echo $email ?></div>
              </div>


            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <form id="profileForm" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $id; ?>" />

                <div id="message"></div>

                <div class="row mb-3">

                  <label class="col-md-4 col-lg-3 col-form-label">
                    Profile Image:
                  </label>

                  <div class="col-md-8 col-lg-9">

                    <input type="file"
                      name="image"
                      class="form-control">

                  </div>

                </div>

                <div class="row mb-3">

                  <label class="col-md-4 col-lg-3 col-form-label">
                    Name:
                  </label>

                  <div class="col-md-8 col-lg-9">

                    <input name="name"
                      type="text"
                      class="form-control"
                      value="<?php echo $name; ?>">

                  </div>

                </div>

                <div class="row mb-3">

                  <label class="col-md-4 col-lg-3 col-form-label">
                    Mobile:
                  </label>

                  <div class="col-md-8 col-lg-9">

                    <input name="mobile"
                      type="text"
                      class="form-control"
                      value="<?php echo $mobile; ?>">

                  </div>

                </div>

                <div class="row mb-3">

                  <label class="col-md-4 col-lg-3 col-form-label">
                    Email:
                  </label>

                  <div class="col-md-8 col-lg-9">

                    <input name="email"
                      type="email"
                      class="form-control"
                      value="<?php echo $email; ?>">

                  </div>

                </div>

                <div class="text-center">

                  <button type="submit"
                    id="saveBtn"
                    class="btn btn-primary">

                    Save

                  </button>

                </div>

              </form>

            </div>



            <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <form id="changePasswordForm">

                <div id="passwordMessage"></div>

                <div class="row mb-3">

                  <label class="col-md-4 col-lg-3 col-form-label">
                    New Password
                  </label>

                  <div class="col-md-8 col-lg-9">

                    <input
                      name="newpassword"
                      type="password"
                      class="form-control">

                  </div>

                </div>

                <div class="row mb-3">

                  <label class="col-md-4 col-lg-3 col-form-label">
                    Re-enter New Password
                  </label>

                  <div class="col-md-8 col-lg-9">

                    <input
                      name="renewpassword"
                      type="password"
                      class="form-control">

                  </div>

                </div>

                <div class="text-center">

                  <button
                    type="submit"
                    id="passwordBtn"
                    class="btn btn-primary">

                    Change Password

                  </button>

                </div>

              </form>

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>
<!-- QR Update Modal -->
<div class="modal fade" id="updateQrModal" tabindex="-1" aria-labelledby="updateQrModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow-lg border-0 rounded-4">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="updateQrModalLabel">
          <i class="bi bi-qr-code-scan"></i> Update QR Code
        </h5>

        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <form id="qrForm" enctype="multipart/form-data">

        <div class="modal-body">

          <!-- Hidden Center ID -->
          <input type="hidden" name="center_id" value="<?php echo $center; ?>">

          <div class="text-center mb-3">

            <div class="border rounded-4 p-3 bg-light text-center">

              <?php
               $old = mysqli_query($conn, "SELECT qr_code FROM center WHERE id='$center'");
               $oldData = mysqli_fetch_assoc($old);
              $qrImage = (!empty($oldData['qr_code']) && file_exists("uploads/" . $oldData['qr_code']))
                ? "uploads/" . $oldData['qr_code']
                : "uploads/qr-placeholder.png";
              ?>

              <img src="<?php echo $qrImage; ?>"
                alt="QR Code"
                style="width:160px; height:160px; object-fit:contain;">

            </div>

          </div>

          <div class="mb-3">
            <label class="form-label fw-bold">Upload QR Code</label>

            <input type="file"
              class="form-control"
              name="qr_code"
              id="qrInput"
              accept="image/*"
              required>
          </div>

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-secondary rounded-pill px-4"
            data-bs-dismiss="modal">
            Cancel
          </button>

          <button type="submit" class="btn btn-primary rounded-pill px-4">
            <i class="bi bi-cloud-upload"></i> Update
          </button>

        </div>

      </form>

    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
  $(document).ready(function() {

    $("#profileForm").submit(function(e) {

      e.preventDefault();

      var formData = new FormData(this);

      $("#saveBtn").html("Please Wait...");
      $("#saveBtn").prop("disabled", true);

      $.ajax({

        url: "db/user-details.php",

        type: "POST",

        data: formData,

        contentType: false,

        processData: false,

        success: function(response) {
          console.log(response);

          if (response.status == "success") {
            $("#message").html(`
                        <div class="alert alert-success">
                            ${response.message}
                        </div>
                    `);

            setTimeout(function() {

              location.reload();

            }, 1000);
          } else {
            $("#message").html(`
                        <div class="alert alert-danger">
                            ${response.message}
                        </div>
                    `);
          }

          $("#saveBtn").html("Save");

          $("#saveBtn").prop("disabled", false);
        },

        error: function(xhr) {
          console.log(xhr.responseText);

          $("#message").html(`
                    <div class="alert alert-danger">
                        Something went wrong
                    </div>
                `);

          $("#saveBtn").html("Save");

          $("#saveBtn").prop("disabled", false);
        }

      });

    });

  });
  $(document).ready(function() {

    $("#changePasswordForm").submit(function(e) {

      e.preventDefault();

      var formData = $(this).serialize();

      $("#passwordBtn").html("Please Wait...");
      $("#passwordBtn").prop("disabled", true);

      $.ajax({

        url: "db/change-password.php",

        type: "POST",

        data: formData,

        dataType: "json",

        success: function(response) {
          console.log(response);

          if (response.status == "success") {
            $("#passwordMessage").html(`
            <div class="alert alert-success">
                ${response.message}
            </div>
        `);

            $("#changePasswordForm")[0].reset();

            // Auto Hide Message

            setTimeout(function() {

              $("#passwordMessage .alert")
                .fadeOut();

            }, 3000);
          } else {
            $("#passwordMessage").html(`
            <div class="alert alert-danger">
                ${response.message}
            </div>
        `);

            // Auto Hide Error

            setTimeout(function() {

              $("#passwordMessage .alert")
                .fadeOut();

            }, 3000);
          }

          $("#passwordBtn").html("Change Password");

          $("#passwordBtn").prop("disabled", false);
        }

      });

    });

  });
</script>
<script>
  /* Image Preview */
  document.getElementById('qrInput').addEventListener('change', function(e) {

    let reader = new FileReader();

    reader.onload = function() {
      document.getElementById('previewQr').src = reader.result;
    }

    reader.readAsDataURL(e.target.files[0]);

  });


  /* AJAX Update */
  $('#qrForm').submit(function(e) {

    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({

      url: 'db/update-qr.php',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,

      success: function(response) {

        if (response == 1) {
          toastr.success('QR Code Updated Successfully');

          setTimeout(() => {
            location.reload();
          }, 1000);
        } else {
          toastr.error('Something went wrong');
        }

      }

    });

  });
</script>

<?php include 'footer.php'; ?>