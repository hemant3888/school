<?php include 'header.php'; ?>
<style>

table.dataTable td,
table.dataTable th{

    white-space: nowrap;

}

</style>
<div class="pagetitle">
    <h1>Center Requests</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">All Center Requests</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<div class="card">

    <div class="card-body">

        <h5 class="card-title">
            All Center Requests
        </h5>

        <div class="table-responsive">

            <table id="centerTable"
                   class="table table-bordered table-striped nowrap"
           style="width:100%">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Center Name</th>

                        <th>Owner Name</th>

                        <th>State</th>

                        <th>City</th>
                        <th>Address</th>
                        <th>Owner Detail</th>

                        <th>Documents</th>

                        <th>Status</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                    <?php

                    $sql = "SELECT * FROM center
                            ORDER BY id DESC";

                    $query = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($query))
                    {

                    ?>

                    <tr>

                        <td>
                            <?php echo $row['id']; ?>
                        </td>

                        <td>
                            <?php echo $row['center_name']; ?>
                        </td>

                        <td>
                            <?php echo $row['owner_name']; ?>
                        </td>

                       

                        <td>
                            <?php echo $row['state']; ?>
                        </td>

                        <td>
                            <?php echo $row['city']; ?>
                        </td>
                         <td>
                            <?php echo $row['address']; ?>
                        </td>

                        <td>
                            <?php echo $row['documents']; ?>
                        </td>

                        <td>

                            <?php
                            if($row['status'] == 0)
                            {
                                echo '
                                <span class="badge bg-warning">
                                    Pending
                                </span>
                                ';
                            }
                            else
                            {
                                echo '
                                <span class="badge bg-success">
                                    Approved
                                </span>
                                ';
                            }
                            ?>

                        </td>

                        <td>

                            <?php
                            if($row['status'] == 0)
                            {
                            ?>

                            <a href="approve-center.php?id=<?php echo $row['id']; ?>"
                               class="btn btn-success btn-sm">

                                Approve

                            </a>

                            <?php
                            }
                            ?>

                        </td>

                    </tr>

                    <?php
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
$(document).ready(function(){

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