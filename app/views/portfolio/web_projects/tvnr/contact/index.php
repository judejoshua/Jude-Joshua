<?php include_once '../nav.php'?>
<header id="breadcrumb">
    <h1>Contact Us</h1>
    <p>Get in touch with us. We'd love to hear from you.</p>
</header>
<main id="contact">
    <section class="options-holder">
        <div class="options">
            <div class="options-top">
                <img src="/img/contact-options-image-1.svg" class="options-image">
                <p>
                    Tel: 1 (646) 688-2323<br/> Fax: 1 (929) 367-4827
                </p>
            </div>
        </div>
        <div class="options">
            <div class="options-top">
                <img src="/img/contact-options-image-2.svg" class="options-image">
                <p>
                    40 Worth Street, Suite 829<br/> New York, NY 10013
                </p>
            </div>
        </div>
        <div class="options">
            <div class="options-top">
                <img src="/img/contact-options-image-3.svg" class="options-image">
                <p>
                    Need assistance?<br/> Check out our Help Center.
                </p>
            </div>
        </div>
    </section>
    <section class="contact-form-holder">
        <div class="contactBanner">
            <div class="contactForm_text">
                <h1>Let us know<br/>How we can Help You</h1>
                <p>Please fill out the information requested on the form and our team will be in touch with you as soon as possible.</p>
            </div>
            <ul class="footer_social_icons">
                <li class="social_icon"><img src="/img/variant_social_icon.png" class="facebook"></li>
                <li class="social_icon"><img src="/img/variant_social_icon-1.png" class="facebook"></li>
                <li class="social_icon"><img src="/img/variant_social_icon-2.png" class="facebook"></li>
                <li class="social_icon"><img src="/img/variant_social_icon-3.png" class="facebook"></li>
                <li class="social_icon"><img src="/img/variant_social_icon-4.png" class="facebook"></li>
            </ul>
        </div>
        <div class="contact-form_ctA">
            <div class="form-input">
                <label for="">Subject (Required)</label>
                <select name="reason" id="reason">
                    <option disabled selected hidden>Reason for message</option>
                    <option value="Volunteer">Volunteer</option>
                    <option value="Donations">Donations</option>
                    <option value="Partnership">Partnership</option>
                    <option value="Medical Services">Medical Services</option>
                    <option value="Media Inquiries">Media Inquiries</option>
                    <option value="Sponsorship">Sponsorship</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <div class="form-input dual">
                <div class="dual-kit">
                    <label for="first-name">First Name (Required)</label>
                    <input type="text" placeholder="First Name" id="first-name">
                </div>
                <div class="dual-kit">
                    <label for="last-name">Last Name (Not Required)</label>
                    <input type="text" placeholder="Last Name" id="last-name">
                </div>
            </div>
            <div class="form-input">
                <label for="phone-number">Phone Number (Required)</label>
                <div class="countryCode-select">
                    <select name="countryCode" id="countryCode">
                        <option selected>+234</option>
                    </select>
                    <input type="tel" placeholder="Phone Number" id="phone-number">
                </div>
            </div>
            <div class="form-input">
                <label for="email">Email (Required)</label>
                <input type="email" placeholder="Email" id="email">
            </div>
            <div class="form-input">
                <label for="message">Message (Required)</label>
                <textarea placeholder="Message" id="message"></textarea>
            </div>
            <button type="button" class="ctaButton colored">Send Message</button>
        </div>
    </section>

    <?php include_once '../footer.php'?>
