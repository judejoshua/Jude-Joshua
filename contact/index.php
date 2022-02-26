<?php
    $title = '';
    include '../components/header.php';
?>
    </head>

    <body>
        <div class="preloader">
            <h1>JUDE JOSHUA</h1>
            <div class="loader-circles">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="wrapper" id="top">
            <header class="landing" id="home">
                <div class="text-divider">
                    <h1>Send me a Message</h1>
                    <div id="liner"></div>
                    <p class="p4">If you have any questions or messages, you could send an email to <a href="mailto:hello@judejoshua.me">hello@judejoshua.me</a> or call me on <a href="tel:+2349041134407">+234-904-113-4926</a>. Maybe you want to type your message down,
                        just fill the form below, and I will get back to you within 24 hours of receipt.</p>
                </div>
            </header>
            <article id="body">
                <form>
                    <div class="form-body">
                        <div class="form-group">
                            <label for="name" id="to-title" class="h4">Name*</label>
                            <div class="input-group">
                                <div class="input-field">
                                    <input type="text" id="name" name="name" class="form-input p4" />
                                    <div class="labels">
                                        <p class="p5 placeholder">Enter your name</p>
                                        <p class="p4 error"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group dual">
                            <div class="form-group">
                                <label for="email" id="to-title" class="h4">Email*</label>
                                <div class="input-group">
                                    <div class="input-field">
                                        <input type="text" id="email" name="email" class="form-input p4" />
                                        <div class="labels">
                                            <p class="p5 placeholder">Enter your email</p>
                                            <p class="p4 error"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" id="to-title" class="h4">Phone Number*</label>
                                <div class="input-group">
                                    <div class="input-field">
                                        <input type="text" id="phone" name="phone" class="form-input p4" />
                                        <div class="labels">
                                            <p class="p5 placeholder">Enter your phone number</p>
                                            <p class="p4 error"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" id="to-title" class="h4">Message*</label>
                            <div class="input-group">
                                <div class="input-field">
                                    <textarea type="text" id="message" name="message" class="form-input p4 form-area"></textarea>
                                    <div class="labels">
                                        <p class="p5 placeholder">What do you want to say?</p>
                                        <p class="p4 error"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"></div>
                        <!-- <div class="form-group"></div>
                        <div class="form-group dual"></div> -->
                    </div>
                    <button class="btn" type="submit">
                        <div class="btn_bg"></div>
                        <div class="btn_cont">
                            <p id="text"><span>Send</span> now</p>
                            <i class="mdi mdi-arrow-right"></i>
                        </div>
                    </button>
                </form>
            </article>
        </div>
        <div class="success-message pop-up hidden">
            <i class="mdi mdi-check"></i>
            <p class="p4">Your form message was sent successfullly. Please expect my response in the next few minutes.</p>
        </div>

        <?php
            include '../components/footer.php';
        ?>
    </body>

    </html>