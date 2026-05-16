<?php include 'header.php'; ?>
<style>
    table.dataTable td,
    table.dataTable th {

        white-space: nowrap;

    }
</style>

<div class="pagetitle">
    <h1>Departments</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">All Departments</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<div class="card">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">

            <h5 class="card-title mb-0">All Departments</h5>

            <a href="add-departments.php" class="btn btn-primary btn-sm">
                Add Department
            </a>

        </div>

        <div class="table-responsive">

            <table id="centerTable"
                class="table table-bordered table-striped nowrap"
                style="width:100%">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Department Name</th>
                        <th>Short Name</th>
                        <th>Description</th>

                        <th>Status</th>
                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                    <?php

                    $sql = "SELECT * FROM department
                            ORDER BY id DESC";

                    $query = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($query)) {

                    ?>

                        <tr>

                            <td>
                                <?php echo $row['id']; ?>
                            </td>

                            <td>
                                <?php echo $row['depart_name']; ?>
                            </td>
                            <td>
                                <?php echo $row['short_name']; ?>
                            </td>
                            <td>
                                <?php echo $row['description']; ?>
                            </td>

                            <td>

                                <?php
                                if ($row['status'] == 'pending') {
                                    echo '
                                <span class="badge bg-warning">
                                    Pending
                                </span>
                                ';
                                } else {
                                    echo '
                                <span class="badge bg-success">
                                    Active
                                </span>
                                ';
                                }
                                ?>

                            </td>

                            <td>
                                <button class="btn btn-sm btn-primary editBtn"
                                    data-id="<?php echo $row['id']; ?>"
                                    data-name="<?php echo $row['depart_name']; ?>"
                                    data-short="<?php echo $row['short_name']; ?>"
                                    data-description="<?php echo $row['description']; ?>">

                                    <i class="bi bi-pencil-square"></i>

                                </button>

                                <button data-id="<?php echo $row['id']; ?>"
                                    class="btn btn-sm btn-danger deleteBtn">
                                    <i class="bi bi-trash"></i>
                                </button>
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
<!-- EDIT MODAL -->

<div class="modal fade" id="editDepartmentModal" tabindex="-1">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content border-0 rounded-4">

            <!-- Header -->

            <div class="modal-header bg-primary text-white">

                <h5 class="modal-title">

                    <i class="bi bi-pencil-square me-2"></i>

                    Edit Department

                </h5>

                <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"></button>

            </div>

            <!-- Body -->

            <div class="modal-body p-4">

                <form id="editDepartmentForm">

                    <input type="hidden"
                           name="department_id"
                           id="edit_department_id">

                    <!-- Department Name -->

                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            Department Name

                        </label>

                        <div class="input-group">

                            <span class="input-group-text bg-light">

                                <i class="bi bi-building"></i>

                            </span>

                            <input type="text"
                                   name="department_name"
                                   id="edit_department_name"
                                   class="form-control">

                        </div>

                    </div>

                    <!-- Short Name -->

                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            Short Name

                        </label>

                        <div class="input-group">

                            <span class="input-group-text bg-light">

                                <i class="bi bi-bookmark-star"></i>

                            </span>

                            <input type="text"
                                   name="short_name"
                                   id="edit_short_name"
                                   class="form-control">

                        </div>

                    </div>

                    <!-- Description -->

                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            Description

                        </label>

                        <textarea name="description"
                                  id="edit_description"
                                  rows="5"
                                  class="form-control"></textarea>

                    </div>

                    <!-- Button -->

                    <div class="text-end">

                        <button type="submit"
                                class="btn btn-primary px-4"
                                id="updateBtn">

                            Update Department

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
<script>

$(document).ready(function(){

    // OPEN MODAL

    $('.editBtn').click(function(){

        let id = $(this).data('id');

        let name = $(this).data('name');

        let short = $(this).data('short');

        let description = $(this).data('description');

        $('#edit_department_id').val(id);

        $('#edit_department_name').val(name);

        $('#edit_short_name').val(short);

        $('#edit_description').val(description);

        $('#editDepartmentModal').modal('show');

    });

    // UPDATE FORM

    $('#editDepartmentForm').submit(function(e){

        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({

            url: 'db/update-department.php',

            type: 'POST',

            data: formData,

            contentType: false,

            processData: false,

            dataType: 'json',

            beforeSend:function(){

                $('#updateBtn').html('Please Wait...');

                $('#updateBtn').prop('disabled', true);

            },

            success:function(response){

                if(response.status == 'success')
                {

                    toastr.success(response.message);

                    setTimeout(function(){

                        location.reload();

                    },1000);

                }
                else
                {

                    toastr.error(response.message);

                }

            },

            error:function(xhr){

                console.log(xhr.responseText);

                toastr.error('Server Error');

            },

            complete:function(){

                $('#updateBtn').html('Update Department');

                $('#updateBtn').prop('disabled', false);

            }

        });

    });

});

</script>
<script>
    $(document).ready(function() {

        $('.deleteBtn').click(function() {

            let department_id = $(this).data('id');

            let button = $(this);

            if (confirm('Are you sure you want to delete this department?')) {

                $.ajax({

                    url: 'db/delete-department.php',

                    type: 'POST',

                    data: {
                        department_id: department_id
                    },

                    dataType: 'json',

                    beforeSend: function() {

                        button.html('Deleting...');

                        button.prop('disabled', true);

                    },

                    success: function(response) {

                        if (response.status == 'success') {

                            toastr.success(response.message);

                            // Remove Row
                            button.closest('tr').fadeOut();

                        } else {

                            toastr.error(response.message);

                        }

                    },

                    error: function(xhr) {

                        console.log(xhr.responseText);

                        toastr.error('Server Error');

                    },

                    complete: function() {

                        button.html('<i class="bi bi-trash"></i> Delete');

                        button.prop('disabled', false);

                    }

                });

            }

        });

    });
</script>
<?php include 'footer.php' ?>