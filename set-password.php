<?php

include('includes/config.php');

if(!isset($_GET['token'])){

    die('Invalid Token');
}

$token = $_GET['token'];

$sql = "SELECT * FROM users

WHERE reset_token='$token'

AND token_expire >= NOW()";

$query = mysqli_query($conn,$sql);

$user = mysqli_fetch_assoc($query);

if(!$user){

    die('Token Expired');
}

?>

<?php include('header.php'); ?>


    <style>

      

        .password-section{

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 50px 15px;
        }

        .password-card{

            background: #fff;

            border-radius: 15px;

            padding: 40px;

            box-shadow: 0 10px 30px rgba(0,0,0,0.08);

            width: 100%;

            max-width: 500px;
        }

        .password-icon{

            width: 80px;

            height: 80px;

            background: #0d6efd;

            color: white;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 35px;

            margin: auto;
        }

        .password-title{

            text-align: center;

            font-weight: 700;

            margin-top: 20px;

            margin-bottom: 10px;
        }

        .password-subtitle{

            text-align: center;

            color: #6c757d;

            margin-bottom: 30px;
        }

        .form-control{

            height: 50px;

            border-radius: 10px;
        }

        .btn-password{

            height: 50px;

            border-radius: 10px;

            font-weight: 600;

            width: 100%;
            margin-top: 10px;
        }

    </style>



<section class="password-section">

    <div class="password-card">

        <div class="password-icon">

            <i class="bi bi-shield-lock-fill"></i>

        </div>

        <h2 class="password-title">

            Set Your Password

        </h2>

        <p class="password-subtitle">

            Create a secure password for your center account.
        </p>

        <form action="update-password.php"
              method="POST">

            <input type="hidden"
                   name="token"
                   value="<?php 
echo $token;
 ?>">

            <!-- Password -->

            <div class="mb-3">

                <label class="form-label">

                    New Password
                </label>

                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Enter Password"
                       required>

            </div>


            <!-- Submit -->

            <button type="submit"
                    class="btn btn-primary btn-password">

                <i class="bi bi-check-circle-fill"></i>

                Set Password

            </button>

        </form>

    </div>

</section>



<?php include('footer.php'); ?>













<!-- <?php

include('includes/config.php');

if(!isset($_GET['token'])){

    die('Invalid Token');
}

$token = $_GET['token'];

$sql = "SELECT * FROM users

WHERE reset_token='$token'

AND token_expire >= NOW()";

$query = mysqli_query($conn,$sql);

$user = mysqli_fetch_assoc($query);

if(!$user){

    die('Token Expired');
}

?> -->

<!-- <form action="update-password.php"
      method="POST">

    <input type="hidden"
           name="token"
           value="<?php echo $token; ?>">

    <label>Password</label>

    <input type="password"
           name="password"
           required>

    <button type="submit">
        Set Password
    </button>

</form> -->