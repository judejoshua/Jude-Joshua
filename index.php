<?php
    $title = '';
    include './components/header.php';
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
                <div class="bg-play">
                    <div class="shade"></div>
                </div>
                <div class="header_cont">
                    <div class="header">
                        <div class="header-text">
                            <h1>Using creativity and passion to create a better world.</h1>
                            <p class="p4">I am Jude Joshua, a product designer, with background in web design & development from Nigeria 🇳🇬.<br>I seek to fuse writing with design in a way that will create new patterns and lifestyles through digital systems in the
                                simplest way possible.</p>
                        </div>
                        <div class="header-cta">
                            <a class="btn" href="#body">
                                <div class="btn_bg"></div>
                                <div class="btn_cont">
                                    <p id="text"><span>See</span> more</p>
                                    <i class="mdi mdi-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="landing-image"><img src="/assets/img/landing-img.png" alt="logo"></div>
                </div>
                <div class="scroll-down">
                    <div class="mouse">
                        <div id="arrow-tail-short"></div>
                    </div>
                    <div id="arrow-tail-long"></div>
                </div>
            </header>
            <article id="body">
                <section id="case-study">
                    <div class="case-studies-body">
                        <div class="text-divider">
                            <h2>Digital Patterns that I have built...</h2>
                            <div id="liner"></div>
                            <p class="p4">As easy as building patterns may sound, they are actually, not easy to build; because a lot of users are already used to a particular way of life. Despite, what always pushes through is how much of a solution, a digital platform
                                has to offer to your user. And this is what I have done; spent years building and learning how to design what works and what gives them satisfaction. Here are a few awesome samples.</p>
                        </div>
                        <div class="projects-holder">
                            <div class="row">
                                <a href="#">
                                    <div class="project">
                                        <img src="/assets/img/project-image.png" alt="">
                                        <div class="caption">
                                            <div class="caption-text">
                                                <h3>Online men’s clothing store</h3>
                                                <span id="tags" class="p4">UI/UX, Web Design, Branding</span>
                                            </div>
                                            <i class="mdi mdi-arrow-top-right"></i>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="project">
                                        <img src="/assets/img/project-image-1.png" alt="">
                                        <div class="caption">
                                            <div class="caption-text">
                                                <h3>App design for music player</h3>
                                                <span id="tags" class="p4">UI/UX, Prototyping</span>
                                            </div>
                                            <i class="mdi mdi-arrow-top-right"></i>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="project">
                                        <img src="/assets/img/project-image-2.png" alt="">
                                        <div class="caption">
                                            <div class="caption-text">
                                                <h3>App design for messaging platform</h3>
                                                <span id="tags" class="p4">UI/UX, Prototyping</span>
                                            </div>
                                            <i class="mdi mdi-arrow-top-right"></i>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="project">
                                        <img src="/assets/img/project-image-3.png" alt="">
                                        <div class="caption">
                                            <div class="caption-text">
                                                <h3>App design for online checkout</h3>
                                                <span id="tags" class="p4">UI/UX, Prototyping</span>
                                            </div>
                                            <i class="mdi mdi-arrow-top-right"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a class="btn mdn" href="#body">
                        <div class="btn_bg"></div>
                        <div class="btn_cont">
                            <p id="text"><span>See</span> more work</p>
                            <i class="mdi mdi-arrow-right"></i>
                        </div>
                    </a>
                </section>
            </article>
        </div>
        <?php
            include './components/footer.php';
        ?>
    </body>

    </html>