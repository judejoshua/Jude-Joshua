<?php
    $title = 'Portfolio || ';
    include './public/components/header.php';
?>
    </head>

    <body>
        <div class="preloader">
            <p class="h1">JUDE JOSHUA</p>
            <div class="loader-circles">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="wrapper" id="top">
            <header class="landing" id="home">
                <div class="text-divider">
                    <h1>Portfolio</h1>
                    <div id="liner"></div>
                    <p class="p4">
                        Here is a list of projects that have been added to the system. To add a new project use the button below.
                    </p>
                </div>
                <div class="tags-row">
                    <div>
                        <a href="/portfolio/add" class="p5 secondary" id="tag-single" data-show="ui/ux">Add a new project</a>
                    </diV>
                </div>
            </header>
            <article id="body">
                <section id="case-study">
                    <div class="case-studies-body">
                        <div class="projects-holder">
                            <div class="row">
                                <a href="/portfolio/case_study">
                                    <div class="project">
                                        <img src="/public/includes/assets/img/project-image.png" alt="">
                                        <div class="caption">
                                            <div class="caption-text">
                                                <h3>Online men’s clothing store</h3>
                                                <span id="tags" class="p4">UI/UX, Web Design, Branding</span>
                                            </div>
                                            <i class="las la-arrow-right"></i>
                                        </div>
                                    </div>
                                </a>
                                <a href="/portfolio/case_study">
                                    <div class="project">
                                        <img src="/public/includes/assets/img/project-image-1.png" alt="">
                                        <div class="caption">
                                            <div class="caption-text">
                                                <h3>App design for music player</h3>
                                                <span id="tags" class="p4">UI/UX, Prototyping</span>
                                            </div>
                                            <i class="las la-arrow-right"></i>
                                        </div>
                                    </div>
                                </a>
                                <a href="/portfolio/case_study">
                                    <div class="project">
                                        <img src="/public/includes/assets/img/project-image-2.png" alt="">
                                        <div class="caption">
                                            <div class="caption-text">
                                                <h3>App design for messaging platform</h3>
                                                <span id="tags" class="p4">UI/UX, Prototyping</span>
                                            </div>
                                            <i class="las la-arrow-right"></i>
                                        </div>
                                    </div>
                                </a>
                                <a href="/portfolio/case_study">
                                    <div class="project">
                                        <img src="/public/includes/assets/img/project-image-3.png" alt="">
                                        <div class="caption">
                                            <div class="caption-text">
                                                <h3>App design for online checkout</h3>
                                                <span id="tags" class="p4">UI/UX, Prototyping</span>
                                            </div>
                                            <i class="las la-arrow-right"></i>
                                        </div>
                                    </div>
                                </a>
                                <a href="/portfolio/case_study">
                                    <div class="project">
                                        <img src="/public/includes/assets/img/project-image.png" alt="">
                                        <div class="caption">
                                            <div class="caption-text">
                                                <h3>Online men’s clothing store</h3>
                                                <span id="tags" class="p4">UI/UX, Web Design, Branding</span>
                                            </div>
                                            <i class="las la-arrow-right"></i>
                                        </div>
                                    </div>
                                </a>
                                <a href="/portfolio/case_study">
                                    <div class="project">
                                        <img src="/public/includes/assets/img/project-image-1.png" alt="">
                                        <div class="caption">
                                            <div class="caption-text">
                                                <h3>App design for music player</h3>
                                                <span id="tags" class="p4">UI/UX, Prototyping</span>
                                            </div>
                                            <i class="las la-arrow-right"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="pagination">
                            <a href="" class="las la-angle-left mdi-dark-inactive"></a>
                            <a href="" class="las la-angle-right active"></a>
                        </div>
                    </div>
                </section>
            </article>
        </div>
        <?php
            include './public/components/footer.php';
        ?>
    </body>

    </html>