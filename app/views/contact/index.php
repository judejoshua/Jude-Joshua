<?php
    $title = 'Send a message | Jude Joshua';
    $description = 'Get human-centred product designs that communicate your brand\'s business goals to your target audience.';
    $img = '/public/assets/img/landing-image.webp';
    
    include './public/components/header.php';
?>
    </head>

    <body id="contact">
        <div class="wrapper" id="top">
            <header class="landing" id="home">
                <div class="text-divider">
                    <h1>Let's Talk!</h1>
                    <div id="liner"></div>
                </div>
            </header>
            <article id="body">
                <div class="contact-info">
                    <p class="p4">
                        Let's talk about your project or any other questions that you have. You can quickly fill the form and I will respond as soon as possible. Otherwise send me an <a href="mailto:hello@judejoshua.me">email</a> or <a href="tel:+2349041134926">call</a> me.
                    </p>
                </div>
                <form>
                    <div class="form-body">
                        <div class="form-group">
                            <label for="name" id="to-title" class="h4">Name*</label>
                            <div class="input-group">
                                <div class="input-field">
                                    <input type="text" id="name" name="name" class="form-input p4" maxlength="40" placeholder="E.g. Joe Depp"/>
                                    <div class="labels">
                                        <p class="p5 placeholder">Enter your name (Required)</p>
                                        <p class="p5 error" data-error="name"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group dual">
                            <div class="form-group">
                                <label for="email" id="to-title" class="h4">Email*</label>
                                <div class="input-group">
                                    <div class="input-field">
                                        <input type="text" id="email" name="email" class="form-input p4" maxlength="60" placeholder="E.g. example@email.com"/>
                                        <div class="labels">
                                            <p class="p5 placeholder">Enter your email (Required)</p>
                                            <p class="p5 error" data-error="email"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="name" id="to-title" class="h4">Phone Number</label>
                                <div class="input-group">
                                    <div class="input-field">
                                        <input type="tel" id="phone" name="phone" class="form-input p4" maxlength="15"/>
                                        <div class="labels">
                                            <p class="p5 placeholder">Enter your phone number (Optional)</p>
                                            <p class="p5 error"></p>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="form-group">
                            <label for="message" id="to-title" class="h4">Details*</label>
                            <div class="input-group">
                                <div class="input-field">
                                    <textarea type="text" id="message" name="message" class="form-input p4 form-area" maxlength="900" placeholder="E.g. I need a design for..."></textarea>
                                    <div class="labels">
                                        <p class="p5 placeholder">Tell me about your project (Required)</p>
                                        <p class="p5 error" data-error="message"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"></div>
                    </div>
                    <button class="btn four mdn" type="submit">
                        <div class="btn_bg"></div>
                        <div class="btn_cont">
                            <p id="text"><span>Send</span> message</p>
                            <i class="las la-arrow-right"></i>
                        </div>
                    </button>
                </form>
            </article>
        </div>
        <div class="success-message pop-up">
            <i class="las la-check"></i>
            <p class="p5">Your form message was sent successfullly. Please expect my response in the next few minutes.</p>
        </div>
        <?php
            include './public/components/footer.php';
        ?>
    </body>

    </html>