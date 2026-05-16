<?php include 'header.php'; ?>
<style>
    table.dataTable td,
    table.dataTable th {

        white-space: nowrap;

    }
</style>

<div class="pagetitle">
    <h1>Center</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">All Centers</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<div class="card">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-2 flex-wrap gap-2">
            <h5 class="card-title mb-0">All Centers</h5>
        </div>

        <div class="table-responsive">

            <table id="centerTable"
                class="table table-bordered table-striped nowrap align-middle"
                style="width:100%">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Center Name</th>


                        <th>Center Owner</th>
                        <th>Mobile</th>
                        <th>Landmark</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>District</th>
                        <th>State</th>
                        <th>Status</th>


                        <th>Action</th>


                    </tr>

                </thead>

                <tbody>

                    <?php


               

                    $query = "SELECT * FROM center ORDER BY id DESC";
                    $result = mysqli_query($conn, $query);


                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>

                                <!-- ID -->
                                <td>
                                    <?php echo $row['id']; ?>
                                </td>

                                <!-- Student -->
                                <td>

                                    <?php echo $row['center_name']; ?>

                                </td>

                                <!-- registration number -->
                                <td>
                                    <?php echo $row['owner_name']; ?>
                                </td>

                                <!-- Department -->
                                <td>
                                    <?php echo $row['mobile']; ?>
                                </td>

                                <!-- Course -->
                                <td>
                                    <?php echo $row['landmark']; ?>
                                </td>
                                <!-- Fees Screenshot -->
                                <td>

                                    <?php echo $row['email']; ?>

                                </td>

                                <td>


                                    <?php echo $row['address']; ?>
                                </td>

                                <!-- Registration Slip -->
                                <td>
                                    <?php echo $row['district']; ?>

                                </td>

                                <!-- View Details -->
                                <td>

                                    <?php echo $row['state']; ?>

                                </td>
                                <td>
                                    <?php

                                    if ($row['status'] == 'approved') {
                                        echo "<span class='badge bg-success'>Approved</span>";
                                    
                                    } else {
                                        echo "<span class='badge bg-danger'>Rejected</span>";
                                    }
                                    ?>
                                </td>

                                <td>

                                    <button class="btn btn-danger btn-sm deleteCenter"
                                        data-id="<?php echo $row['id']; ?>">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </td>

                            </tr>
                    <?php
                        }
                    }
                    ?>

                </tbody>

            </table>

        </div>

    </div>

</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $(document).on('click', '.deleteCenter', function() {

        var center_id = $(this).data('id');

        if (confirm('Are you sure you want to delete this center?')) {

            $.ajax({

                url: 'db/delete-center.php',

                type: 'POST',

                data: {
                    center_id: center_id
                },

                success: function(response) {

                    if (response.trim() == 'success') {

                        alert('Center Deleted Successfully');

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
    $(document).ready(function() {

        $('#centerTable').DataTable({

            responsive: false,
            scrollX: true,

            autoWidth: false,
            pageLength: 10,

            ordering: true

        });

    });
</script>


<?php include 'footer.php' ?>