<?php include 'header.php'; ?>
<style>
    table.dataTable td,
    table.dataTable th {

        white-space: nowrap;

    }
</style>

<div class="pagetitle">
    <h1>Slider</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">All Slider Images</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<div class="card">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-2 flex-wrap gap-2">
            <h5 class="card-title mb-0">All Slider Images</h5>
            <a href="add-slider.php" class="btn btn-primary btn-sm">
                Add Slider Image
            </a>
        </div>

        <div class="table-responsive">

            <table id="sliderTable"
                class="table table-bordered table-striped nowrap align-middle"
                style="width:100%">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Image</th>



                        <th>Action</th>


                    </tr>

                </thead>

                <tbody>

                    <?php

                    $query = "SELECT * FROM slider ORDER BY id DESC";
                    $result = mysqli_query($conn, $query);
                    $total = mysqli_num_rows($result);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>

                                <!-- ID -->
                                <td>
                                    <?php echo $row['id']; ?>
                                </td>

                                <!-- Image -->
                                <td>
                                    <img src="uploads/slider/<?php echo $row['image']; ?>" alt="Slider Image" width="100" style="height: auto; border-radius: 5px;">
                                </td>


                                <td>

                                    <?php if ($total > 1) { ?>

                                        <button class="btn btn-danger btn-sm deleteslider"
                                            data-id="<?php echo $row['id']; ?>">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    <?php } else { ?>

                                        <button class="btn btn-danger btn-sm" disabled title="At least one slider required">

                                            <i class="bi bi-lock"></i>

                                        </button>

                                    <?php } ?>

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
    $(document).on('click', '.deleteslider', function() {

        let id = $(this).data('id');

        if (confirm('Are you sure you want to delete this image?')) {

            $.ajax({
                url: 'db/delete-slider.php',
                type: 'POST',
                data: {
                    id: id
                },

                success: function(response) {

                    if (response.trim() === 'success') {

                        toastr.success('Image Deleted Successfully');


                        $('button[data-id="' + id + '"]').closest('tr').fadeOut();

                    } else {
                        toastr.error('Delete Failed');
                    }

                },
                error: function() {
                    toastr.error('Server Error');
                }
            });

        }

    });
</script>

<script>
    $(document).ready(function() {

        $('#sliderTable').DataTable({

            responsive: false,
            scrollX: true,

            autoWidth: false,
            pageLength: 10,

            ordering: true

        });

    });
</script>


<?php include 'footer.php' ?>