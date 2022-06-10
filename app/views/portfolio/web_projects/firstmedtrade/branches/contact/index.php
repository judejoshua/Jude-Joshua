<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Firstmedtrade Africa">
        <meta name="description" content="First Medtrade Africa is an online marketplace for the promotion of medical tourism, sales and distribution of medical services, equipment, disposables and pharmaceutical products. We are here to consistently deliver quality medical supplies and services of the latest technology to Africa, with the sole purpose of improving the quality of healthcare.">
        <meta name="format-detection" content="telephone=no">
        <meta name="keywords" content="">

        <title>demo.firstmedtradeafrica.com</title>
        
        <link rel="icon" href="/config/assets/images/logo-mini.png"/>
        <link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/fmain.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/fmedia.css" />
        <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.5.95/css/materialdesignicons.min.css">
    </head>
    <body>
        <div id="mobile_navlinks">
            <div class="links">
                <a href="/">Home</a>
                <a href="/search/doctors/">Find Doctors</a>
                <a href="/search/hospitals/">Find Hospitals</a>
                <a href="#" class="nav_active">Contact us</a>
                <a href="/branches/login/" id="userlinks">Login</a>
                <a href="/branches/registration/" id="userlinks">Register</a>
                <div class="home_social">
                    <a href="https://web.facebook.com/FirstMedtradeAfrica/?modal=admin_todo_tour" target="_blank"><i class="mdi mdi-facebook"></i></a>
                    <a href="https://www.linkedin.com/company/first-medtrade-africa/" target="_blank"><i class="mdi mdi-linkedin"></i></a>
                    <a href="https://www.instagram.com/firstmedtrade/" target="_blank"><i class="mdi mdi-instagram"></i></a>
                    <a href="mailto:info@firstmedtradeafrica.com"><i class="mdi mdi-email"></i></a>
                    <a id="ussd" href="tel:*190#">*190#</a>
                </div>
            </div>
        </div>
        <div class="divWrap">
            <div class="container" id="fcontacthome">
                <div class="navigation">
                    <div class="nav">
                        <div id="logo_class">
                            <div class="block"></div>
                            <div class="img">
                                <img src="/config/assets/images/logo-full.png"/>
                            </div>
                        </div>
                        <?php include('../../config/nav.php');?>
                        <div id="mobile_links_class">
                            <div class="links-bar">
                                <div class="bar1"></div>
                                <div class="bar2"></div>
                                <div class="bar3"></div>
                            </div>
                        </div>
                    </div>
                </div>        
                <div id="homecontent">
                    <div class="item">
                        <div class="fill">
                            <h1>Contact Us</h1>
                            <div class="nav-pagination">
                                <a href="/">Home</a><span>/</span><a href="#" id="active">Contact us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" id="fcontactbody">
                <section id="contact_action">
                    <div class="fillers">
                        <div class="circle" id="big"></div>
                        <div class="circle" id="medium"></div>
                        <div class="circle" id="small"></div>
                        <div class="circle" id="right"></div>
                    </div>
                    <div class="contactform">
                        <h2>Please fill the form below, we'll get back to you within 24 hours.</h2>
                        <form name="contact" method="POST" action="">
                            <div class="form-group">
                                <label for="name">Name * </label><br>
                                <input placeholder="Your name" size="50" minlength="10" maxlength="45" type="text" name="name" required="">
                            </div>
                            <div class="form-group">
                                <label for="email">Email * </label><br>
                                <input placeholder="Your email" size="50" minlength="10" maxlength="45" type="email" name="email" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Your Message * </label><br>
                                <textarea placeholder="Message" size="150" minlength="10" maxlength="150" rows="6" name="message" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <button type="reset">Clear</button>
                                <button type="submit" name="contact">Send<i class="mdi mdi-send"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="contactinfo">
                        <h2>Contact Information</h2>
                        <ul>
                            <li><i class="mdi mdi-phone-classic"></i><span>Phone</span><br><a href="tel:+234 701 236 7770">+234 701 236 7770</a></li>
                            <li><i class="mdi mdi-email-outline"></i><span>Email</span><br><a href="mailto:info@firstmedtradeafrica.com">info@firstmedtradeafrica.com</a></li>
                            <li><i class="mdi mdi-map-marker"></i><span>Address</span><br><a>No. 1D Club road, Ikoyi, Lagos, Nigeria.</a></li>
                        </ul>
                    </div>
                </section>
            </div>
            <div class="container" id="footer">
                <div class="fillers">
                    <div class="circle" id="big"></div>
                    <div class="circle" id="medium"></div>
                    <div class="circle" id="small"></div>
                    <div class="circle" id="left"></div>
                    <div class="circle" id="right"></div>
                </div>
                <h3>Explore</h3>
                <ul class="footer_left">
                    <div class="footer_left_top">
                        <ul class="aleft">
                            <li><a href="/">Home</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="/branches/login/">Login</a></li>
                            <li><a href="/branches/registration/">Register</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Policy</a></li>
                            <li><a href="#">Terms and conditions</a></li>
                        </ul>
                        <ul class="aleft">
                            <li><span>Patients</span></li>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Chat with a physician</a></li>
                            <li><a href="#">Book an appointment</a></li>
                            <li><a href="#">Make a referral</a></li>
                        </ul>
                        <ul class="aleft">
                            <li><span>Doctors</span></li>
                            <li><a href="#">Set schedule</a></li>
                            <li><a href="#">Check appointment</a></li>
                            <li><a href="#">Update profile</a></li>
                        </ul>
                        <ul class="aleft">
                            <li><span>Hospitals</span></li>
                            <li><a href="#">Check patient's referrals</a></li>
                            <li><a href="#">Update profile</a></li>
                        </ul>
                        <ul class="aleft">
                            <li><span>Email:</span><a href="mailto:info@firstmedtradeafrica.com">info@firstmedtradeafrica.com</a></li>
                            <li><span>Address:</span><a>No. 1D Club road, Ikoyi, Lagos, Nigeria.</a></li>
                            <li><span>Phone:</span><a href="tel:+234 701 236 7770">+234 701 236 7770</a></li>
                            <li>
                                <a href="https://web.facebook.com/FirstMedtradeAfrica/?modal=admin_todo_tour" target="_blank"><i class="mdi mdi-facebook"></i></a>
                                <a href="https://www.linkedin.com/company/first-medtrade-africa/" target="_blank"><i class="mdi mdi-linkedin"></i></a>
                                <a href="https://www.instagram.com/firstmedtrade/" target="_blank"><i class="mdi mdi-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="apayment">
                        <div></div>
                        <img src="/config/assets/images/paystack-accepted-payments.png"/>
                    </div>
                </ul>
            </div>
            <div class="container" id="copyright">
                <p>Copyright &copy; 2019 Firstmedtrade.com. All rights reserved.</p>
            </div>
            <a href="#fcontacthome" class="to-top">
                <i class="mdi mdi-chevron-up"></i>   
                <p>TOP</p>
            </a>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="/config/assets/js/flanding.js"></script>
        <script src="/config/assets/js/bootstrap.min.js"></script>
        <script>
            $('.clientslider.carousel').carousel({
                interval: 7500,
            })
        </script>

    </body>
</html>