<?php include 'header.php'; ?>
<style>
    table.dataTable td,
    table.dataTable th {

        white-space: nowrap;

    }
</style>

<div class="pagetitle">
    <h1>ID Cards</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">All ID Cards</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<div class="card">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-2 flex-wrap gap-2">
            <h5 class="card-title mb-0">All ID Cards</h5>
        </div>

        <div class="table-responsive">

            <table id="idcardTable"
                class="table table-bordered table-striped nowrap align-middle"
                style="width:100%">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Photo</th>
                        <th>Enrollment</th>

                        <th>Name</th>
                        <th>Father Name</th>
                        <th>DOB</th>

                        <th>Course</th>
                        <th>Session</th>
                        <th>Center Name</th>
                        <th>Action</th>


                    </tr>

                </thead>

                <tbody>

                    <?php




                    $query = "

SELECT

students.*,

course.course_name,

center.center_name

FROM students

LEFT JOIN course
ON students.course_id = course.id

LEFT JOIN center
ON students.center_id = center.id

ORDER BY students.id DESC

";

                    $result = mysqli_query($conn, $query);
                    

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>

                                <!-- ID -->

                                <td>
                                    <?php echo $row['id']; ?>
                                </td>

                                <!-- PHOTO -->

                                <td>

                                    <img
                                        src="../center/uploads/students/<?php echo $row['photo']; ?>"
                                        width="50"
                                        height="50"
                                        style="object-fit:cover;border-radius:50%;">

                                </td>

                                <!-- ENROLLMENT -->

                                <td>
                                    <?php echo $row['enroll_no']; ?>
                                </td>

                                <!-- NAME -->

                                <td>
                                    <?php echo $row['stu_name']; ?>
                                </td>

                                <!-- FATHER -->

                                <td>
                                    <?php echo $row['father_name']; ?>
                                </td>

                                <!-- DOB -->

                                <td>
                                    <?php echo $row['dob']; ?>
                                </td>

                                <!-- COURSE -->

                                <td>
                                    <?php echo $row['course_name']; ?>
                                </td>

                                <!-- SESSION -->

                                <td>
                                    <?php echo $row['session']; ?>
                                </td>

                                <!-- CENTER -->

                                <td>
                                    <?php echo $row['center_name']; ?>
                                </td>

                                <!-- ACTION -->

                                <td>

                                    <!-- VIEW -->

                                    <button
                                        class="btn btn-primary btn-sm viewCardBtn"

                                        data-id="<?php echo $row['id']; ?>"

                                        data-name="<?php echo $row['stu_name']; ?>"

                                        data-enrollment="<?php echo $row['enroll_no']; ?>"

                                        data-father="<?php echo $row['father_name']; ?>"

                                        data-course="<?php echo $row['course_name']; ?>"

                                        data-session="<?php echo $row['session']; ?>"

                                        data-center="<?php echo $row['center_name']; ?>"

                                        data-photo="<?php echo $row['photo']; ?>"

                                        data-dob="<?php echo $row['dob']; ?>">

                                        <i class="bi bi-eye"></i>

                                        View

                                    </button>

                                    <!-- DOWNLOAD -->

                                    <a
                                        href="download-id-card.php?id=<?php echo $row['id']; ?>"

                                        class="btn btn-success btn-sm"

                                        target="_blank">

                                        <i class="bi bi-download"></i>

                                        Download

                                    </a>

                                </td>

                            </tr>
                    <?php
                        }
                    }
                    ?>

                </tbody>

            </table>

        </div>

    </div>

</div>
<!-- ID CARD MODAL -->

<div class="modal fade"
    id="idCardModal"
    tabindex="-1">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Student ID Card

                </h5>

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <!-- AJAX CONTENT -->

                <div id="idCardData">

                    <div class="text-center py-5">

                        Loading...

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
   $(document).on('click','.viewCardBtn',function(){

    let student_id = $(this).data('id');

    $('#idCardModal').modal('show');

    $.ajax({

        url:'view-id-card.php',

        type:'POST',

        data:{
            student_id:student_id
        },

        success:function(response)
        {

            $('#idCardData').html(response);

        }

    });

});
</script>
<script>
    $(document).ready(function() {

        $('#idcardTable').DataTable({

            responsive: false,
            scrollX: true,

            autoWidth: false,
            pageLength: 10,

            ordering: true

        });

    });
</script>


<?php include 'footer.php' ?>