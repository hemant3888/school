<?php include 'header.php'; ?>
<style>


.about .feature-img {
    display: flex;
    align-items: center;
    justify-content: center;
	    margin-top: 15px;
}

.about .feature-img img {
    width: 100%;
    height: 450px;
    object-fit: cover;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

/* Tablet */
@media (max-width: 991px) {
    .about .feature-img img {
        height: 350px;
        margin-top: 20px;
    }
}

/* Mobile */
@media (max-width: 576px) {

    

    .about .feature-img img {
        height: 250px;
        margin-top: 20px;
    }

    .about .commontop h2 {
        font-size: 28px;
    }

    .about p {
        font-size: 14px;
        line-height: 26px;
    }
}
</style>
<?php
include 'includes/config.php';
$query = mysqli_query($conn, "SELECT * FROM slider ORDER BY id DESC");
?>

<div class="slide" style="max-height: 700px!important; overflow: hidden;">

    <div class="slideshow owl-carousel">

        <?php while($row = mysqli_fetch_assoc($query)){ ?>

            <div class="item">
                <img src="admin/uploads/slider/<?php echo $row['image']; ?>" 
                     alt="banner" 
                     class="img-responsive">
            </div>

        <?php } ?>

    </div>

   
    <div class="slide-detail">
        <div class="container">
            <div class="matter">

                <p class="text">Enlightening Future Through Education</p>

                <h4>The Galaxy Institute of Information Technology</h4>

                <p class="des">
                    Join India’s leading education system with prestigious international affiliations,
                    national memberships, and recognized MSME approvals for quality learning.
                </p>

            </div>
        </div>
    </div>

</div>
<div class="service">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="commontop text-center">
					<h2>our best services for you</h2>
					<p>TGIIT Provides a veriety of services in education field.</p>
					<hr>
				</div>
			</div>
			<div class="col-sm-3 col-xs-12 box text-center">
				<div class="icons">
					<div class="icon"><img src="assets/images/icon_01.png" class="img-responsive" alt="icon" title="icon"></div>
				</div>
				<h4><a href="ViewDepartments.php">Courses Offered</a></h4>
				<p>TGIIT provides various types of courses in various fields of education..</p>
			</div>
			<div class="col-sm-3 col-xs-12 box text-center">
				<div class="icons">
					<div class="icon"><img src="assets/images/icon_02.png" class="img-responsive" alt="icon" title="icon"></div>
				</div>
				<h4><a href="student-verification.php">Online Verification</a></h4>
				<p>Students can verify their results online at any time and at any place.</p>
			</div>
			<div class="col-sm-3 col-xs-12 box text-center">
				<div class="icons">
					<div class="icon"><img src="assets/images/icon_03.png" class="img-responsive" alt="icon" title="icon"></div>
				</div>
				<h4><a href="franchiseregistration.php">Become Our Partner</a></h4>
				<p>You can open your training centre with our affiliation.</p>
			</div>
			<div class="col-sm-3 col-xs-12 box text-center">
				<div class="icons">
					<div class="icon"><img src="assets/images/icon_04.png" class="img-responsive" alt="icon" title="icon"></div>
				</div>
				<h4><a href="certificates.php">Approvals and Memerships</a></h4>
				<p>TGIIT INDIA has more than 40+ Approvals from India, USA and Canada.</p>
			</div>
		</div>
	</div>
</div>

<div class="about">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-7 col-sm-12">
				<div class="commontop text-left">
					<h2>About TGIIT</h2><hr>
					<p>The Galaxy Institute of Information Technology (TGIIT) is a non-profit and charitable
						trust. It is a voluntary organization working for the development of literacy and
						creating awareness among the masses about Science & Technology and striving for
						their up-liftment in all spheres of the life through it. The promoters are in the field of
						education.
						<br>
					</p>
					<p>The idea of The Galaxy Institute of Information Technology is to promote education
						all over the India. The Galaxy Institute of Information Technology intends
						to provide consultancy support to all
						States in the India in the area of educational planning & administration for opening, diversifying and
						developing the existing or new institutions for managing the third millennium. The Galaxy Institute of
						Information Technology is committed to help the country in diagnosing
						educational
						the societal needs and requirements in
						order to define the level of learning to meet the need of its population and helping them establishing the
						appropriate targets and derive suitable strategies for implementing the policies & programs to meet the
						end institution building needs.
						<br>
					</p>
					
				</div>
			
			</div>
			<div class="col-lg-5 col-md-5 col-sm-12 feature feature-img">
				<!-- <div class="commontop text-left">
					<hr>
				</div> -->
				<div>
					<img src="assets/images/6.jpeg" alt="About Image" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="featured">
	<div class="image"><img src="assets/images/features/bg.jpg" class="img-responsive" alt="bg" title="bg"></div>
	<div class="inner">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<ul class="list-inline">
						<li>
							<div class="box">
								<div class="icon">
									<div class="icons"><img src="assets/images/features/icon1.png" class="img-responsive" alt="image" title="image"></div>
								</div>
								<h4>Happy Students</h4>
								<p>1500+</p>
							</div>
						</li>
						<li>
							<div class="box">
								<div class="icon">
									<div class="icons"><img src="assets/images/features/icon2.png" class="img-responsive" alt="image" title="image"></div>
								</div>
								<h4>Approved Courses</h4>
								<p>250+</p>
							</div>
						</li>
						<li>
							<div class="box">
								<div class="icon">
									<div class="icons"><img src="assets/images/features/icon3.png" class="img-responsive" alt="image" title="image"></div>
								</div>
								<h4>Certified Teachers</h4>
								<p>150+</p>
							</div>
						</li>
						<li>
							<div class="box">
								<div class="icon">
									<div class="icons"><img src="assets/images/features/icon4.png" class="img-responsive" alt="image" title="image"></div>
								</div>
								<h4>Student Placement</h4>
								<p>200+</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="about">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-xs-12 feature">
				<div class="commontop text-left">
					<h2>ASSOCIATE WITH US</h2>
				</div>
				<div class="box"><img src="assets/images/icon01.png" class="img-responsive" alt="icon" title="icon">
					<p>TRAINEE</p><a href="#">Join us an Trainee and you will be exposed to complex global transactions. Join us today.</a>
				</div>
				<div class="box"><img src="assets/images/icon02.png" class="img-responsive" alt="icon" title="icon">
					<p>TRAINING CENTER</p><a href="#">Join the Skill India Mission by joining the hands with us as Associate training Centre.</a>
				</div>
				<div class="box"><img src="assets/images/icon03.png" class="img-responsive" alt="icon" title="icon">
					<p>PLACEMENT PROGRAM</p><a href="#">Registered with us to search through a database of skilled workforce to meet industry requirement</a>
				</div>
			</div>
			<div class="col-sm-8 col-xs-12">
				<div class="commontop text-left">
					<h2>Need of Vocational Training in India</h2>
					<p>The Central and State Governments of India were making considerable efforts to enhance skills of the youth, but there is huge gap between demand and supply of the skilled workforce. India is 2nd largest populated country in the world and 1st fast growing economy in the world. India is a young country having 60% of population below 35 yrs. of age (average), this is its work force. India need for 700 million skilled workers by 2022. However, presently only 2% of the total workforce is undergone skill training. This clearly indicates that most of our population is under skilled and therefore unemployed.</p>
					<p>Dearth of formal vocational education, lack of vide variation quality, high school dropout rates, inadequate skill training capacity, negative perception towards skilling, and lack of industry ready skills even in processional courses are the major cause of poor skill levels of India’s workforce.</p>
					<p>India has great opportunity to meet the future demand of work force of the world. India can become the worldwide skilled workforce source in next decade. Skilled workforce will be the key to “Make in India”, Government would need to step in both by providing funds and incentives to encourage organisations to welcome training and trained candidates into their workforce. This can especially help small and medium firms to include a compulsory training programme. Huge numbers of youth, who may be without formal college education, can train in vocational skills that can help get them employment.</p>
					<p>The vocationalization provides for diversification of educational opportunities so as to enhance individual employability, reduce the mismatch between demand and supply of skilled manpower. <a href="vocational-education-and-training.php">Read More</a></p>
					<hr>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <div class="testimonail">
	<div class="image"><img src="assets/images/test_bg.jpg" class="img-responsive" alt="bg" title="bg"></div>
	<div class="inner">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="box">
						<div class="icon"><img src="assets/images/test.png" class="img-responsive" alt="image" title="image"></div>
						<h4>Rahul kumar</h4>
						<p><i class="icofont icofont-quote-left"></i>Vocational Institute in India. Great skills that make you self dependent in life..</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
<?php include 'footer.php'; ?>