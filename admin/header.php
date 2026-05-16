<?php

include('../includes/config.php');

include('../includes/auth.php');
if($_SESSION['role'] != 'admin')
{
    header("Location: http://localhost/school/login.php");
    exit;
}
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id='$user_id'";

$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

$name = $user['name'];

$email = $user['email'];
$mobile = $user['mobile'];
$id = $user['id'];
$image = $user['image'] ?? '';

// $name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin - TGIIT</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  
  <!-- Favicons -->
  <link rel="icon" type="image/png" href="assets/logo/logo1.jpeg">
  <!-- <link rel="apple-touch-icon" sizes="180x180" href="assets/logo/favicon.png"> -->
  <link rel="icon" href="assets/logo/logo1.jpeg">
  <!-- <link rel="icon" type="image/png" sizes="16x16" href="assets/logo/favicon.png"> -->
  <!-- <link rel="manifest" href="/site.webmanifest"> -->
  <!-- Google Fonts -->
  <link href="" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
<link rel="stylesheet"
href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<link rel="stylesheet"
href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
  <!-- Bootstrap Icons CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center" style="background-color: #FC9928;">

    <div class="d-flex align-items-center justify-content-between">
      <center> <a href="dashboard.php" class="logo d-flex align-items-center text-light">
          <!-- <img src="assets/logo/logo1.jpeg" alt="LOGO"
            style="max-width:70px;"> -->
          TGIIT
        </a></center>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div> -->
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <!-- <i class="bi bi-search"></i> -->
          </a>
        </li><!-- End Search Icon-->
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/uploads/<?php echo (!empty($image) && file_exists('assets/uploads/' . $image))
                                    ? $image
                                    : 'user.png'; ?>"
              alt="Profile"
              class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2 text-light"><?php echo $name; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $name; ?></h6>
              <span><?php echo $email; ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="user-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../db/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul>
        </li>

      </ul>
    </nav>

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-mortarboard-fill"></i><span>Students</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="all-students.php">
              <i class="bi bi-circle"></i><span>All Students</span>
            </a>
          </li>

        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#gallery" data-bs-toggle="collapse" href="#">
         <i class="bi bi-building-fill"></i><span>Center</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="gallery" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
          <a href="all-center.php">
              <i class="bi bi-circle"></i><span>All Centers</span>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#banner" data-bs-toggle="collapse" href="#">
         <i class="bi bi-journal-bookmark"></i><span>Course</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="banner" class="nav-content collapse " data-bs-parent="#banner">
          <li>
            <a href="all-departments.php">
              <i class="bi bi-circle"></i><span>Department</span>
            </a>
          </li>
          <li>
            <a href="all-cources.php">
              <i class="bi bi-circle"></i><span>Course</span>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#center-request" data-bs-toggle="collapse" href="#">
          <i class="bi bi-building-add"></i><span>Center Request</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="center-request" class="nav-content collapse " data-bs-parent="#center-request">
          <li>
            <a href="all-center-request.php">
              <i class="bi bi-circle"></i><span>All Center Request</span>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="../db/logout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">