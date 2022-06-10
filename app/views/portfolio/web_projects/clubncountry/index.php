<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta name="author" content="Club and Country" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="language" content="English">
    <meta name="revisit-after" content="1 days">
    <meta name="dcterms.rightsHolder" content="Club and Country">
    <meta name="dcterms.rights" content="Unless otherwise indicated, this Website is our proprietary property and all source codes, databases, functionalities, softwares, audio, video, text, photographs, graphic content and designs on the Website (collectively, The 'Content') and the trademarks, service marks, and logos contained therein (the 'Marks') are owned or controlled by us or licensed to us, and are protected by copyright and trademark laws and various other intellectual property rights and unfair competition laws of Nigeria, foreign jurisdictions, and international conventions." />
    <meta name="dcterms.dateCopyrighted" content="2020">
    <title>Club and Country</title>
    <meta content="Club and Country is a sports marketing and management agency focused on creating and implementing innovative marketing strategies for sports properties. Our goal is to significantly improve the image and value of our clients, using unique and effective ideas. Our work is driven by a conviction in the power of sports and in its power to influence and engage millions." name="description">
    <meta content="sports, sports agency, sports marketing, sports management, marketing, agency, management, marketing agency, management agency" name="keywords">
    <meta name="theme-color" content="#113c0a">
    <!--Windows Phone **-->
    <meta name="msapplication-navbutton-color" content="#113c0a">
    <!--iOS Safari-->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <!-- Favicons -->
    <link href="assets/img/favicon.ico" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-mobile.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
	<!-- Vendor JS Files -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>

</head>

<body>
    <header id="header">
        <div class="bg_text">
            <img src="assets/img/logo-variant.png">
			<div class="bannLinks">
				<a href="#about">About us</a>
				<a href="#contact">Contact us</a>
			</div>
			<ul id="bannSocial">
				<li><a class="mdi mdi-24px mdi-facebook" href="#"></a></li>
				<li><a class="mdi mdi-24px mdi-instagram" href="#"></a></li>
				<li><a class="mdi mdi-24px mdi-twitter" href="#"></a></li>
				<li><a class="mdi mdi-24px mdi-whatsapp" href="#"></a></li>
			</ul>
            <!-- <hr> -->
        </div>
    </header>
    <main id="main">
        <section id="about" class="about">
            <div class="container">
                <div class="section-title">
                    <h2 id="title">About Us</h2>
                    <hr/>
                    <div class="section-sub-title">
                        <p>Club and Country is a sports marketing and management agency focused on creating and implementing innovative marketing strategies for sports properties. Our goal is to significantly improve the image and value of our clients, using unique and effective ideas. Our work is driven by a conviction in the power of sports and in its power to influence and engage millions.</p>
                        <a href="#contact">Contact us</a>
                    </div>
                </div>
                <div class="section-body">
                    <div class="cards gallery">
                        <div class="row">
                            <div class="card">
                                <div class="card_img">
                                    <div id="shader"></div>
                                    <img src="assets/img/1.jpg" alt="">
                                </div>
                                <div class="card_caption">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card_img">
                                    <div id="shader"></div>
                                    <img src="assets/img/4.jpg" alt="">
                                </div>
                                <div class="card_caption">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card_img">
                                    <div id="shader"></div>
                                    <img src="assets/img/8.jpg" alt="">
                                </div>
                                <div class="card_caption">
                                    <!-- <h3 id="caption">Caption</h3>
                                    <h3 id="caption"><i class="mdi mdi-18px mdi-light mdi-message-text-outline"></i>Sub-Caption</h3> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="portfolio" class="portfolio">
            <video id="port" autoplay loop>
                <source src="assets/img/QXJvbWUgKEBhYXJvbWVfKTE=.mp4" type="video/mp4">
            </video>
            <div class="portf-cover">
                <h2>Club<img src="assets/img/min-logo2.png">Country</h2>
            </div>
        </section>
		<section id="contact" class="contact">
			<div class="container">
                <div class="section-title">
                    <h2 id="title">Contact Us</h2>
                    <hr/>
				</div>
				<div class="section-body">
					<div class="section-right">
						<div id="section-right-header">
							<form method="POST" name="msg-form" id="msg-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
								<div class="form-group">
									<label for="name">Name *</label>
									<input type="text" id="name" name="name" title="Enter your name..." placeholder="Enter your name..." required>
								</div>
								<div class="form-group">
									<label for="email">Email *</label>
									<input type="email" id="email" name="email" title="Enter your email..." placeholder="Enter your email..." required>
								</div>
								<div class="form-group">
									<label for="phone">Phone *</label>
									<input type="tel" id="phone" name="phone" title="Enter your number..." placeholder="Enter your number..." required>
								</div>
								<div class="form-group">
									<button id="send-msg" name="send-msg"><i class="mdi mdi-18px mdi-email-open"></i>Say Hi!</button>
									<div class="form-group-minor">
										<span id="error"></span>
										<span id="success"></span>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="section-left">
                        <div class="contact-img">
						</div>
					</div>
				</div>
			</div>
		</section>
        <svg id="mium" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none"><path fill="#000000" d="M0,224L40,218.7C80,213,160,203,240,213.3C320,224,400,256,480,240C560,224,640,160,720,144C800,128,880,160,960,149.3C1040,139,1120,85,1200,96C1280,107,1360,181,1400,218.7L1440,256L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>
        <svg id="shadow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none"><path fill="#ececec" d="M0,224L40,218.7C80,213,160,203,240,213.3C320,224,400,256,480,240C560,224,640,160,720,144C800,128,880,160,960,149.3C1040,139,1120,85,1200,96C1280,107,1360,181,1400,218.7L1440,256L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>
    </main>
    <footer id="footer">
        <div class="container">
			<div class="section-left">
				<div id="section-left-header">
					<h2>Explore</h2>
				</div>
			</div>
			<div class="section-right">
				<ul id="footer-nav">
					<li><a href="#">Home</a></li>
					<li><a href="#about">About Us</a></li>
					<li><a href="#contact">Contact Us</a></li>
				</ul>
				<ul id="footer-social">
					<li><a class="mdi mdi-18px mdi-facebook" href="#"></a></li>
					<li><a class="mdi mdi-18px mdi-instagram" href="#"></a></li>
					<li><a class="mdi mdi-18px mdi-twitter" href="#"></a></li>
					<li><a class="mdi mdi-18px mdi-whatsapp" href="#"></a></li>
				</ul>
				<ul id="footer-contact">
					<li><a class="mdi mdi-18px mdi-phone" href="tel:+234 805 503 4294">+234 805 503 4294</a></li>
					<li><a class="mdi mdi-18px mdi-email" href="mailto:info@clubandcountry.co">info@clubandcountry.co</a></li>
					<li><a class="mdi mdi-18px mdi-earth" href="#">No. 25 Tafewa Square, Abuja, Nigeria.</a></li>
				</ul>
			</div>
            <div class="credits">
				<p>&copy; Club and country, 2020. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <a href="#"><span class="mdi mdi-24px mdi-chevron-up back-to-top"></span></a>
</body>

</html>
