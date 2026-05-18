<?php include 'header.php'; ?>

<style>
    :root {
        --orange: #ff7a00;
        --dark: #1f2937;
        --light: #fff7f0;
    }

    /* SECTION */
    .contact-section {
        padding: 60px 0;
        background: var(--light);
        margin: 20px 0px;
    }

    /* CARDS */
    .contact-card {
        background: #fff;
        border-radius: 20px;
        padding: 25px;
        text-align: center;
        transition: .3s;

        margin-bottom: 10px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    .contact-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(255, 122, 0, 0.2);
    }

    .contact-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--orange), #ff9b3d);
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin: 0 auto 15px;
    }

    /* FORM */
    .contact-form {
        background: #fff;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    .form-control {
        border-radius: 12px;
        padding: 8px;
        height: 40px;
        margin-bottom: 10px;
        border: 1px solid #eee;
    }

    .form-control:focus {
        border-color: var(--orange);
        box-shadow: none;
    }

    .btn-orange {
        background: var(--orange);
        color: #fff;
        border: none;
        padding: 12px;
        border-radius: 12px;
        transition: .3s;
    }

    .btn-orange:hover {
        background: #e66a00;
    }

    /* MAP */
    .map-box iframe {
        width: 100%;
        height: 100%;
        border-radius: 20px;
        min-height: 350px;
    }

    /* MOBILE */
    @media(max-width:768px) {
        .contact-section {
            padding: 40px 10px;
        }
    }
</style>

<section class="contact-section">
    <div class="container mb-5">

        <!-- 🔶 TOP CARDS -->
        <div class="row g-4 mb-5">

            <div class="col-md-4">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <h5>Email</h5>
                    <p>info@tgiit.com</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <h5>Address</h5>
                    <p>Kalwahari, Dist. Karnal</p>
                    <p> Near Airport Haryana - 132023</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <h5>Mobile</h5>
                    <p>+91+89-3012-3012</p>
                    <p>+91-90-5390-4848</p>
                </div>
            </div>

        </div>



    </div>
    <section style="margin: 20px 0px;">
        <!-- 🔶 MAP + FORM -->
        <div class="container">
            <div class="row g-4">

                <!-- MAP -->
                <div class="col-md-6">
                    <div class="map-box">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1543.9632907938055!2d77.04385855829734!3d29.68844733986013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390e7b7033d62dc7%3A0x1baf4655d1e76da!2sThe%20Galaxy%20institute%20of%20information%20technology!5e0!3m2!1sen!2sin!4v1777978243626!5m2!1sen!2sin">
                        </iframe>

                    </div>
                </div>

                <!-- FORM -->
                <div class="col-md-6">
                    <div class="contact-form">
                        <h4 class="mb-3">Send Message for any query!</h4>

                        <form id="contactForm">

                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>

                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                            </div>

                            <div class="mb-3">
                                <textarea name="message" class="form-control" rows="4" placeholder="Message" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-orange w-100">Send Message</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
$("#contactForm").on("submit", function(e) {
    e.preventDefault();

    let formData = $(this).serialize();

    $.ajax({
        url: "db/contact_submit.php",
        type: "POST",
        data: formData,
        dataType: "json", 
        beforeSend: function(){
            $(".btn-orange").text("Sending...");
        },
        success: function(res){

            if (res.status === "success") {
                toastr.success(res.message);
                $("#contactForm")[0].reset();
            } else {
                toastr.error(res.message);
            }
        },
        error: function(xhr){
            console.log(xhr.responseText); // debug
            toastr.error("Something went wrong");
        },
        complete: function(){
            $(".btn-orange").text("Send Message");
        }
    });
});
</script>
    <?php include 'footer.php'; ?>