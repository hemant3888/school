<?php

include '../includes/config.php';

if(isset($_POST['enrollment_no']) && isset($_POST['dob'])){

    $enrollment_no = mysqli_real_escape_string($conn, $_POST['enrollment_no']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);

    $query = mysqli_query($conn,"
        SELECT * FROM students 
        WHERE enroll_no='$enrollment_no'
        AND dob='$dob'
    ");

    if(mysqli_num_rows($query) > 0){

        $student = mysqli_fetch_assoc($query);

        ?>

        <div class="alert alert-success text-center">

            <h5 class="mb-3">
                Student Verified Successfully
            </h5>

            <a href="download-id-card.php?enrollment_no=<?php echo $student['enroll_no']; ?>" 
               class="btn btn-primary"
               target="_blank">

                <i class="bi bi-download"></i>
                Download ID Card

            </a>

        </div>

        <?php

    }else{

        ?>

        <div class="alert alert-danger text-center">

            Invalid Enrollment Number or Date of Birth

        </div>

        <?php

    }

}else{

    ?>

    <div class="alert alert-danger text-center">

        Invalid Request

    </div>

    <?php

}

?>