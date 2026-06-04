<?php include 'header.php'; ?>
<style>
    table.dataTable td,
    table.dataTable th {

        white-space: nowrap;

    }
</style>

<div class="pagetitle">
    <h1>Attendance Detail</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Attendance Detail</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<?php

$student_id = (int)$_GET['student_id'];

$userQuery = mysqli_query($conn,"
    SELECT id
    FROM users
    WHERE student_id='$student_id'
");

$userData = mysqli_fetch_assoc($userQuery);

$user_id = $userData['id'];
                    $totalDays = 0;
                    $result1 = mysqli_query($conn, "SELECT COUNT(*) total_days FROM attendance WHERE user_id = '$user_id'");
                    if ($row = mysqli_fetch_assoc($result1)) {
                        $totalDays = $row['total_days'];
                    }
                    $presentDays = 0;
                    $result2 = mysqli_query($conn, "SELECT COUNT(*) present_days FROM attendance WHERE user_id = '$user_id' AND attendance_status='Present'");
                    if ($row = mysqli_fetch_assoc($result2)) {
                        $presentDays = $row['present_days'];
                    }
                    $absentDays = 0;
                    $result3 = mysqli_query($conn, "SELECT COUNT(*) absent_days FROM attendance WHERE user_id = '$user_id' AND attendance_status='Absent'");
                    if ($row = mysqli_fetch_assoc($result3)) {
                        $absentDays = $row['absent_days'];
                    }
                    $autoCheckoutDays = 0;
                    $result4 = mysqli_query($conn, "SELECT COUNT(*) auto_checkout_days FROM attendance WHERE user_id = '$user_id' AND attendance_status='Auto Checkout'");
                    if ($row = mysqli_fetch_assoc($result4)) {
                        $autoCheckoutDays = $row['auto_checkout_days'];
                    }
                    $attendancePercentage = ($totalDays > 0)
                        ? (($presentDays + $autoCheckoutDays) / $totalDays) * 100
                        : 0;

                          $student_id = (int)$_GET['student_id'];
                    $sql = "SELECT
            a.*,
            s.stu_name as student_name
        FROM attendance a
        INNER JOIN users u
            ON a.user_id = u.id
        INNER JOIN students s
            ON u.student_id = s.id
        WHERE u.student_id = '$student_id'
        ORDER BY a.date DESC";




                    $result = mysqli_query($conn, $sql);

                  
?>
<div class="card shadow-sm mb-4">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <?php 
                $nameQuery = mysqli_query($conn,"
SELECT s.stu_name
FROM students s
WHERE s.id='$student_id'
");

$student = mysqli_fetch_assoc($nameQuery);
                ?>
                <h3 class="mb-1">
                    <?php echo $student['stu_name']; ?>
                </h3>

                <span class="badge bg-primary">
                    Total Days :
                    <?php echo $totalDays; ?>
                </span>

                <span class="badge bg-success">
                    Present :
                    <?php echo $presentDays; ?>
                </span>

                <span class="badge bg-danger">
                    Absent :
                    <?php echo $absentDays; ?>
                </span>

                <span class="badge bg-warning text-dark">
                    Auto Checkout :
                    <?php echo $autoCheckoutDays; ?>
                </span>
            </div>

            <div class="text-center">

                <h1 class="text-success fw-bold mb-0">
                    <?php echo number_format($attendancePercentage,2); ?>%
                </h1>

                <small class="text-muted">
                    Attendance
                </small>

            </div>

        </div>

    </div>
</div>
<div class="card">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <h5 class="card-title mb-0">All Attendance Detail</h5>
        </div>

        <div class="table-responsive">

            <table id="studentTable"
                class="table table-bordered table-striped nowrap align-middle"
                style="width:100%">

                <thead class="table-dark">

                    <tr>


                        <th>Date</th>
                        <th>Status</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                       



                    </tr>

                </thead>

                <tbody>

                   
                  

                    <?php



                    while ($row = mysqli_fetch_assoc($result)) {

                    ?>

                        <tr>

                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['attendance_status']; ?></td>
                            <td><?php echo date('h:i:s A', strtotime($row['login_time'])); ?></td>
<td><?php echo date('h:i:s A', strtotime($row['logout_time'])); ?></td>

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
    $(document).ready(function() {

        $('#studentTable').DataTable({

            responsive: false,
            scrollX: true,

            autoWidth: false,
            pageLength: 10,

            ordering: true

        });

    });
</script>


<?php include 'footer.php' ?>