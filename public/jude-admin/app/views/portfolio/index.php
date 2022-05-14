<?php
    $title = 'Portfolio || ';
    include './public/components/header.php';
?>
    </head>

    <body>
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
                                <?php
                                    foreach ($data['projectList'] as $key => $project) {
                                        $project_data = json_decode($project['project_data'], true);

                                        echo '
                                            <a href="/portfolio/case_study/'.$project['unique_id'].'">
                                                <div class="project">
                                                    <img src="http://jd.test'.$project['project_img_directory'].$project['project_cover_img'].'" alt="">
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