
<?php include 'header.php'; ?>

<?php 
$totalDays = 0;
$result = mysqli_query($conn, "SELECT COUNT(*) total_days FROM attendance WHERE user_id = '$user_id'");
if($row = mysqli_fetch_assoc($result)) {
    $totalDays = $row['total_days'];
}
$presentDays = 0;
$result = mysqli_query($conn, "SELECT COUNT(*) present_days FROM attendance WHERE user_id = '$user_id' AND attendance_status='Present'");
if($row = mysqli_fetch_assoc($result)) {
    $presentDays = $row['present_days'];
}
$absentDays = 0;
$result = mysqli_query($conn, "SELECT COUNT(*) absent_days FROM attendance WHERE user_id = '$user_id' AND attendance_status='Absent'");
if($row = mysqli_fetch_assoc($result)) {
    $absentDays = $row['absent_days'];
}
$autoCheckoutDays = 0;
$result = mysqli_query($conn, "SELECT COUNT(*) auto_checkout_days FROM attendance WHERE user_id = '$user_id' AND attendance_status='Auto Checkout'");
if($row = mysqli_fetch_assoc($result)) {
    $autoCheckoutDays = $row['auto_checkout_days'];  
}
$attendancePercentage =
(($presentDays + $autoCheckoutDays) / $totalDays) * 100;
?>
    <!-- ── DASHBOARD ── -->
    <div id="page-dashboard">

      <!-- STAT CARDS -->
      <div class="stats-grid">
        <div class="stat-card gold">
          <div class="stat-icon"><i class="bi bi-calendar-check"></i></div>
          <div class="stat-label">Total Days</div>
          <div class="stat-value"><?php echo $totalDays; ?></div>
         
        </div>
        <div class="stat-card green">
          <div class="stat-icon"><i class="bi bi-person-check"></i></div>
          <div class="stat-label">Days Present</div>
          <div class="stat-value"><?php echo $presentDays; ?></div>
         
        </div>
        <div class="stat-card red">
          <div class="stat-icon"><i class="bi bi-person-x"></i></div>
          <div class="stat-label">Days Absent</div>
          <div class="stat-value"><?php echo $absentDays; ?></div>
         
        </div>
        <div class="stat-card blue">
          <div class="stat-icon"><i class="bi bi-graph-up"></i></div>
          <div class="stat-label">Attendance %</div>
          <div class="stat-value"><?php echo $attendancePercentage . '%'; ?></div>
          
        </div>
      </div>

      <!-- ACTION ROW -->
      <div class="action-row d-flex">
        <button class="action-btn btn-ci" id="checkInBtn" onclick="markAtt('checkin')">
          <i class="bi bi-box-arrow-in-right"></i>Check In
        </button>
        <button class="action-btn btn-co" id="checkOutBtn" onclick="markAtt('checkout')">
          <i class="bi bi-box-arrow-left"></i>Check Out
        </button>

       
      </div>

      <!-- TABLE -->
      <div class="sec-header">
        <div class="sec-title">Recent Attendance</div>
        <a href="attendence-history.php" class="view-all">View All →</a>
      </div>
      <div class="table-box">
        <div class="table-scroll">
          <table>
            <thead>
              <tr>
                <th>Date</th>
                <th>Day</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Duration</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>

<?php
$query = mysqli_query(
    $conn,
    "SELECT *
    FROM attendance
    WHERE user_id = '$user_id'
    ORDER BY date DESC
    LIMIT 5"
);
while($row = mysqli_fetch_assoc($query))
{
    $day = date('l', strtotime($row['date']));

    $date = date('d M Y', strtotime($row['date']));

    $login = !empty($row['login_time'])
        ? date('g:i A', strtotime($row['login_time']))
        : '—';

    $logout = !empty($row['logout_time'])
        ? date('g:i A', strtotime($row['logout_time']))
        : '—';

    $duration = !empty($row['working_hours'])
        ? $row['working_hours']
        : '—';

?>

<tr>

    <td class="date-cell">
        <?= $date ?>
    </td>

    <td class="time-cell">
        <?= $day ?>
    </td>

    <td>
        <?= $login ?>
    </td>

    <td>
        <?= $logout ?>
    </td>

    <td>
        <?= $duration ?>
    </td>

    <td>

        <?php if($row['attendance_status'] == 'Present') { ?>

            <span class="badge bp">
                <span class="dot dg"></span>
                Present
            </span>

        <?php } elseif($row['attendance_status'] == 'Absent') { ?>

            <span class="badge ba">
                <span class="dot dr"></span>
                Absent
            </span>

        <?php } elseif($row['attendance_status'] == 'Auto Checkout') { ?>

            <span class="badge bl">
                <span class="dot dy"></span>
                Auto Checkout
            </span>

        <?php } ?>

    </td>

</tr>

<?php } ?>

</tbody>
          </table>
        </div>
      </div>

     

    </div><!-- /dashboard -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$('#checkInBtn').click(function(){

    $.ajax({
        url:'db/attendence.php',
        type:'POST',
        data:{
            action:'checkin'
        },
        dataType:'json',
        success:function(response){

            if(response.status)
            {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                    timer: 1500,
                    showConfirmButton: false
                });

                setTimeout(function(){
                    location.reload();
                },1500);
            }
            else
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: response.message
                });
            }
        },
        error:function()
        {
            Swal.fire({
                icon: 'error',
                title: 'Server Error',
                text: 'Something went wrong. Please try again.'
            });
        }
    });

});
$('#checkOutBtn').click(function(){

    $.ajax({
        url:'db/attendence.php',
        type:'POST',
        data:{
            action:'checkout'
        },
        dataType:'json',
        success:function(response){

            if(response.status)
            {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                    timer: 1500,
                    showConfirmButton: false
                });

                setTimeout(function(){
                    location.reload();
                },1500);
            }
            else
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: response.message
                });
            }
        },
        error:function()
        {
            Swal.fire({
                icon: 'error',
                title: 'Server Error',
                text: 'Something went wrong. Please try again.'
            });
        }
    });

});

  </Script>
<?php include 'footer.php'; ?>