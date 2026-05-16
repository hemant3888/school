<?php include 'header.php'; ?>
<style>
    table.dataTable td,
    table.dataTable th {

        white-space: nowrap;

    }
</style>

<div class="pagetitle">
    <h1>Courses</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">All Courses</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<div class="card">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">

            <h5 class="card-title mb-0">All Course</h5>

            

        </div>
        <div class="mb-3">

            <select class="form-select" id="departmentFilter">

                <option value="">Select Department</option>

                <?php

                $dept = mysqli_query($conn, "SELECT * FROM department ORDER BY depart_name ASC");

                while ($deptRow = mysqli_fetch_assoc($dept)) {
                ?>

                    <option value="<?php echo $deptRow['id']; ?>"

                        <?php
                        if (isset($_GET['dept_id']) && $_GET['dept_id'] == $deptRow['id']) {
                            echo 'selected';
                        }
                        ?>>

                        <?php echo $deptRow['depart_name']; ?>

                    </option>

                <?php } ?>

            </select>

        </div>

        <div class="table-responsive">

            <table id="centerTable"
                class="table table-bordered table-striped nowrap"
                style="width:100%">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Department Name</th>

                        <th>Course Name</th>

                        <th>Description</th>

                        <th>Duration</th>

                        <th>Eligiblity</th>

                        <th>Status</th>

                       

                    </tr>

                </thead>

                <tbody>

                    <?php

                    $where = "";

                    if (isset($_GET['dept_id']) && $_GET['dept_id'] != '') {
                        $dept_id = $_GET['dept_id'];

                        $where = "WHERE course.depart_id = '$dept_id'";
                    }

                    $sql = "SELECT course.*, department.depart_name

                    FROM course

                    LEFT JOIN department
                    ON department.id = course.depart_id

                    $where

                    ORDER BY course.id DESC";

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
                                <?php echo $row['course_name']; ?>
                            </td>

                            <td>
                                <?php echo $row['description']; ?>
                            </td>

                            <td>
                                <?php echo $row['duration']; ?>
                            </td>

                            <td>
                                <?php echo $row['eligiblity']; ?>
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
            document.getElementById('departmentFilter').addEventListener('change', function() {

                let dept_id = this.value;

                if (dept_id != '') {
                    window.location.href = '?dept_id=' + dept_id;
                } else {
                    window.location.href = 'all-cources.php';
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