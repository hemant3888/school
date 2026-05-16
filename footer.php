	<script type="text/javascript">
		marqueeInit({
			uniqueid: "mycrawler",
			style: {
				padding: "5px",
				width: "450px",
				background: "lightyellow",
				border: "1px solid #CC3300"
			},
			inc: 5,
			mouse: "cursor driven",
			moveatleast: 2,
			neutral: 150,
			persist: !0,
			savedirection: !0
		});
	</script>
	<script type="text/javascript">
		marqueeInit({
			uniqueid: "mycrawler2",
			style: {
				padding: "2px",
				width: "600px",
				height: "180px"
			},
			inc: 5,
			mouse: "cursor driven",
			moveatleast: 2,
			neutral: 150,
			savedirection: !0,
			random: !0
		});
	</script>
	<div id="newsletter">
		<div class="container">
			<div class="row">
				<?php
				$images = [
					"assets/images/mr1.png",
					"assets/images/mr2.png",
					"assets/images/mr3.png",
					"assets/images/mr4.png",
					"assets/images/mr5.png",
					"assets/images/mr6.png",
					"assets/images/mr7.png",
					"assets/images/mr8.png",
					"assets/images/partner/7.jpg",
					"assets/images/partner/8.jpg"
				];
				?>
				<div id="subscribe">
					<form class="form-horizontal" name="subscribe">
						<div class="col-sm-12">
							<p class="news">Our National Approvals/Memberships</p>
						</div>
						<marquee scrollamount="10" loop>
							<?php foreach ($images as $img): ?>
								<span style="display:inline-block;">
									<img src="<?= $img ?>" style="height:80px; width:auto; margin-right:20px;">
								</span>
							<?php endforeach; ?>
						</marquee>
					</form>
				</div>

				<!-- <div class="swiper mySwiper">
					<div class="swiper-wrapper">
						<?php foreach ($images as $img): ?>
							<div class="swiper-slide">
								<img src="<?= $img ?>" style="width:100px;">
							</div>
						<?php endforeach; ?>
					</div>
				</div> -->
			</div>
		</div>
	</div>
	</form>
	<footer>
		<div class="container">
			<div class="row inner">
				<div class="col-sm-3"><img src="assets/images/logo1.png" class="img-responsive img" title="logo" alt="logo" style="max-width: 100px;">
					<br>
					<p class="text-light">The Galaxy Institute of Information Technology </p>

					<p class="text-light">Our institute is committed to building strong careers through expert guidance, modern teaching methods, and continuous skill development for a brighter future. </p>
					<div class="social">
						<ul class="list-inline">
							<li><a href="" target="_blank"><i class="icofont icofont-social-facebook"></i></a></li>
							<li><a href="" target="_blank"><i class="icofont icofont-social-instagram"></i></a></li>
							<li><a href="" target="_blank"><i class="icofont icofont-social-linkedin"></i></a></li>
							<li><a href="" target="_blank"><i class="icofont icofont-social-youtube"></i></a></li>
						</ul>

					</div>
				</div>
				<div class="col-sm-3 links1">
					<h5>quick links</h5>
					<hr>
					<ul class="list-unstyled">
						<li><a href="index.php"><i class="fa fa-link"></i>Home Page</a></li>
						<li><a href="about-us.php"><i class="fa fa-link"></i>About Us</a></li>
						<!-- <li><a href="vision-and-mission.php"><i class="fa fa-link"></i>Our Mission</a></li> -->
						<li><a href="ViewDepartments.php"><i class="fa fa-link"></i>All Courses</a></li>
						<!-- <li><a href="disclaimer.php"><i class="fa fa-link"></i>Disclaimer</a></li> -->
						<li><a href="Private-Policy.php"><i class="fa fa-link"></i>Privacy Policy</a></li>
						<li><a href="Evaluation-Procedure.php"><i class="fa fa-link"></i>Evaluation Procedure</a></li>
						<!-- <li><a href="copyright.php"><i class="fa fa-link"></i>Copyright</a></li> -->
						<!-- <li><a href="studentdownloads.php"><i class="fa fa-link"></i>Downloads</a></li> -->
						<li><a href="contactus.php"><i class="fa fa-link"></i>Contact</a></li>
					</ul>
				</div>
				<div class="col-sm-3 links2">
					<h5>Direction</h5>
					<hr>
					<div>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1543.9632907938055!2d77.04385855829734!3d29.68844733986013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390e7b7033d62dc7%3A0x1baf4655d1e76da!2sThe%20Galaxy%20institute%20of%20information%20technology!5e0!3m2!1sen!2sin!4v1777978243626!5m2!1sen!2sin" width="250" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
				<div class="col-sm-3 links2">
					<h5>Address</h5>
					<hr>

					<ul class="list-unstyled contact">

						<!-- Address -->
						<li class="d-flex mb-3">
							<i class="icofont icofont-home me-2 mt-1"></i>
							<address class="mb-0">
								<strong>Address :</strong><br>
								Kalwahari, Dist. Karnal Near Airport Haryana - 132023
							</address>

						</li>

						<!-- Phone Numbers -->
						<li class="d-flex mb-3">
							<i class="icofont icofont-phone me-2 mt-1"></i>
							<div>

								<a href="tel:+918930123012">+91-89-3012-3012</a>
							</div>
						</li>
						<li class="d-flex mb-3">
							<i class="icofont icofont-brand-whatsapp me-2 mt-1"></i>
							<div>
								<a href="https://wa.me/919053904848" target="_blank">
									+91-90-5390-4848
								</a>
							</div>
						</li>

						<!-- Emails -->
						<li class="d-flex mb-3">
							<i class="icofont icofont-email me-2 mt-1"></i>
							<div>
								<a href="mailto:info@tgiit.com">info@tgiit.com</a>
							</div>
						</li>

						<!-- Toll Free -->
						<!-- <li class="d-flex">
        <i class="icofont icofont-phone me-2 mt-1"></i>
        <div>
            <strong>Toll Free :</strong>
            <a href="tel:18008904080">1800-890-4080</a>
        </div>
    </li> -->

					</ul>
				</div>
			</div>
		</div>

		<div class="powered">
			<div class="container">
				<div class="row">

					<div class="col-sm-12 text-right">
						<p><?php echo date('Y'); ?>&nbsp;Copyright © TGIIT. All Rights Reserved | Privacy Policy</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<script src="assets/js/jquery.2.1.1.min.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
	<script>
		var swiper = new Swiper(".mySwiper", {
			slidesPerView: "auto",
			spaceBetween: 20,
			loop: true,
			autoplay: {
				delay: 0,
				disableOnInteraction: false,
			},
			speed: 3000,
		});
	</script>
	<script>
		$('#stateSlider').carousel({
			interval: 2000
		});
	</script>
	<script async src='https://assets/d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js'></script>
	<!-- <script>
		var wa_btnSetting = {
			"btnColor": "#16BE45",
			"ctaText": "",
			"cornerRadius": 40,
			"marginBottom": 20,
			"marginLeft": 20,
			"marginRight": 20,
			"btnPosition": "right",
			"whatsAppNumber": "917272900039",
			"welcomeMessage": "Welcome to OM Institute of Vocational Education & Training",
			"zIndex": 999999,
			"btnColorScheme": "light"
		};
		window.onload = () => {
			_waEmbed(wa_btnSetting);
		};
	</script> -->

	<script async src="assets/d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js"></script>
	<script>
		var wa_btnSetting = {
			"btnColor": "#16BE45",
			"ctaText": "",
			"cornerRadius": 40,
			"marginBottom": 20,
			"marginLeft": 20,
			"marginRight": 20,
			"btnPosition": "right",
			"whatsAppNumber": "917272900039",
			"welcomeMessage": "Hello",
			"zIndex": 999999,
			"btnColorScheme": "light"
		};
		window.onload = () => {
			_waEmbed(wa_btnSetting);
		};
	</script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->

	<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/dist/js/bootstrap-select.js" type="text/javascript"></script>
	<script src="assets/js/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
	<script src="assets/js/internal.js" type="text/javascript"></script>

	<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8c78df7c7c0f484497ecbca7046644da1771523124516" integrity="sha512-8DS7rgIrAmghBFwoOTujcf6D9rXvH8xm8JQ1Ja01h9QX8EzXldiszufYa4IFfKdLUKTTrnSFXLDkUEOTrZQ8Qg==" data-cf-beacon='{"version":"2024.11.0","token":"d89fe4dced95439a92ff29708e00daa6","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>

	</body>

	</html>