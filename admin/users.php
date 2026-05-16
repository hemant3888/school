<?php include 'header.php'; ?>
<style>
  .scroll::-webkit-scrollbar {
    display: none;
  }
</style>

<div class="pagetitle">
  <h1>Users</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
      <li class="breadcrumb-item active">All Users</li>
    </ol>
  </nav>
</div><!-- End Page Title -->


<section class="section profile">
  <div class="row">

    <div class="col-xl-12">

      <div class="card">
        <div class="card-body pt-3">
          <h5 class="card-title">All Users</h5>

          <br />
          <div class="row scroll table-responsive" style="overflow-X: scroll;">
            <!-- Table with stripped rows -->
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>User ID</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  
                  <th>Address</th>
                  <th>Created At</th>
                  <th>Action</th>
                  <th>Change Password</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'db/config.php'; 
                $sql = "SELECT `id`, `userid`, `name`, `mobile`, `email`, `profile`, `password`, `address`, `created_at` FROM `users`";
                $res = mysqli_query($conn, $sql);
                $a = 1;
                while ($row = mysqli_fetch_assoc($res))
                   {
                  ?>
                  <tr>
                    <td><?php echo $a; ?></td>
                    <td><?php echo $row['userid']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td>
                      <a href="edit_user.php?id=<?php echo $row['id']; ?>"><span class="bi bi-pencil-square"
                          style="color:blue;"></span></a>
                      <!--  <a href="delete_user.php?id=<?php echo $row['id']; ?>"><span class="bi bi-trash-fill" style="color:red;"></span></a>-->
                    </td>
                    <td>
                      <a href="edit_password.php?id=<?php echo $row['id']; ?>"><span class="bi bi-pencil-square"
                          style="color:blue;"></span></a>

                    </td>
                  </tr>
                  <?php
                  $a++;
                }
                ?>
              </tbody>
            </table>

            <!-- End Table with stripped rows -->
          </div>
        </div>
      </div>

    </div>
  </div>
</section>



<?php include 'footer.php'; ?>