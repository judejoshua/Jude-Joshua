<?php
    $title = 'Send a message || ';
    include './components/header.php';
?>
    </head>

    <body id="contact">
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
                    <h1>Tell me a Story</h1>
                    <div id="liner"></div>
                    <!-- 
                    <p class="p4"></p> -->
                </div>
            </header>
            <article id="body">
                <div class="contact-info">
                    <p class="p4">Tell me a story of your project through messages or questions. Send me an email at
                        <a href="mailto:hello@judejoshua.me">hello@judejoshua.me</a> or call
                        <a href="tel:+2349041134926">+234-904-113-4926.</a><br/>However, you can quickly fill the spaces below and I will respond within 24hours of delivery.
                    </p>
                    <!-- <ul>
                        <li>
                            <a href="#" class="p4">
                                <span class="las la-18px mdi-email"></span>hello@judejoshua.me</a>
                        </li>
                        <li>
                            <a href="#" class="p4">
                                <span class="las la-18px mdi-phone"></span>+234-904-113-4926</a>
                        </li>
                    </ul> -->
                </div>
                <form>
                    <div class="form-body">
                        <div class="form-group">
                            <label for="name" id="to-title" class="h4">Name*</label>
                            <div class="input-group">
                                <div class="input-field">
                                    <input type="text" id="name" name="name" class="form-input p4" maxlength="40" />
                                    <div class="labels">
                                        <p class="p5 placeholder">Enter your name (required)</p>
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
                                        <input type="text" id="email" name="email" class="form-input p4" maxlength="30" />
                                        <div class="labels">
                                            <p class="p5 placeholder">Enter your email (required)</p>
                                            <p class="p5 error" data-error="email"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="name" id="to-title" class="h4">Phone Number</label>
                                <div class="input-group">
                                    <div class="input-field">
                                        <input type="text" id="phone" name="phone" class="form-input p4" />
                                        <div class="labels">
                                            <p class="p5 placeholder">Enter your phone number(optional)</p>
                                            <p class="p5 error"></p>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="form-group">
                            <label for="message" id="to-title" class="h4">Message*</label>
                            <div class="input-group">
                                <div class="input-field">
                                    <textarea type="text" id="message" name="message" class="form-input p4 form-area" maxlength="900"></textarea>
                                    <div class="labels">
                                        <p class="p5 placeholder">What do you want to say? (required)</p>
                                        <p class="p5 error" data-error="message"></p>
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
            include './components/footer.php';
        ?>
    </body>

    </html>