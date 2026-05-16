<?php include 'header.php'; ?>
<style>

table.dataTable td,
table.dataTable th{

    white-space: nowrap;

}

</style>
<?php

if(isset($_GET['status']))
{

    if($_GET['status'] == 'approved')
    {
        echo '
        <div class="alert alert-success">
            Center Approved Successfully
        </div>
        ';
    }

    if($_GET['status'] == 'rejected')
    {
        echo '
        <div class="alert alert-danger">
            Center Rejected Successfully
        </div>
        ';
    }

}

?>
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
                        <th>Email</th>

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
                            <?php echo $row['email']; ?>
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
<?php  

                    $sql = "SELECT * FROM center_owner
                             WHERE id = '".$row['owner_id']."'
                            ORDER BY id DESC";  
                    $ownerQuery = mysqli_query($conn, $sql);
                    $ownerData = mysqli_fetch_assoc($ownerQuery);

?>
    <button class="btn btn-primary btn-sm viewOwnerBtn"

        data-name="<?php echo $ownerData['name']; ?>"

        data-father="<?php echo $ownerData['father_name']; ?>"

        data-mother="<?php echo $ownerData['mother_name']; ?>"

        data-phone="<?php echo $ownerData['mobile']; ?>"

        data-aadhar="<?php echo $ownerData['aadhar']; ?>"

        data-email="<?php echo $ownerData['email']; ?>"

        data-state="<?php echo $ownerData['state']; ?>"

        data-city="<?php echo $ownerData['city']; ?>"

        data-district="<?php echo $ownerData['district']; ?>"

        data-address="<?php echo $ownerData['address']; ?>"

        data-photo="<?php echo $ownerData['photo']; ?>"

        data-document="<?php echo $ownerData['document']; ?>"

    >

        View

    </button>

</td>
<td>
                           <button class="btn btn-sm btn-primary">
                            <a href="../uploads/centers/documents/<?php echo $row['document']; ?>"
                               target="_blank"
                               class="text-white text-decoration-none">

                                View

                            </a>
                           </button> 
                           <!-- <?php echo $row['documents']; ?> -->
                        </td>
                        <td>

                            <?php
                            if($row['status'] == 'pending')
                            {
                                echo '
                                <span class="badge bg-warning">
                                    Pending
                                </span>
                                ';
                            }
                            elseif( $row['status'] == 'approved')
                            {
                                echo '
                                <span class="badge bg-success">
                                    Approved
                                </span>
                                ';
                            }
                            elseif( $row['status'] == 'rejected')
                            {
                                echo '
                                <span class="badge bg-danger">
                                    Rejected
                                </span>
                                ';
                            }
                            ?>

                        </td>

                        <td>

                            <?php
                            if($row['status'] == 'pending')
                            {
                            ?>

                            <a href="db/approve-center.php?id=<?php echo $row['id']; ?>"
                               class="btn btn-success btn-sm">

                                Approve

                            </a>
                            <a href="db/reject-center.php?id=<?php echo $row['id']; ?>"
                               class="btn btn-danger btn-sm">

                                Reject

                            </a>

                            <?php
                            }
                            elseif($row['status'] == 'approved')
                            {
                            ?>
                             <a href="db/reject-center.php?id=<?php echo $row['id']; ?>"
                               class="btn btn-danger btn-sm">

                                Reject

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
<div class="modal fade" id="ownerModal" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header bg-primary text-white">

                <h5 class="modal-title">
                    Owner Details
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-4 text-center mb-4">

                        <img id="ownerPhoto"
                             src=""
                             class="img-fluid rounded border"
                             style="height:200px;width:200px;object-fit:cover;">

                    </div>

                    <div class="col-md-8">

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <strong>Name</strong>
                                <p id="ownerName"></p>
                            </div>

                            <div class="col-md-6">
                                <strong>Father Name</strong>
                                <p id="fatherName"></p>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <strong>Mother Name</strong>
                                <p id="motherName"></p>
                            </div>

                            <div class="col-md-6">
                                <strong>Phone</strong>
                                <p id="ownerPhone"></p>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <strong>Email</strong>
                                <p id="ownerEmail"></p>
                            </div>

                            <div class="col-md-6">
                                <strong>Aadhar</strong>
                                <p id="ownerAadhar"></p>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <strong>State</strong>
                                <p id="ownerState"></p>
                            </div>

                            <div class="col-md-6">
                                <strong>District</strong>
                                <p id="ownerDistrict"></p>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <strong>City</strong>
                                <p id="ownerCity"></p>
                            </div>

                            <div class="col-md-6">
                                <strong>Address</strong>
                                <p id="ownerAddress"></p>
                            </div>

                        </div>

                        <div class="mt-3">

                            <a href=""
                               target="_blank"
                               id="ownerDocument"
                               class="btn btn-danger btn-sm">

                                View Document

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>

$(document).on('click','.viewOwnerBtn',function(){

    $('#ownerName').text($(this).data('name'));

    $('#fatherName').text($(this).data('father'));

    $('#motherName').text($(this).data('mother'));

    $('#ownerPhone').text($(this).data('phone'));

    $('#ownerAadhar').text($(this).data('aadhar'));

    $('#ownerEmail').text($(this).data('email'));

    $('#ownerState').text($(this).data('state'));

    $('#ownerDistrict').text($(this).data('district'));

    $('#ownerCity').text($(this).data('city'));

    $('#ownerAddress').text($(this).data('address'));

    $('#ownerPhoto').attr(
        'src',
        '../uploads/owners/photos/' + $(this).data('photo')
    );

    $('#ownerDocument').attr(
        'href',
        '../uploads/owners/documents/' + $(this).data('document')
    );

    $('#ownerModal').modal('show');

});

</script>
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