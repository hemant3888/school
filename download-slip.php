<?php include 'header.php'; ?>
<?php

include 'includes/config.php';

$message = "";

if(isset($_POST['search']))
{
    $registration_no = mysqli_real_escape_string($conn, $_POST['registration_no']);

    $dob = mysqli_real_escape_string($conn, $_POST['dob']);

    $query = "SELECT * FROM students
              WHERE registration_no='$registration_no'
              AND dob='$dob'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);

        if($row['registration_slip'] != '')
        {
         echo "<script>
window.location.href='center/uploads/slips/".$row['registration_slip']."';
</script>";

exit();
        }
        else
        {
            $message = "<div class='alert alert-warning mt-3'>
                            Slip Not Generated Yet
                        </div>";
        }
    }
    else
    {
        $message = "<div class='alert alert-danger mt-3'>
                        Invalid Enrollment Number Or Date Of Birth
                    </div>";
    }
}

?>


    <style>

       

        .verify-section{
           
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }

        .verify-card{
            width: 100%;
            max-width: 800px;
            background: #fff;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
        }

        .verify-header{
            background: #0d6efd;
            color: #fff;
            text-align: center;
            padding: 20px 10px;
        }

        .verify-header h2{
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .verify-header p{
            font-size: 14px;
            margin: 0;
        }

        .verify-body{
            padding: 30px;
        }

        .form-label{
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
            padding-left: 5px;
        }

        .form-control{
            height: 40px;
            border-radius: 25px;
            font-size: 16px;
            padding-left: 25px;
        }

        .verify-btn{
            background: #0d6efd;
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 5px 10px;
            font-size: 14px;
            font-weight: 600;
            transition: 0.3s;
            margin: 10px 0px;
            
        }

        .verify-btn:hover{
            background: #0b5ed7;
        }

        .alert{
            font-size: 16px;
            border-radius: 10px;
        }

        @media(max-width:768px)
        {
            .verify-card{
                border-radius: 15px;
            }

            .verify-header{
                padding: 7px;
            }

            .verify-header h2{
                font-size: 16px;
            }

            .verify-header p{
                font-size: 10px;
            }

            .verify-body{
                padding: 15px;
            }

            .form-label{
                font-size: 15px;
            }

            .form-control{
                height: 35px;
                font-size: 12px;
                border-radius: 10px;
            }

            .verify-btn{
                width: 100%;
                font-size: 10px;
                padding: 8px;
            }

            .alert{
                font-size: 10px;
            }
        }

    </style>





<section class="verify-section">

    <div class="verify-card">

        <div class="verify-header">

            <h2>
                <i class="bi bi-patch-check-fill"></i>
                Registration Slip 
            </h2>

            <p>
                Enter Registration Number & Date of Birth
            </p>

        </div>

        <div class="verify-body">

            <form method="POST">

                <div class="mb-4">

                    <label class="form-label">
                        Registration Number
                    </label>

                    <input type="text"
                           name="registration_no"
                           class="form-control"
                           placeholder="Enter Registration Number"
                           required>

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Date of Birth
                    </label>

                    <input type="date"
                           name="dob"
                           class="form-control"
                           required>

                </div>

                <button type="submit"
                        name="search"
                        class="verify-btn">

                    <i class="bi bi-search"></i>
                    Verify Student

                </button>

            </form>

            <?php echo $message; ?>

        </div>

    </div>

</section>

<?php include 'footer.php'; ?>