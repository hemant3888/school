<?php include 'header.php'; ?>

<?php
include 'includes/config.php';

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

$state = mysqli_real_escape_string($conn, $_GET['state']);

$query = mysqli_query($conn, "
    SELECT * FROM center WHERE state='$state'
");

if(!$query){
    die("Query Failed: " . mysqli_error($conn));
}
?>



<style>
    :root {

        --orange: #ff7a00;
        --dark: #1f2937;
        --light: #fff7f0;

    }

    /* TABLE */

    .table-wrap {

        background: #fff;

        border-radius: 25px;

        padding: 15px;

        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.06);

        margin-top: 20px;
        margin-bottom: 20px;

        position: relative;

        z-index: 10;

    }

    .table {

        margin: 0;

        border-collapse: separate;

        border-spacing: 0 12px;

    }

    .table thead th {

        background: linear-gradient(135deg, var(--orange), #ff9b3d);

        color: #fff;

        padding: 18px;

        border: none;

        font-size: 12px;

        font-weight: 700;

    }

    .table thead th:first-child {

        border-radius: 15px 0 0 15px;

    }

    .table thead th:last-child {

        border-radius: 0 15px 15px 0;

    }

    .table tbody tr {

        background: #fffaf5;

        transition: 0.3s;

    }

    .table tbody tr:hover {

        transform: translateY(-3px);

        box-shadow: 0 10px 20px rgba(255, 122, 0, 0.12);

    }

    .table tbody td {

        padding: 14px;

        vertical-align: middle;

        border-top: none;

        border-bottom: none;

        font-size: 12px;

        color: #374151;

    }

    .table tbody td:first-child {

        border-radius: 14px 0 0 14px;

        font-weight: 700;

        color: var(--orange);

    }

    .table tbody td:last-child {

        border-radius: 0 14px 14px 0;

    }

    /* BADGES */

    .badge-duration {

        background: #fff1e6;

        color: var(--orange);

        padding: 5px 10px;

        border-radius: 30px;

        font-weight: 600;

        display: inline-flex;

        align-items: center;

    }

    .badge-level {

        background: linear-gradient(135deg, var(--orange), #ff9b3d);

        color: #fff;

        padding: 5px 10px;

        border-radius: 30px;

        font-weight: 600;

    }

    /* MOBILE */

    @media(max-width:768px) {

        .page-hero {

            padding: 30px 10px 36px;

        }

        .page-hero h1 {

            font-size: 15px;

        }

        .dept-hero-icon {

            width: 70px;
            height: 70px;

            font-size: 28px;

        }

        .table-wrap {

            padding: 15px;

        }

        .table thead th,
        .table tbody td {

            font-size: 14px;

            padding: 12px;

        }

    }
</style>


<section class="content-section">

    <div class="container">

        <!-- TABLE -->

        <div class="table-wrap">
<h3>Center Available in <?= ucfirst($state) ?></h3>
           <div class="table-responsive">
    <table class="table table-striped" id="courseTable">

                    <thead>

                        <tr>

                            <th>S.No</th>

                            <th>Center Name</th>
                            <th>Address</th>
                            <th>Mobile</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        if (mysqli_num_rows($query) > 0):
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($query)):
                        ?>

                                <tr>

                                    <td class="sno-cell">
                                        <?= $i++; ?>
                                    </td>

                                    <td class="course-name-cell">
                                        <?= $row['center_name']; ?>
                                    </td>

                                    <td>
                                        <span class="badge-duration">
                                            <i class="bi bi-geo-alt me-1"></i>
                                            <?= $row['address']; ?>
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge-level level-beginner">
                                            <?= $row['mobile']; ?>
                                        </span>
                                    </td>

                                </tr>

                            <?php
                            endwhile;
                        else:
                            ?>

                            <tr>
                                <td colspan="4" class="text-center text-danger py-4">
                                    No Franchisee Found
                                </td>
                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</section>




<?php include 'footer.php'; ?>