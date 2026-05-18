<?php include 'header.php'; ?>
<style>
    table.dataTable td,
    table.dataTable th {

        white-space: nowrap;

    }
</style>

<div class="pagetitle">
    <h1>Enquiries</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">All Enquiries</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<div class="card">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-2 flex-wrap gap-2">
            <h5 class="card-title mb-0">All Enquiries</h5>
        </div>

        <div class="table-responsive">

            <table id="enquiryTable"
                class="table table-bordered table-striped nowrap align-middle"
                style="width:100%">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Name</th>

                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                       
                        <th>Action</th>


                    </tr>

                </thead>

                <tbody>

                    <?php

                    $query = "SELECT * FROM contact ORDER BY id DESC";
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

                                    <?php echo $row['name']; ?>

                                </td>

                                <!-- registration number -->
                                <td>
                                    <?php echo $row['email']; ?>
                                </td>

                                <!-- Department -->
                                <td>
                                    <?php echo $row['subject']; ?>
                                </td>

                                <!-- Message -->
                                <td>
                                    <?php echo $row['message']; ?>
                                </td>
                             
                               
                                <td>

                                    <button class="btn btn-danger btn-sm deleteenquiry"
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
$(document).on('click', '.deleteenquiry', function() {

    var enquiry_id = $(this).data('id');

    if (confirm('Are you sure you want to delete this enquiry?')) {

        $.ajax({
            url: 'db/delete-enquiry.php',
            type: 'POST',
            data: { enquiry_id: enquiry_id },

            success: function(response) {

                if (response.trim() === 'success') {

                    toastr.success('Enquiry Deleted Successfully');

                
                    $('button[data-id="'+enquiry_id+'"]').closest('tr').fadeOut();

                } else {
                    toastr.error('Something went wrong');
                }
            },

            error: function(){
                toastr.error('Server Error');
            }
        });

    }

});
</script>

<script>
    $(document).ready(function() {

        $('#enquiryTable').DataTable({

            responsive: false,
            scrollX: true,

            autoWidth: false,
            pageLength: 10,

            ordering: true

        });

    });
</script>


<?php include 'footer.php' ?>