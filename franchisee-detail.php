<?php include 'header.php'; ?>



<!-- =====================================
STATE FRANCHISEE PAGE DESIGN
BOOTSTRAP 3.3.5 + OWL CAROUSEL
====================================== -->

<style>
    .state-page {
        background: #eef5ff;
        padding: 70px 0;
        position: relative;
        overflow: hidden;
    }

    .state-heading h2 {
        font-size: 42px;
        font-weight: 700;
        color: #0b1f3a;
        margin-bottom: 10px;
    }

    .breadcrumb-custom {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .breadcrumb-custom li {
        display: inline-block;
        color: #777;
        font-size: 16px;
    }

    .breadcrumb-custom li a {
        color: #f97316;
        text-decoration: none;
    }

    .breadcrumb-custom li:after {
        content: ">";
        margin: 0 10px;
    }

    .breadcrumb-custom li:last-child:after {
        display: none;
    }

    .search-box {
        position: relative;
    }

    .search-box input {
        width: 100%;
        height: 55px;
        border: none;
        border-radius: 12px;
        padding: 0 50px 0 20px;
        font-size: 16px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
    }

    .search-box i {
        position: absolute;
        right: 18px;
        top: 18px;
        color: #999;
        font-size: 18px;
    }

    .instruction {
        margin-top: 15px;
        text-align: right;
        color: #555;
        font-size: 15px;
    }

    /* Franchise Card */

    .franchise-slider {
        margin-top: 70px;
    }

    .franchise-card {
        background: #fff;
        border-radius: 20px;
        padding: 40px 25px;
        text-align: center;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.06);
        transition: 0.4s;
        margin: 10px;
        min-height: 230px;
    }

    .franchise-card:hover {
        transform: translateY(-10px);
    }

    .franchise-card h3 {
        font-size: 30px;
        line-height: 42px;
        color: #f97316;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .franchise-card h4 {
        font-size: 24px;
        color: #333;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .franchise-code {
        display: inline-block;
        background: #f97316;
        color: #fff;
        padding: 10px 22px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 14px;
    }

    /* Owl Buttons */

    .owl-nav {
        text-align: center;
        margin-top: 40px;
    }

    .owl-prev,
    .owl-next {
        width: 55px;
        height: 55px;
        background: #f97316 !important;
        border-radius: 50% !important;
        color: #fff !important;
        font-size: 22px !important;
        line-height: 55px !important;
        margin: 0 10px;
        transition: 0.3s;
    }

    .owl-prev:hover,
    .owl-next:hover {
        background: #f97316 !important;
    }

    .owl-dots {
        display: none;
    }

    /* Decorative */

    .dots-design {
        position: absolute;
        left: 20px;
        top: 200px;
        width: 120px;
        height: 120px;
        background-image: radial-gradient(#f97316 2px, transparent 2px);
        background-size: 15px 15px;
        opacity: 0.6;
    }

    @media(max-width:768px) {

        .state-heading h2 {
            font-size: 32px;
        }

        .instruction {
            text-align: left;
        }

        .franchise-card h3 {
            font-size: 22px;
            line-height: 34px;
        }

        .franchise-card h4 {
            font-size: 20px;
        }

    }
</style>

<section class="state-page">

    <div class="dots-design"></div>

    <div class="container">

        <div class="row">

            <!-- LEFT -->
            <div class="col-md-6">

                <div class="state-heading">

                    <!-- Dynamic State Name -->
                    <h2>
                        Franchisee under
                        <!-- <?php echo urldecode($_GET['state']); ?> -->
                    </h2>

                    <ul class="breadcrumb-custom">

                        <li>
                            <a href="index.php">Home</a>
                        </li>

                        <li>
                            Franchisee
                        </li>

                    </ul>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="col-md-6">

                <div class="search-box">

                    <input type="text" placeholder="Search with Name or City">

                    <i class="fa fa-search"></i>

                </div>

                <div class="instruction">
                    Instruction :
                </div>

            </div>

        </div>

        <!-- SLIDER -->
        <div class="franchise-slider">

            <div class="owl-carousel franchise-carousel">

                <!-- CARD -->
                <div class="item">

                    <div class="franchise-card">

                        <h3>GIIT Computer Institute</h3>

                        <h4>Un</h4>

                        <span class="franchise-code">
                            UP-UNN-00-277
                        </span>

                    </div>

                </div>

                <!-- CARD -->
                <div class="item">

                    <div class="franchise-card">

                        <h3>
                            Kalkhaji Institute Of Technical Education
                        </h3>

                        <h4>Moradabad</h4>

                        <span class="franchise-code">
                            UP-MOR-00-304
                        </span>

                    </div>

                </div>

                <!-- CARD -->
                <div class="item">

                    <div class="franchise-card">

                        <h3>
                            Globel Educational & Career Consultancy Services
                        </h3>

                        <h4>Khatauli</h4>

                        <span class="franchise-code">
                            UP-KHA-00-362
                        </span>

                    </div>

                </div>

                <!-- CARD -->
                <div class="item">

                    <div class="franchise-card">

                        <h3>
                            Smart Computer Institute
                        </h3>

                        <h4>Lucknow</h4>

                        <span class="franchise-code">
                            UP-LKO-00-455
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<script>
    $(document).ready(function() {

        $('.franchise-carousel').owlCarousel({

            loop: true,

            margin: 20,

            nav: true,

            dots: false,

            autoplay: true,

            autoplayTimeout: 3000,

            navText: [
                "<i class='fa fa-arrow-left'></i>",
                "<i class='fa fa-arrow-right'></i>"
            ],

            responsive: {

                0: {
                    items: 1
                },

                600: {
                    items: 2
                },

                1000: {
                    items: 3
                }

            }

        });

    });
</script>



<?php include 'footer.php'; ?>