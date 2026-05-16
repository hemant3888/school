<?php

include 'includes/config.php';

/* GET DEPARTMENT NAME FROM URL */

$department_name = isset($_GET['department'])
    ? mysqli_real_escape_string($conn, trim($_GET['department']))
    : '';

/* FETCH DEPARTMENT */

$department_query = mysqli_query($conn, "

    SELECT *
    FROM department
    WHERE depart_name='$department_name'

");

$department = mysqli_fetch_assoc($department_query);

/* IF DEPARTMENT NOT FOUND */

if(!$department)
{
    echo "
    
    <div class='container py-5'>
    
        <div class='alert alert-danger text-center'>
        
            Department Not Found
        
        </div>
    
    </div>
    
    ";

    exit;
}

$department_id = $department['id'];

/* FETCH COURSES */

$course_query = mysqli_query($conn, "

    SELECT *
    FROM course
    WHERE depart_id='$department_id'
    ORDER BY course_name ASC

");

$total_courses = mysqli_num_rows($course_query);

?>

<?php include 'header.php'; ?>
<style>

    :root{

        --orange:#ff7a00;
        --dark:#1f2937;
        --light:#fff7f0;

    }

    /* HERO SECTION */

    .page-hero{

        background: linear-gradient(135deg,#fff4e8,#ffffff);

        padding: 30px 10px 45px;

        text-align: center;

        position: relative;

        overflow: hidden;

    }

    .page-hero::before{

        content:'';

        position:absolute;

        width:250px;
        height:250px;

        background:rgba(255,122,0,0.08);

        border-radius:50%;

        top:-80px;
        left:-80px;

    }

    .page-hero::after{

        content:'';

        position:absolute;

        width:220px;
        height:220px;

        background:rgba(255,122,0,0.06);

        border-radius:50%;

        bottom:-80px;
        right:-80px;

    }

    .dept-hero-icon{

        width:90px;
        height:90px;

        background:linear-gradient(135deg,var(--orange),#ff9b3d);

        color:#fff;

        margin:auto;

        border-radius:50%;

        display:flex;
        align-items:center;
        justify-content:center;

        font-size:38px;

        box-shadow:0 10px 30px rgba(255,122,0,0.35);

        margin-bottom:25px;

    }

    .page-hero h1{

        font-size:35px;

        font-weight:800;

        color:var(--dark);

        margin-bottom:15px;

        line-height:1.2;

    }

    .page-hero h1 span{

        color:var(--orange);

        font-style:italic;

    }

    .page-hero p{

        color:#6b7280;

        font-size:14px;

        margin-bottom:10px;

    }

    .hero-stat-pill{

        display:inline-flex;

        align-items:center;

        gap:10px;

        background:#fff;

        padding:10px 15px;

        border-radius:50px;

        font-weight:600;

        color:var(--orange);

        box-shadow:0 8px 25px rgba(0,0,0,0.08);

    }

    /* TABLE */

    .table-wrap{

        background:#fff;

        border-radius:25px;

        padding:15px;

        box-shadow:0 12px 35px rgba(0,0,0,0.06);

        margin-top:-30px;

        position:relative;

        z-index:10;

    }

    .table{

        margin:0;

        border-collapse:separate;

        border-spacing:0 12px;

    }

    .table thead th{

        background:linear-gradient(135deg,var(--orange),#ff9b3d);

        color:#fff;

        padding:18px;

        border:none;

        font-size:12px;

        font-weight:700;

    }

    .table thead th:first-child{

        border-radius:15px 0 0 15px;

    }

    .table thead th:last-child{

        border-radius:0 15px 15px 0;

    }

    .table tbody tr{

        background:#fffaf5;

        transition:0.3s;

    }

    .table tbody tr:hover{

        transform:translateY(-3px);

        box-shadow:0 10px 20px rgba(255,122,0,0.12);

    }

    .table tbody td{

        padding:14px;

        vertical-align:middle;

        border-top:none;

        border-bottom:none;

        font-size:12px;

        color:#374151;

    }

    .table tbody td:first-child{

        border-radius:14px 0 0 14px;

        font-weight:700;

        color:var(--orange);

    }

    .table tbody td:last-child{

        border-radius:0 14px 14px 0;

    }

    /* BADGES */

    .badge-duration{

        background:#fff1e6;

        color:var(--orange);

        padding:5px 10px;

        border-radius:30px;

        font-weight:600;

        display:inline-flex;

        align-items:center;

    }

    .badge-level{

        background:linear-gradient(135deg,var(--orange),#ff9b3d);

        color:#fff;

        padding:5px 10px;

        border-radius:30px;

        font-weight:600;

    }

    /* MOBILE */

    @media(max-width:768px){

        .page-hero{

            padding:30px 10px 36px;

        }

        .page-hero h1{

            font-size:15px;

        }

        .dept-hero-icon{

            width:70px;
            height:70px;

            font-size:28px;

        }

        .table-wrap{

            padding:15px;

        }

        .table thead th,
        .table tbody td{

            font-size:14px;

            padding:12px;

        }

    }

</style>
<!-- TOP BAR -->

<div class="top-bar">

    <div class="container">

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

                <li class="breadcrumb-item">

                    <a href="courses.php">

                        <i class="bi bi-house me-1"></i>

                        Courses

                    </a>

                </li>

                <li class="breadcrumb-item active">

                    <?php echo $department['depart_name']; ?>

                </li>

            </ol>

        </nav>

    </div>

</div>

<!-- HERO SECTION -->

<section class="page-hero">

    <div class="container text-center">

        <div class="dept-hero-icon">

            <i class="bi bi-mortarboard-fill"></i>

        </div>

        <h1>

            <span style="color:var(--orange);font-style:italic;">

                <?php echo $department['depart_name']; ?>

            </span>

            Department Courses

        </h1>

        <p>

            Browse all available courses offered under this department.

        </p>

        <div class="hero-stat-pill">

            <i class="bi bi-collection"></i>

            <?php echo $total_courses; ?> Courses Available

        </div>

    </div>

</section>

<!-- MAIN CONTENT -->

<section class="content-section">

    <div class="container">

        <!-- TABLE -->

        <div class="table-wrap">

            <div class="table-responsive table-striped">

                <table class="table" id="courseTable">

                    <thead>

                        <tr>

                            <th>S.No</th>

                            <th>Course Name</th>

                            <th>Duration</th>

                            <th>Eligibility</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        if($total_courses > 0)
                        {

                            $i = 1;

                            while($course = mysqli_fetch_assoc($course_query))
                            {

                        ?>

                        <tr>

                            <td class="sno-cell">

                                <?php echo $i++; ?>

                            </td>

                            <td class="course-name-cell">

                                <?php echo $course['course_name']; ?>

                            </td>

                            <td>

                                <span class="badge-duration">

                                    <i class="bi bi-clock me-1"></i>

                                    <?php echo $course['duration']; ?>

                                </span>

                            </td>

                            <td>

                                <span class="badge-level level-beginner">

                                    <?php echo $course['eligiblity']; ?>

                                </span>

                            </td>

                        </tr>

                        <?php

                            }

                        }
                        else
                        {

                        ?>

                        <tr>

                            <td colspan="4" class="text-center text-danger py-4">

                                No Courses Found

                            </td>

                        </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</section>

<?php include 'footer.php'; ?>