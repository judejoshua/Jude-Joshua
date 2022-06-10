<div class="container" id="contact">
    <div class="contactform">
        <h1>Contact Us</h1>
        <form id="contact-form" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="contact-form">
            <h2>Please fill the form below, we'll get back to you within 24 hours. All fields are compulsory.</h2>
            <div class="form-group">
                <input id="name" placeholder="Your name" name="name" type="text" required>
            </div>
            <div class="form-group">
                <input id="email" placeholder="Your email" name="email" type="email" required>
            </div>
            <div class="form-group">
                <input id="phone" placeholder="Your phone" name="phone" type="tel" required>
            </div>
            <div class="form-group">
                <textarea id="message" name="message" placeholder="Your message (100 - 500 characters)" rows="4" minlength="100" maxlength="500" required></textarea>
            </div>
            <div class="form-group error-hold" style="padding: 0px;">
                <?php include('./config/errors.php'); ?>
                <?php include('./config/success.php'); ?>
            </div>
            <div class="form-group">
                <button type="reset">Clear</button>
                <button type="submit" name="contact-submit" id="contact-submit">Send</button>
            </div>
        </form>
    </div>
</div>
<div class="container" id="support">
    <ul>
        <h3>Connect with us</h3>
        <div class="contactsocialinks">
            <a class="mdi mdi-facebook" href="#"></a>
            <a class="mdi mdi-instagram" href="#"></a>
            <a class="mdi mdi-twitter" href="#"></a>
			<a class="mdi mdi-youtube" href="#"></a>
			<a class="mdi mdi-linkedin" href="#"></a>
        </div>
		<div class="aleft full">
			<li><a href="mailto: <?php echo $email ?>"><?php echo $email ?></a></li>
			<li><a href="tel: <?php echo $tel ?>"><?php echo $tel ?></a></li>
			<li><?php echo $loc.', '.$city.', '.$state.', '.$country ?></li>
		</div>
    </ul>
    <ul>
        <h3>Explore</h3>
        <div class="aleft">
            <li><a href="#home">Home</a></li>
            <li><a href="#two">About us</a></li>
            <li><a href="#services">Services</a></li>
        </div>
		<div class="aleft">
			<li><a href="https://ubyjude.bitbucket.io/clinic_mgt/branches/portal/staff/">Staff Portal</a></li>
			<li><a href="#">Privacy Policy</a></li>
			<li><a href="#">Terms of use</a></li>
		</div>
        <div class="aright">
			<li><a href="#doctors">Doctors</a></li>
			<li><a href="#contact">Contact Us</a></li>
        </div>
    </ul>
</div>
<div class="container" id="copyright">
    <p>&copy; Copyright <a href="https://instagram.com/official_uby">Mite designs</a>, 2019. All rights reserved.</p>
</div>
