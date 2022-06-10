<?php include('server.php') ?>

<section id="support">
    <div class="support-hold">
        <h3>Explore</h3>
        <div class="support-hold-ul">
            <ul class="aleft">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About us</a></li>
                <li><a href="#">Write us a review</a></li>
                <li><a href="#">Terms and Conditions</a></li>
            </ul>
            <ul class="aleft">
                <li><a href="/home?pagelink=bid">Place Bid</a></li>
                <li><a href="/home?pagelink=sell">Auctions</a></li>
                <li><a href="/home?pagelink=refer">Referrals</a></li>
                <li><a href="/market?pagelink=all">All Categories</a></li>
            </ul>
            <ul class="aright">
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="contactsocialinks">
          <a class="mdi mdi-facebook" href="#"></a>
          <a class="mdi mdi-instagram" href="#"></a>
          <a class="mdi mdi-youtube" href="#"></a>
        </div>
    </div>
    <div class="support-hold">
        <h3>Get the latest Updates</h3>
        <div class="support-hold-ul">
            <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="newsletter" id="newsletter">
                <p>Subscribe to our weekly newsletter by entering your email below.<br>We don't send spam emails.</p>
                <input name="newsEmail" id="newsEmail" type="email" placeholder="Enter Your Email" size="20" minlength="5" maxlength="50" required>
                <div class="form-group error-hold fader" style="border-top: none; padding: 0px; display: initial;">
                    <p id="e-error"></p>
                    <p id="e-success"></p>
                </div>
                <div class="form-group">
                    <button type="submit" name="subscribe"><i class="mdi mdi-chevron-double-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</section>
<div class="container" id="copyright">
    <p>© Copyright 2020 | All rights reserved | Powered by Mite Systems</p>
</div>
