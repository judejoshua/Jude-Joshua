<?php
    $title = 'Past work || ';
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
                    <h1>Past Work</h1>
                    <div id="liner"></div>
                    <p class="p4">
                        Here are some ideas that I have turned into end-user-ready products. You will see that these projects better display what stress-free user interaction and satisfaction is all about, with a rating of 4-5 stars.</p>
                </div>
                <!-- <div class="tags-row">
                    <span class="h5">Filter by:</span>
                    <div>
                        <span class="p5 secondary" id="tag-single" data-show="ui/ux">Design Case Studies</span>
                        <span class="p5 secondary" id="tag-single" data-show="web-dev">Web Development Projects</span>
                    </diV>
                </div> -->
            </header>
            <article id="body">
                <section id="case-study">
                    <div class="case-studies-body">
                        <div class="projects-holder">
                            <div class="row">
                                <?php
                                    foreach ($data['projectList'] as $key => $project) {
                                        $project_data = json_decode($project['project_data'], true);

                                        echo '
                                            <a href="/portfolio/case_study/'.$project['unique_id'].'">
                                                <div class="project">
                                                    <img src="'.$project['project_img_directory'].$project['project_cover_img'].'" alt="">
                                                    <div class="caption">
                                                        <div class="caption-text">
                                                            <h4>'.$project_data['project_title'].'</h4>
                                                            <span id="tags" class="paragraphsdescriptions">'.$project_data['project_tags'].'</span>
                                                        </div>
                                                        <i class="las la-arrow-right"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        ';
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="pagination">
                            <a href="" class="las la-angle-left"></a>
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