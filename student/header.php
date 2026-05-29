<?php

include('../includes/config.php');

include('../includes/auth.php');

if($_SESSION['role'] != 'student')
{
    header("Location: http://localhost/school/login.php");
    exit;
}
$user_id = $_SESSION['user_id'];

$sql = "

SELECT 

    users.*,

    students.registration_no,
   
   
  
   
    students.session,
    students.enroll_no,

    students.fees,

    center.center_name,

    department.depart_name,

    course.course_name

FROM users

LEFT JOIN students
ON students.id = users.student_id

LEFT JOIN center
ON center.id = users.center_id

LEFT JOIN department
ON department.id = students.depart_id

LEFT JOIN course
ON course.id = students.course_id

WHERE users.id = '$user_id'

";

$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);
$name = $user['name'];
$email = $user['email'];
$enrollment = $user['enroll_no'];
$mobile = $user['mobile'];
$center = $user['center_name'] ?? '';
$department = $user['depart_name'] ?? '';
$course = $user['course_name'] ?? '';
$photo = $user['image'] ?? '';
// print_r($user);
// exit;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>Student Portal</title>
  <link rel="icon" href="assets/images/logo1.png" type="image">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

  <!-- OVERLAY -->
  <div class="overlay" id="overlay"></div>

  <!-- TOAST -->
  <div class="toast" id="toast">
    <i class="bi bi-check-circle-fill" id="toast-icon"></i>
    <span id="toast-msg">Check-in recorded</span>
  </div>

  <!-- ═══ SIDEBAR ═══ -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-logo">
      <div class="logo-gem"><i class="bi bi-mortarboard-fill"></i></div>
      <div class="logo-text">
        <h3><?php echo $name; ?></h3>
        <span>Student Portal</span>
      </div>
    </div>

    <div class="profile-card">
      <div class="av-ring"><img src="../center/uploads/students/<?php echo $photo; ?>" alt="profile"></div>
      <h5><?php echo $name; ?></h5>
      <p><?php echo $course; ?></p>
      <div class="pbadge"><?php echo $enrollment; ?></div>
    </div>

    <div class="menu-label">Navigation</div>
    <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>

    <ul class="sidebar-nav">

      <li>
        <a href="dashboard.php"
          class="nav-link <?= ($current_page == 'dashboard.php') ? 'active' : '' ?>">
          <i class="bi bi-grid-1x2"></i>Dashboard
        </a>
      </li>

      <li>
        <a href="attendence-history.php"
          class="nav-link <?= ($current_page == 'attendence-history.php') ? 'active' : '' ?>">
          <i class="bi bi-calendar3"></i>Attendance History
        </a>
      </li>

      <li>
        <a href="profile.php"
          class="nav-link <?= ($current_page == 'profile.php') ? 'active' : '' ?>">
          <i class="bi bi-person-badge"></i>My Profile
        </a>
      </li>

      <li>
        <a href="settings.php"
          class="nav-link <?= ($current_page == 'settings.php') ? 'active' : '' ?>">
          <i class="bi bi-shield-lock"></i>Settings
        </a>
      </li>

    </ul>

    <div class="sdiv"></div>
   <button class="logout-btn" onclick="window.location.href='../db/logout.php'">
    <i class="bi bi-box-arrow-left"></i>Logout
</button>
  </aside>
  <!-- ═══ MAIN ═══ -->
  <main class="main" id="main">

    <!-- TOPBAR -->
    <div class="topbar">
      <div class="tbar-left">
        <button class="toggle-btn" id="toggleBtn" aria-label="Toggle sidebar">
          <i class="bi bi-list"></i>
        </button>
        <div>
          <div class="tbar-title">Dashboard</div>
          <div class="tbar-sub">Welcome back, <?php echo $name; ?> 👋</div>
        </div>
      </div>
      <div class="tbar-right">
        <div class="date-chip">
          <i class="bi bi-calendar3" style="color:var(--accent)"></i>
          <span id="live-date"><?php echo date("D, d M Y"); ?></span>
        </div>

        <div class="top-av"><img src="../center/uploads/students/<?php echo $photo; ?>" alt="Profile"></div>
      </div>
    </div>
    <script>
      /* ── SIDEBAR TOGGLE ── */
      const sidebar = document.getElementById('sidebar');
      const mainEl = document.getElementById('main');
      const overlay = document.getElementById('overlay');
      const toggleBtn = document.getElementById('toggleBtn');
      let desktopOpen = true;
      const isMob = () => window.innerWidth <= 991;

      toggleBtn.addEventListener('click', () => {
        if (isMob()) {
          sidebar.classList.toggle('mob-open');
          overlay.classList.toggle('show');
        } else {
          desktopOpen = !desktopOpen;
          sidebar.classList.toggle('collapsed');
          mainEl.classList.toggle('expanded');
        }
      });
      overlay.addEventListener('click', () => {
        sidebar.classList.remove('mob-open');
        overlay.classList.remove('show');
      });
    </script>