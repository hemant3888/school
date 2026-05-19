<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>

:root{
    --orange:#ff7a00;
    --orange-dark:#e56b00;
    --bg:#f8fafc;
}

body{
    background: var(--bg);
    font-family: 'Segoe UI', sans-serif;
    height: 100vh;
    display:flex;
    align-items:center;
    justify-content:center;
}

/* CARD */
.forgot-card{
    background:#fff;
    padding:40px;
    border-radius:15px;
    width:100%;
    max-width:420px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
    text-align:center;
}

/* ICON */
.forgot-icon{
    width:70px;
    height:70px;
    background:linear-gradient(135deg,var(--orange),#ff9b3d);
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:28px;
    margin:auto;
}

/* TITLE */
.forgot-title{
    font-weight:700;
    margin-top:15px;
}

.forgot-sub{
    color:#6c757d;
    font-size:14px;
    margin-bottom:25px;
}

/* INPUT */
.form-control{
    height:48px;
    border-radius:10px;
}

/* BUTTON */
.btn-orange{
    background:var(--orange);
    color:#fff;
    border:none;
    height:48px;
    border-radius:10px;
    font-weight:600;
    transition:.3s;
}

.btn-orange:hover{
    background:var(--orange-dark);
}

</style>

</head>

<body>

<div class="forgot-card">

    <div class="forgot-icon">
       <i class="bi bi-envelope-fill"></i>
    </div>

    <h4 class="forgot-title">Forgot Password?</h4>

    <p class="forgot-sub">
        Enter your email to receive a password reset link
    </p>

    <div id="msg"></div>

    <form id="forgotForm">

        <input type="email" name="email" class="form-control mb-3" placeholder="Enter your email" required>

        <button class="btn btn-orange w-100">
            Send Reset Link
        </button>

    </form>

</div>

<script>

$(document).ready(function(){

    $("#forgotForm").on("submit", function(e){

        e.preventDefault();

        let form = $(this);
        let btn = form.find("button");

        btn.prop("disabled", true).text("Please wait...");

        $.ajax({
            url: "db/forgot-password.php",
            type: "POST",
            data: form.serialize(),
            dataType: "json",
            success: function(data){

                console.log(data);

                if(data.status === 'success'){

                    $("#msg").html(`<div class="alert alert-success">${data.message}</div>`);

                    form[0].reset();

                    // 🔥 redirect
                    setTimeout(() => {
                        window.location.href = "login.php";
                    }, 2000);

                }else{
                    $("#msg").html(`<div class="alert alert-danger">${data.message}</div>`);
                }

                btn.prop("disabled", false).text("Send Reset Link");
            },
            error:function(xhr){
                console.log(xhr.responseText);
                $("#msg").html(`<div class="alert alert-danger">Server Error</div>`);
                btn.prop("disabled", false).text("Send Reset Link");
            }
        });

    });

});

</script>

</body>
</html>