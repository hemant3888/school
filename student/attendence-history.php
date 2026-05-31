<?php
include 'header.php';


// $user_id = $_SESSION['user_id'];

$filter = $_GET['filter'] ?? 'week';

if($filter == 'week')
{
    $sql = "
        SELECT *
        FROM attendance
        WHERE user_id = '$user_id'
        AND YEARWEEK(date,1)=YEARWEEK(CURDATE(),1)
        ORDER BY date DESC
    ";
}
elseif($filter == 'month')
{
    $sql = "
        SELECT *
        FROM attendance
        WHERE user_id = '$user_id'
        AND MONTH(date)=MONTH(CURDATE())
        AND YEAR(date)=YEAR(CURDATE())
        ORDER BY date DESC
    ";
}
else
{
    $sql = "
        SELECT *
        FROM attendance
        WHERE user_id = '$user_id'
        ORDER BY date DESC
    ";
}

$query = mysqli_query($conn,$sql);

?>
<style>
  form select {
      padding: 5px;
    margin: 8px 0px;
    background-color: tan;
    border-radius: 5px;
    font-weight: 700;
  }
  </style>
<div class="container mt-3">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <div class="sec-title">Attendance History</div>

        <form method="GET">

            <select
                name="filter"
                class="form-select"
                onchange="this.form.submit()">

                <option value="week"
                    <?= ($filter=='week') ? 'selected' : '' ?>>
                    This Week
                </option>

                <option value="month"
                    <?= ($filter=='month') ? 'selected' : '' ?>>
                    This Month
                </option>

                <option value="all"
                    <?= ($filter=='all') ? 'selected' : '' ?>>
                    All History
                </option>

            </select>

        </form>

    </div>

    <div class="table-box">
        <div class="table-scroll">

            <table class="table">

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

                if(mysqli_num_rows($query) > 0)
                {
                    while($row = mysqli_fetch_assoc($query))
                    {
                        $day = date(
                            'l',
                            strtotime($row['date'])
                        );

                        $attendanceDate = date(
                            'd M Y',
                            strtotime($row['date'])
                        );

                        $loginTime =
                            !empty($row['login_time'])
                            ? date(
                                'h:i A',
                                strtotime($row['login_time'])
                            )
                            : '—';

                        $logoutTime =
                            !empty($row['logout_time'])
                            ? date(
                                'h:i A',
                                strtotime($row['logout_time'])
                            )
                            : '—';

                        $workingHours =
                            !empty($row['working_hours'])
                            ? $row['working_hours']
                            : '—';

                ?>

                    <tr>

                        <td class="date-cell">
                            <?= $attendanceDate ?>
                        </td>

                        <td class="time-cell">
                            <?= $day ?>
                        </td>

                        <td>
                            <?= $loginTime ?>
                        </td>

                        <td>
                            <?= $logoutTime ?>
                        </td>

                        <td>
                            <?= $workingHours ?>
                        </td>

                        <td>

                        <?php
                        if($row['attendance_status'] == 'Present')
                        {
                        ?>
                            <span class="badge bp">
                                <span class="dot dg"></span>
                                Present
                            </span>

                        <?php
                        }
                        elseif($row['attendance_status'] == 'Absent')
                        {
                        ?>
                            <span class="badge ba">
                                <span class="dot dr"></span>
                                Absent
                            </span>

                        <?php
                        }
                        else
                        {
                        ?>
                            <span class="badge bl">
                                <span class="dot dy"></span>
                                Auto Checkout
                            </span>

                        <?php
                        }
                        ?>

                        </td>

                    </tr>

                <?php
                    }
                }
                else
                {
                ?>

                    <tr>
                        <td colspan="6" class="text-center">
                            No Attendance Found
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

<?php include 'footer.php'; ?>