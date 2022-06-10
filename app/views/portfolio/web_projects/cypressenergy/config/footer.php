<?php include('server.php') ?>

<section id="contact">
    <div class="contactform">
        <h1>Contact Us</h1>
        <form id="contact-form" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="contact-form">
            <h2>Please fill the form below, we'll get back to you within 24 hours.</h2>
            <div class="form-group">
                <input id="name" placeholder="Your name" name="name" type="text" size="20" minlength="5" maxlength="50" required>
            </div>
            <div class="form-group">
                <input id="email" placeholder="Your email" name="email" type="email" size="20" minlength="5" maxlength="50" required>
            </div>
            <div class="form-group">
                <input id="phone" placeholder="Your phone" name="phone" type="tel" size="20" minlength="5" maxlength="20" required>
            </div>
            <div class="form-group">
                <textarea id="message" name="message" placeholder="Your message (100 - 500 characters)" rows="4" minlength="100" maxlength="500" required></textarea>
            </div>
            <div class="form-group error-hold fader" style="border-top: none; padding: 0px;">
                <p id="error"></p>
                <p id="success"></p>
            </div>
            <div class="form-group">
                <button type="reset">Clear</button>
                <button type="submit" name="contact-submit" id="contact-submit">Send</button>
            </div>
        </form>
    </div>
    <div class="contactinfo">
        <h2>Contact Information</h2>
        <ul>
            <li><i class="mdi mdi-phone-classic"></i><span>Phone</span><br><a href="tel:<?php echo $tel ?>"><?php echo $tel ?></a></li>
            <li><i class="mdi mdi-email-outline"></i><span>Email</span><br><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></li>
            <li><i class="mdi mdi-map-marker"></i><span>Location</span><br><?php echo $loc ?>, <?php echo $city ?>, <?php echo $state ?>, <?php echo $country ?></li>
        </ul>
    </div>
</section>
<section id="support">
    <div class="support-hold">
        <h3>Explore</h3>
        <div class="support-hold-ul">
            <ul class="aleft">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About us</a></li>
                <li><a href="#services">Our Services</a></li>
                <li><a href="#products">Our Products</a></li>
            </ul>
            <ul class="aleft">
                <li><a href="#gallery">Our Projects</a></li>
                <li><a href="#contact">Contact Us</a></li>
                <li><a href="#features">Success Story</a></li>
                <li><a href="#" id="requester3">Request Our Services</a></li>
            </ul>
            <ul class="aright">
                <li><a href="#">Write us a review</a></li>
                <li><a href="#">Terms and Conditions</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="contactsocialinks">
          <a class="mdi mdi-facebook" href="#"></a>
          <a class="mdi mdi-instagram" href="#"></a>
        </div>
    </div>
    <div class="support-hold">
        <h3>Get the latest Updates</h3>
        <div class="support-hold-ul">
            <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="newsletter" id="newsletter">
                <p>Subscribe to our weekly newsletter by entering your email below.<br>We don't send spam emails.</p>
                <input name="newsEmail" id="newsEmail" type="email" placeholder="Enter Your Email" size="20" minlength="5" maxlength="50" required>
                <div class="form-group error-hold fader" style="border-top: none; padding: 0px;">
                    <p id="e-error"></p>
                    <p id="e-success"></p>
                </div>
                <div class="form-group">
                    <h4>Subscribe</h4>
                    <button type="submit" name="subscribe"><i class="mdi mdi-arrow-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</section>
<div class="container" id="copyright">
    <p>© Copyright 2020 | All rights reserved | Powered by Mite Systems</p>
</div>
