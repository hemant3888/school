<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=utf-8">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TGIIT India (The Galaxy Institute of Information Technology) - Home</title>
	<link rel="icon" href="assets/images/logo1.png" type="image">
	<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<link href="assets/icofont/css/icofont.css" rel="stylesheet" type="text/css">
	<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="assets/js/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css">
	<link href="assets/js/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css">
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">
	<style>
	.icon-bar {
		position: fixed;
		top: 50%;
		-webkit-transform: translateY(-50%);
		-ms-transform: translateY(-50%);
		transform: translateY(-50%);
		z-index: 100000
	}
	
	.icon-bar a {
		display: block;
		text-align: center;
		padding: 16px;
		transition: all .3s ease;
		color: #fff;
		font-size: 20px
	}
	
	.icon-bar a:hover {
		background-color: #000;
		z-index: inherit
	}
	
	.facebook {
		background: #3B5998;
		color: #fff
	}
	
	.twitter {
		background: #55ACEE;
		color: #fff
	}
	
	.google {
		background: #dd4b39;
		color: #fff
	}
	
	.linkedin {
		background: #007bb5;
		color: #fff
	}
	
	.youtube {
		background: #b00;
		color: #fff
	}
	
	.float {
		position: fixed;
		width: 60px;
		height: 60px;
		bottom: 40px;
		right: 40px;
		background-color: #25d366;
		color: #FFF;
		border-radius: 50px;
		text-align: center;
		font-size: 30px;
		box-shadow: 2px 2px 3px #999;
		z-index: 100
	}
	
	.my-float {
		margin-top: 16px
	}
	
	.blink {
		animation: blinker 1.5s linear infinite;
		color: #fc9928;
		font-family: sans-serif
	}
	
	@keyframes blinker {
		50% {
			opacity: 0
		}
	}
	</style>
	 <style>
    
    .btn-open-modal:hover {
      transform: translateY(-3px);
      box-shadow: 0 14px 40px rgba(0,0,0,0.22);
    }

    /* ── Modal backdrop blur ── */
    .modal-backdrop.show { backdrop-filter: blur(6px); background: rgba(10, 50, 90, 0.45); }

    /* ── Modal dialog ── */
    .modal-dialog {
      max-width: 420px;
      width: 100%;
    }

    .modal-content {
      border: none;
      border-radius: 24px;
      overflow: hidden;
      box-shadow: 0 30px 80px rgba(10, 50, 90, 0.35);
      animation: popIn 0.4s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    @keyframes popIn {
      from { opacity: 0; transform: scale(0.88) translateY(24px); }
      to   { opacity: 1; transform: scale(1) translateY(0); }
    }

    .modal-body { padding: 44px 36px 36px; }

    /* ── Close button ── */
    .modal-close-btn {
      position: absolute;
      top: 16px; right: 20px;
      background: #f0f4f8;
      border: none;
      border-radius: 50%;
      width: 34px; height: 34px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1rem;
      color: #7a8fa0;
      cursor: pointer;
      transition: background 0.2s, color 0.2s;
      z-index: 10;
    }
    .modal-close-btn:hover { background: #e0e8f0; color: #1a2b3c; }

    /* ── Tit	le ── */
    .login-title {
      text-align: center;
      font-size: 1.75rem;
      font-weight: 800;
      color: #1a2b3c;
      margin-bottom: 28px;
      letter-spacing: -0.3px;
    }

    /* ── Google Button ── */
    .btn-google {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      width: 100%;
      padding: 12px 16px;
      border: 1.5px solid #d8dde6;
      border-radius: 10px;
      background: #fff;
      color: #3c4043;
      font-family: 'Nunito', sans-serif;
      font-size: 0.95rem;
      font-weight: 700;
      cursor: pointer;
      transition: background 0.2s, box-shadow 0.2s, border-color 0.2s;
      text-decoration: none;
    }
    .btn-google:hover {
      background: #f6f9ff;
      border-color: #4285f4;
      box-shadow: 0 2px 12px rgba(66,133,244,0.18);
    }
    .google-logo { width: 20px; height: 20px; flex-shrink: 0; }

    /* ── Divider ── */
    .divider {
      display: flex;
      align-items: center;
      gap: 12px;
      margin: 22px 0;
      color: #aab4c0;
      font-size: 0.82rem;
      font-weight: 600;
    }
    .divider::before, .divider::after {
      content: ''; flex: 1; height: 1px; background: #e8edf2;
    }

    /* ── Inputs ── */
    .input-wrap { position: relative; margin-bottom: 16px; }

    .form-input {
      width: 100%;
      padding: 13px 18px;
      border: 1.5px solid #e0e6ef;
      border-radius: 10px;
      font-family: 'Nunito', sans-serif;
      font-size: 0.95rem;
      color: #1a2b3c;
      background: #fff;
      outline: none;
      transition: border-color 0.2s, box-shadow 0.2s;
    }
    .form-input::placeholder { color: #aab4c0; }
    .form-input:focus {
      border-color: #3b9fd4;
      box-shadow: 0 0 0 3px rgba(59,159,212,0.12);
    }

    .pw-wrap .form-input { padding-right: 48px; }
    .eye-btn {
      position: absolute;
      right: 14px; top: 50%;
      transform: translateY(-50%);
      background: none; border: none;
      cursor: pointer; color: #aab4c0;
      font-size: 1.1rem; padding: 0; line-height: 1;
      transition: color 0.2s;
    }
    .eye-btn:hover { color: #3b9fd4; }

    /* ── Forgot ── */
    .forgot-link {
      display: block; text-align: right;
      font-size: 0.85rem; font-weight: 700;
      color: #3b9fd4; text-decoration: none;
      margin-top: -6px; margin-bottom: 24px;
      transition: color 0.2s;
    }
    .forgot-link:hover { color: #1a7bb8; text-decoration: underline; }

    /* ── Login Btn ── */
    .btn-login {
      width: 100%; padding: 13px;
      background: linear-gradient(90deg, #3b9fd4 0%, #1e7dc0 100%);
      border: none; border-radius: 10px;
      color: #fff; font-family: 'Nunito', sans-serif;
      font-size: 1rem; font-weight: 800;
      letter-spacing: 0.5px; cursor: pointer;
      transition: opacity 0.2s, transform 0.15s, box-shadow 0.2s;
      box-shadow: 0 4px 18px rgba(30,125,192,0.35);
    }
    .btn-login:hover { opacity: 0.91; transform: translateY(-1px); box-shadow: 0 8px 24px rgba(30,125,192,0.42); }
    .btn-login:active { transform: translateY(0); }

    /* ── Signup ── */
    .signup-line {
      text-align: center; margin-top: 18px;
      font-size: 0.85rem; color: #7a8fa0; font-weight: 600;
    }
    .signup-line a { color: #3b9fd4; font-weight: 800; text-decoration: none; }
    .signup-line a:hover { text-decoration: underline; }

    /* ── Footer ── */
    .card-footer-links {
      display: flex; justify-content: space-between;
      margin-top: 26px; padding-top: 18px;
      border-top: 1px solid #edf1f5;
    }
    .card-footer-links a {
      font-size: 0.82rem; font-weight: 700;
      color: #3b9fd4; text-decoration: none; transition: color 0.2s;
    }
    .card-footer-links a:hover { color: #1a7bb8; }

    /* ── Toast ── */
    #toast {
      position: fixed; top: 24px; left: 50%;
      transform: translateX(-50%) translateY(-90px);
      background: #1e7dc0; color: #fff;
      padding: 12px 28px; border-radius: 100px;
      font-family: 'Nunito', sans-serif;
      font-weight: 700; font-size: 0.9rem;
      box-shadow: 0 8px 30px rgba(0,0,0,0.18);
      z-index: 9999;
      transition: transform 0.4s cubic-bezier(0.22,1,0.36,1);
      white-space: nowrap;
    }
    #toast.show { transform: translateX(-50%) translateY(0); }

    /* Responsive */
    @media (max-width: 480px) {
      .modal-body { padding: 36px 20px 28px; }
      .login-title { font-size: 1.45rem; }
    }
  </style>
</head>

<body>
	<div class="top">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<ul class="list-inline pull-left icon" style="font-size:2px">
					<li><a href="tel:+918930123012"><i class="icofont icofont-phone"></i>89-3012-3012</a></li>
					<li><a href="mailto:info@tgiit.com">info@tgiit.com</a></li>
					<li>
						
							<div class="btn-group">
								<button class="btn btn-link dropdown-toggle" data-toggle="dropdown"><span class="text"><i class="icofont icofont-globe"></i> Join Us With</span> <i class="icofont icofont-caret-down"></i></button>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="" target="_blank"><i class="fa fa-facebook text-white"></i>Facebook</a></li>
									<li><a href="" target="_blank"><i class="fa fa-twitter text-white"></i>Twitter</a></li>
									<li><a href="" target="_blank"><i class="fa fa-instagram text-white"></i>Instagram</a></li>
									<li><a href="" target="_blank"><i class="fa fa-linkedin text-white"></i>Linkdin</a></li>
								</ul>
							</div>
						
					</li>
				</ul>
				<ul class="list-inline pull-right icon">
</li>
					<li>
						
							<div class="btn-group">
								<button class="btn btn-link dropdown-toggle" data-toggle="dropdown"><span class="text"><i class="icofont icofont-user"></i>Student Zone</span> <i class="icofont icofont-caret-down"></i></button>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
									    	<a href="idcard.php"><img src="assets/images/flag4.jpg">ID Card</a>
										<a href="download-slip.php"><img src="assets/images/flag4.jpg">Registration Slip</a>
										<a href="admitcard.php"><img src="assets/images/flag5.jpg">Admit Card</a>
										<a href="student-result.php"><img src="assets/images/flag1.jpg">Student Result</a>
									</li>
								</ul>
							</div>
						
					</li>
					<li>
							<div class="btn-group">
								<button class="btn btn-link dropdown-toggle" data-toggle="dropdown"><span class="text"><i class="icofont icofont-globe"></i>Verification</span> <i class="icofont icofont-caret-down"></i></button>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<a href="student-verification.php"><img src="assets/images/flag4.jpg">Student Verification</a>
										<a href="employeeverification.php"><img src="assets/images/flag5.jpg">Employee Verification</a>
									</li>
								</ul>
							</div>
					
					</li>
										<li><a href="student-result.php"><img src="assets/images/flag1.jpg">Student Result</a>

					<li><a href="login.php"><i class="icofont icofont-user"></i>Login</a></li>
					<!-- <li><button class="btn btn-open-modal" data-bs-toggle="modal" data-bs-target="#loginModal">
      <i class="bi bi-box-arrow-in-right me-2"></i> Log In
    </button></li> -->
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid" style="width: 100%;" >
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12" style="background:#f4f4c2">
				<div id="logo" style="margin:0 0">
					<a href="index.php"><img class="img-responsive" src="assets/images/logopart.jpg" alt="logo" title="logo" width="100%"></a>
				</div>
			</div>
		</div>
	</div>
<header style="background:#FC9928">
	
	<div class="container">
		<div class="row">
			<div class="col-md-12col-sm-12 col-xs-12">
				<div id="menu">
					<nav class="navbar">
						<div class="navbar-header"><span class="menutext visible-xs">Menu</span>
							<button data-target=".navbar-ex1-collapse" data-toggle="collapse" class="btn btn-navbar navbar-toggle" type="button"><i class="fa fa-bars" aria-hidden="true"></i></button>
						</div>
                        <!-- <a href="index.php"><img src="assets/images/logo1.png" alt="logo" title="logo" class="img-responsive" style="max-width: 100px;"></a> -->
						<div class="collapse navbar-collapse navbar-ex1-collapse padd0">
							<ul class="nav navbar-nav text-right">
								<li><a href="index.php">Home</a></li>
								<li class="dropdown"><a href="aboutus.php">About Us</a>
									
									<!-- <div class="dropdown-menu repeating">
										<div class="dropdown-inner">
											<ul class="list-unstyled">
												<li><a href="about-us.php">OIVET</a></li>
												<li><a href="our-team.php">Our Team</a></li>
												<li><a href="why-choose-us.php">Why Choose Us</a></li>
												<li><a href="director-message.php">Director's Message</a></li>
												<li><a href="om-welfare-society.php">Om Education &amp; Welfare Society</a></li>
												<li><a href="vocational-education-and-training.php">Vocational Education &amp; Training</a></li>
												<li><a href="vision-and-mission.php">Mission &amp; Vision</a></li>
												<li><a href="our-aim-objectives.php">Aims &amp; Objectives</a></li>
												<li><a href="scope-and-core-values.php">Scope &amp; Core Values</a></li>
											</ul>
										</div>
									</div> -->
								</li>
								<li><a href="cources.php">Departments</a></li>
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Approvals/Memberships</a>
									<div class="dropdown-menu repeating">
										<div class="dropdown-inner">
											<ul class="list-unstyled">
												<li><a href="certificates3788.php?id=tab1">INTERNATIONAL MEMBERSHIPS / RECOGNITIONS / APPROVALS</a></li>
												<li><a href="certificates4a95.php?id=tab2">NATIONAL MEMBERSHIPS/APPROVALS</a></li>
												<li><a href="certificates2bee.php?id=tab3">STATES MEMBERSHIPS/APPROVALS</a></li>
												<li><a href="certificates5308.php?id=tab4">MSME APPROVALS</a></li>
												<li><a href="certificates5e55.php?id=tab5">CERTIFICATIONS</a></li>
											</ul>
										</div>
									</div>
								</li>
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Franchisee</a>
									<div class="dropdown-menu">
										<div class="dropdown-inner">
											<ul class="list-unstyled">
												<li><a href="franchisee.php">View Franchisee</a></li>
												<li><a href="register-franch.php">Register Franchisee</a></li>
											</ul>
										</div>
									</div>
								</li>
								<!-- <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Institute</a>
									<div class="dropdown-menu repeating">
										<div class="dropdown-inner">
											<ul class="list-unstyled">
												<li><a href="institutedownloads.php">Downloads</a></li>
												<li><a href="institutefaqs.php">FAQ</a></li>
												<li><a href="newcentreregistration.php">New Centre Request</a></li>
												<li><a href="employeeverification.php">Employee Verification</a></li>
											</ul>
										</div>
									</div>
								</li> -->
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Student Zone</a>
									<div class="dropdown-menu repeating">
										<div class="dropdown-inner">
											<ul class="list-unstyled">
												<!-- <li><a href="admissionprocedure.php">Admission Procedure</a></li>
												<li><a href="studentdownloads.php">Downloads</a></li> -->
												<li><a href="download-slip.php">Registration Slip</a></li>
												<li><a href="idcard.php">ID Card</a></li>
												<li><a href="student-verification.php">Student Verification</a></li>
												<li><a href="admitcard.php">Admit Card</a></li>
												<!-- <li><a href="feedbackstudent.php">Feedback for Students</a></li> -->
												<li><a href="studentfaqs.php">FAQ's</a></li>
											</ul>
										</div>
									</div>
								</li>
								<li class="dropdown"><a href="gallery.php" >Gallery</a>
									
								</li>
								<li><a href="contactus.php">Contact Us</a></li>
								
								
							
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>
		<!-- <form name="aspnetForm" method="post" action="https://oivetindia.com/Default.aspx" id="aspnetForm">
			<div>
				<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET">
				<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT">
				<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTU5ODk1MjkxMA9kFgJmD2QWAgIBD2QWAgIBD2QWAgIDDxYCHgtfIUl0ZW1Db3VudAICFgRmD2QWAgIBDw8WAh4PQ29tbWFuZEFyZ3VtZW50BQE2ZBYCZg8VARZXZWxjb21lIFRvIE9JVkVUIElORElBZAIBD2QWAgIBDw8WAh8BBQE3ZBYCZg8VAThPSVZFVCBBTkQgT00gU1RFUkxJTkcgR0xPQkFMIFVOSVZFUlNJVFkgU1RSQVRFR0lDIFRJRS1VUGRkIM1k4AcEGi90BnesIlmdF5nSrk4="> </div>
			<script data-cfasync="false" src="assets/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript">
			function __doPostBack(o, t) {
				theForm.onsubmit && 0 == theForm.onsubmit() || (theForm.__EVENTTARGET.value = o, theForm.__EVENTARGUMENT.value = t, theForm.submit())
			}
			var theForm = document.forms.aspnetForm;
			theForm || (theForm = document.aspnetForm);
			</script>
			<div>
				<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="CA0B0334"> </div>

			<head>
				<script type="text/javascript" src="assets/js/crawler.js"></script>
				<title>

        </title> 
			</head> -->