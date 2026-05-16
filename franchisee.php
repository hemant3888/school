<?php include 'header.php'; ?>

<!-- =========================
FRANCHISEE SECTION START
BOOTSTRAP 3.3.5 VERSION
========================= -->

<style>
    .franchise-section {
        background: #eef5ff;
        padding: 80px 0;
        overflow: hidden;
    }

    .franchise-content span {
        color: #f97316;
        font-size: 16px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .franchise-content h2 {
        font-size: 48px;
        font-weight: 700;
        color: #0b1f3a;
        margin: 20px 0;
        line-height: 60px;
    }

    .franchise-content p {
        color: #666;
        font-size: 16px;
        line-height: 30px;
    }

    .franchise-btn {
        display: inline-block;
        background: #f97316;
        color: #fff;
        padding: 14px 30px;
        border-radius: 50px;
        margin-top: 25px;
        text-decoration: none;
        transition: 0.3s;
        font-weight: 600;
    }

    .franchise-btn:hover {
        background: #f97316;
        color: #fff;
        text-decoration: none;
    }

    .franchise-image img {
        width: 100%;
    }

    .counter-box {
        margin-top: 20px;
    }

    .counter-box h3 {
        color: #f97316;
        font-size: 40px;
        margin-bottom: 0;
        font-weight: bold;
    }

    .counter-box p {
        margin: 0;
        color: #777;
    }

    /* SLIDER SECTION */

    .state-slider-section {
        padding-top: 70px;
    }

    .section-title {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-title span {
        color: #f97316;
        font-weight: 600;
        text-transform: uppercase;
    }

    .section-title h2 {
        font-size: 42px;
        font-weight: 700;
        margin-top: 15px;
        color: #0b1f3a;
    }

    .state-card {
        background: #fff;
        border-radius: 20px;
        padding: 35px 20px;
        text-align: center;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
        margin: 15px;
        transition: 0.3s;
    }

    .state-card:hover {
        transform: translateY(-10px);
    }

    .state-circle {
        width: 70px;
        height: 70px;
        background: #f97316;
        color: #fff;
        margin: auto;
        border-radius: 50%;
        line-height: 70px;
        font-size: 22px;
        font-weight: bold;
    }

    .state-card h4 {
        margin-top: 20px;
        font-size: 24px;
        font-weight: 700;
        color: #0b1f3a;
    }

    .state-card p {
        color: #777;
        margin: 15px 0;
    }

    .state-card a {
        color: #f97316;
        font-weight: 600;
        text-decoration: none;
    }

    /* Carousel arrows */

    .carousel-control.left,
    .carousel-control.right {
        background-image: none !important;
        width: 50px;
        height: 50px;
        background: #f97316 !important;
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        opacity: 1;
    }

    .carousel-control i {
        position: absolute;
        top: 14px;
        left: 18px;
        font-size: 22px;
        color: #fff;
    }

    .carousel-control.left {
        left: -20px;
    }

    .carousel-control.right {
        right: -20px;
    }

    .carousel-control .glyphicon {
        top: 14px;
    }

    @media(max-width:768px) {

        .franchise-content {
            text-align: center;
            margin-top: 40px;
        }

        .franchise-content h2 {
            font-size: 32px;
            line-height: 45px;
        }

        .section-title h2 {
            font-size: 30px;
        }

        .carousel-control.left,
        .carousel-control.right {
            display: none;
        }
    }
</style>

<section class="franchise-section">

    <div class="container">

        <!-- TOP SECTION -->
        <div class="row">

            <div class="col-md-6">
                <div class="franchise-image">
                    <img src="assets/images/franch.jpg" alt="Image" style="border-radius: 5px;">
                </div>
            </div>

            <div class="col-md-6">

                <div class="franchise-content">

                    <span>Our Franchisee</span>

                    <h2>Building Success Together</h2>

                    <p>
                        With the efforts of our team members and guidance of our management
                        more than 550+ authorized Franchisee Centers are working smoothly
                        in pan India.
                    </p>

                    <div class="counter-box">
                        <h3>550+</h3>
                        <p>Happy Clients</p>
                    </div>

                    <a href="all-states.php" class="franchise-btn">
                        View All States
                    </a>

                </div>

            </div>

        </div>

        <!-- SLIDER SECTION -->
        <div class="state-slider-section">

            <div class="section-title">
                <span>Our Presence</span>
                <h2>Our Franchisee Across States</h2>
            </div>

            <div id="stateSlider" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">

                    <!-- SLIDE 1 -->
                    <div class="item active">

                        <div class="row">

                            <div class="col-md-4">

                                <div class="state-card">

                                    <div class="state-circle">
                                        UK
                                    </div>

                                    <h4>Uttarakhand</h4>

                                    <p>Total Centers : 44</p>

                                    <a href="state-details.php?id=1">
                                        View Franchisee
                                    </a>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="state-card">

                                    <div class="state-circle">
                                        UP
                                    </div>

                                    <h4>Uttar Pradesh</h4>

                                    <p>Total Centers : 67</p>

                                    <a href="state-details.php?id=2">
                                        View Franchisee
                                    </a>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="state-card">

                                    <div class="state-circle">
                                        RJ
                                    </div>

                                    <h4>Rajasthan</h4>

                                    <p>Total Centers : 29</p>

                                    <a href="state-details.php?id=3">
                                        View Franchisee
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- SLIDE 2 -->
                    <div class="item">

                        <div class="row">

                            <div class="col-md-4">

                                <div class="state-card">

                                    <div class="state-circle">
                                        HR
                                    </div>

                                    <h4>Haryana</h4>

                                    <p>Total Centers : 33</p>

                                    <a href="state-details.php?id=4">
                                        View Franchisee
                                    </a>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="state-card">

                                    <div class="state-circle">
                                        PB
                                    </div>

                                    <h4>Punjab</h4>

                                    <p>Total Centers : 18</p>

                                    <a href="state-details.php?id=5">
                                        View Franchisee
                                    </a>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="state-card">

                                    <div class="state-circle">
                                        DL
                                    </div>

                                    <h4>Delhi</h4>

                                    <p>Total Centers : 25</p>

                                    <a href="state-details.php?id=6">
                                        View Franchisee
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- CONTROLS -->
                <a class="left carousel-control" href="#stateSlider" data-slide="prev">

                    <i class="fa fa-angle-left"></i>

                </a>

                <a class="right carousel-control" href="#stateSlider" data-slide="next">

                    <i class="fa fa-angle-right"></i>

                </a>

            </div>

        </div>

    </div>

</section>

<?php include 'footer.php'; ?>