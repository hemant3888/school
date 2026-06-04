<?php include 'header.php'; ?>
<style>
    table.dataTable td,
    table.dataTable th {

        white-space: nowrap;

    }
</style>

<div class="pagetitle">
    <h1>Attendance</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Attendance</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<div class="card">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <h5 class="card-title mb-0">All Students</h5>
        </div>

        <div class="table-responsive">

            <table id="studentTable"
                class="table table-bordered table-striped nowrap align-middle"
                style="width:100%">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Student</th>
                        
                        <th>Enrollment No.</th>
                       
                        <th>Attendance Detail</th>


                    </tr>

                </thead>

                <tbody>

                    <?php

                 $sql = "SELECT
                                s.id,
                                s.stu_name,
                                s.enroll_no,
                                u.id as user_id
                            FROM students s
                            LEFT JOIN users u ON u.student_id = s.id
                            WHERE s.center_id = '$center'
                            ORDER BY s.stu_name ASC";

                    $query = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($query)) {

                    ?>

                        <tr>

                            <!-- ID -->
                            <td>
                                <?php echo $row['id']; ?>
                            </td>

                            <!-- Student -->
                            <td>

                                <div class="d-flex align-items-center gap-2">

                                  

                                    <div>
                                        <strong>
                                            <?php echo $row['stu_name']; ?>
                                        </strong>
                                       

                                       
                                    </div>

                                </div>

                            </td>

                            
                            <!-- enrollment number -->
                            <td>
                                <?php
                               
                                    echo $row['enroll_no'];
                               
                                ?>
                            </td>
                         
                            <td>

                               
                               <a href="attendance-detail.php?student_id=<?php echo $row['id']; ?>"
   class="btn btn-info btn-sm">
    <i class="bi bi-eye"></i>
</a>

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
    $(document).on('click', '.editstudent', function() {

        let student_id = $(this).data('id');

        $.ajax({

            url: 'db/get-student.php',

            type: 'POST',

            data: {
                student_id: student_id
            },

            success: function(response) {

                let data = JSON.parse(response);

                if (data.status == 'success') {

                    $('#edit_student_id').val(data.student.id);

                    $('#edit_stu_name').val(data.student.stu_name);

                    $('#edit_mobile').val(data.student.mobile);
                    $('#edit_depart').val(data.student.depart_id);
                    $('#edit_course').val(data.student.course_id);

                    $('#edit_email').val(data.student.email);
                    $('#edit_state').val(data.student.state);
                    $('#edit_city').val(data.student.city);
                    $('#edit_pincode').val(data.student.pincode);
                    $('#edit_session').val(data.student.session);
                    $('#edit_fees').val(data.student.fees);
                    $('#edit_qualification').val(data.student.qualification);
                    $('#edit_dob').val(data.student.dob);
                    $('#edit_mother_name').val(data.student.mother_name);
                    $('#edit_father_name').val(data.student.father_name);

                    $('#edit_address').val(data.student.address);

                    $('#editStudentModal').modal('show');

                } else {

                    alert(data.message);

                }

            }

        });

    });
</script>


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