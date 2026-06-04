<?php

include('header.php');

?>

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-8">
      <div class="row">

        <?php
              // include '../includes/config.php';

              // SQL Queries
              $sql = "SELECT COUNT(*) AS total FROM students where center_id='$center'";
              $sql1 = "SELECT COUNT(*) AS total1 FROM course";
              // $sql2 = "SELECT COUNT(*) AS total2 FROM enquiry";
              // $sql3 = "SELECT COUNT(*) AS total3 FROM job_application";

              // Execute queries
              $res = mysqli_query($conn, $sql);
              $res1 = mysqli_query($conn, $sql1);
              // $res2 = mysqli_query($conn, $sql2);
              // $res3 = mysqli_query($conn, $sql3);

              // Fetch results separately
              $row = mysqli_fetch_assoc($res);
              $row1 = mysqli_fetch_assoc($res1);
              // $row2 = mysqli_fetch_assoc($res2);
              // $row3 = mysqli_fetch_assoc($res3);

              ?> 

        <!-- Revenue Card -->
        <!-- <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

          

            <div class="card-body">
              <h5 class="card-title">Total Center</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-box-seam"></i>
                </div>
                <div class="ps-3">
                  <h6>
                    2
                  </h6>
                 

                </div>
              </div>
            </div>

          </div>
        </div> -->
        <!-- End Revenue Card -->
        <!-- Revenue Card -->
        <div class="col-lg-4 col-md-6">
          <div class="card info-card revenue-card">

          

            <div class="card-body">
              <h5 class="card-title">Total Cources</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                 <i class="bi bi-person-badge-fill"></i>
                </div>
                <div class="ps-3">
                  <h6><?php echo $row1['total1']; ?></h6>
                 

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-lg-4 col-md-6">

          <div class="card info-card customers-card">

          

            <div class="card-body">
              <h5 class="card-title">Total Student</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>
                    <?php echo $row['total']; ?>
                  </h6>

                  
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- End Customers Card -->

        <script>
          document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#reportsChart"), {
              series: [{
                name: 'Sales',
                data: [31, 40, 28, 51, 42, 82, 56],
              }, {
                name: 'Revenue',
                data: [11, 32, 45, 32, 34, 52, 41]
              }, {
                name: 'Customers',
                data: [15, 11, 32, 18, 9, 24, 11]
              }],
              chart: {
                height: 350,
                type: 'area',
                toolbar: {
                  show: false
                },
              },
              markers: {
                size: 4
              },
              colors: ['#4154f1', '#2eca6a', '#ff771d'],
              fill: {
                type: "gradient",
                gradient: {
                  shadeIntensity: 1,
                  opacityFrom: 0.3,
                  opacityTo: 0.4,
                  stops: [0, 90, 100]
                }
              },
              dataLabels: {
                enabled: false
              },
              stroke: {
                curve: 'smooth',
                width: 2
              },
              xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
              },
              tooltip: {
                x: {
                  format: 'dd/MM/yy HH:mm'
                },
              }
            }).render();
          });
        </script>
        <!-- End Line Chart -->

      </div>

    </div>
  </div>
  <!-- End Reports -->

</section>



<?php include 'footer.php'; ?>