<?php
    $title = 'Portfolio || ';
    include './public/components/header.php';
    $get_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . explode('admin.', $_SERVER["HTTP_HOST"])[1];
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
                                            <div class="project">
                                                <img src="'.$get_url.$project['project_img_directory'].$project['project_cover_img'].'" alt="">
                                                <div class="caption">
                                                    <div class="caption-text">
                                                        <h4>'.$project_data['project_title'].'</h4>
                                                        <span id="tags" class="p5">'.$project['project_type'].'</span>
                                                    </div>
                                                    <div class="actions">
                                                        <a href="/portfolio/edit/'.$project['unique_id'].'" class="las la-pen edit"></a>
                                                        <a data-id="'.$project['unique_id'].'" class="las la-trash delete"></a>
                                                        <a href="/portfolio/case_study/'.$project['unique_id'].'#" class="las la-eye hide"></a>
                                                        <a href="/portfolio/case_study/'.$project['unique_id'].'" class="las la-angle-right view"></a>
                                                    </div>
                                                </div>
                                            </div>
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
                <div class="success-message pop-up">
                    <i class="las la-check"></i>
                    <p class="p5"></p>
                </div>
            </article>
        </div>
        <?php
            include './public/components/footer.php';
        ?>
    </body>

    </html>