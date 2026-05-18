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

    .state-slider-section {
        padding: 70px 0;
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
        margin-top: 10px;
    }

    /* CARD */
    .state-card {
        background: #fff;
        border-radius: 20px;
        padding: 30px 20px;
        text-align: center;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
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
        font-size: 22px;
        font-weight: 700;
    }

    .state-card p {
        color: #777;
    }

    .state-card a {
        color: #f97316;
        font-weight: 600;
        text-decoration: none;
    }

    /* SWIPER */
    .swiper {
        padding-bottom: 50px;
    }

    .swiper-slide {
        display: flex;
        justify-content: center;
    }

    .swiper-button-next,
    .swiper-button-prev {
        background: #f97316;
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .swiper-button-next::after,
    .swiper-button-prev::after {
        font-size: 18px;
        color: #fff;
    }

    .swiper-pagination-bullet {
        background: #f97316;
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
        <?php
        include 'includes/config.php';
        $query = mysqli_query($conn, "
    SELECT state, COUNT(*) as total 
    FROM center 
    GROUP BY state
");
        ?>

        <div class="container state-slider-section">

            <div class="section-title">
                <span>Our Presence</span>
                <h2>Our Franchisee Across States</h2>
            </div>

            <div class="swiper myStateSwiper">
                <div class="swiper-wrapper">

                    <?php while ($row = mysqli_fetch_assoc($query)): ?>
                        <div class="swiper-slide">
                            <div class="state-card">

                                <div class="state-circle">
                                    <?= strtoupper(substr($row['state'], 0, 2)); ?>
                                </div>

                                <h4><?= $row['state']; ?></h4>

                                <p>Total Centers : <?= $row['total']; ?></p>

                                <a href="franchisee-detail.php?state=<?= urlencode($row['state']); ?>">
                                    View Franchisee
                                </a>

                            </div>
                        </div>
                    <?php endwhile; ?>

                </div>

                <!-- controls -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>

            </div>

        </div>

    </div>

</section>

<?php include 'footer.php'; ?>