<?php
    $title = 'Jude Joshua | Top-notch mobile and web experience designer';
    $description = 'Get human-centred product designs that communicate your brand\'s business goals to your target audience.';
    $img = '/public/assets/img/landing-image.webp';

    include './public/components/header.php';
?>
    </head>

    <body id="home-landing">
        <div class="wrapper" id="top">
            <header class="landing d-flex d-flex-row flex-justify-center flex-align-center" id="home">
                <div class="header_cont d-flex d-flex-row flex-justify-between flex-align-center">
                    <div class="header">
                        <div class="header-text">
                            <p class="p4 hideme left">Hello. Minimalist.</p>
                            <h1 class="hideme right">I design <span id="highlight">intuitive</span> and <span id="highlight">user-friendly</span> <br/>experiences for <span id="highlight">small</span> and <br/><span id="highlight">medium-sized</span> businesses.</h1>
                        </div>
                        <a class="btn hideme left" href="#case-study">
                            <div class="btn_bg"></div>
                            <div class="btn_cont">
                                <p id="text"><span>See</span> how</p>
                                <i class="las la-arrow-down"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </header>
            <article id="body">
                <section id="case-study">
                    <div class="text-divider hideme left">
                        <h2>Featured work</h2>
                        <div id="liner"></div>
                    </div>
                    <div class="case-studies-body">
                        <div class="projects-holder">
                            <div class="row">
                                <?php
                                    $count = 0;
                                    $columnLimit = 2;
                                    $columns = array_fill(0, $columnLimit, []);
                                    foreach ($data['projectList'] as $key => $project)
                                    {
                                        $count++;
                                        $columns[$key % $columnLimit][] = $project;
                                        if($count > 6){
                                            break;
                                        }
                                    }

                                    foreach ($columns as $column)
                                    {
                                        echo '
                                            <div class="flexer">';

                                            foreach ($column as $project)
                                            {
                                                $project_data = json_decode($project['project_data'], true);
                                                
                                                if($project['project_type'] == 'UI/UX design'){
                                                    $show = 'case study';
                                                }else{
                                                    $show = 'design process';
                                                }

                                                echo '
                                                    <a id="projector" class="projector hideme" href="/portfolio/case_study/'.$project['unique_id'].'">
                                                        <div class="project">
                                                            <img class="projector-image lazy-image" loading="lazy" src="'.$project['project_img_directory'].$project['project_cover_img'].'" alt="'.$project_data['project_title'].'">
                                                            <div class="caption">
                                                                <div class="caption-text">
                                                                    <div class="d-flex d-flex-row flex-justify-between flex-align-start">
                                                                        <div class="before-year">
                                                                            <h5 class="p4">'.$project_data['project_title'].'</h5>
                                                                            <span id="tags" class="p5">'.$project['project_type'].'</span>
                                                                        </div>
                                                                        <span class="p5 year">'.explode(' ', $project['project_year'])[1].'</span>
                                                                    </div>
                                                                    <div class="d-flex d-flex-row flex-justify-between flex-align-start">
                                                                        <span class="p5 view">View '.$show.'</span>
                                                                        <i class="las la-arrow-right"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                ';
                                            }
                                            echo '
                                            </div>
                                        ';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <a class="btn lng hideme left" href="/portfolio">
                        <div class="btn_bg"></div>
                        <div class="btn_cont">
                            <p id="text"><span>See</span> more case-studies</p>
                            <i class="las la-arrow-right"></i>
                        </div>
                    </a>
                </section>
                <section id="design-section">
                    <div class="design-style">
                        <div class="col-100-shift d-flex d-flex-row flex-justify-between flex-align-center">
                            <div class="text-divider hideme left">
                                <div class="designer-caption d-flex d-flex-column">
                                    <p class="p4">Human. First.</p>
                                    <h2 class="h1">I turn <span id="highlight">great</span> ideas into excellent <span id="highlight">user-centered</span> solutions.</h2>
                                </div>
                            </div>
                            <div class="design-style-image hideme right">
                                <img src="/public/assets/img/style-gif.webp" loading="lazy" alt="picture showing a sketchbook and a pen laying on the table">
                            </div>
                        </div>
                        <div class="deliverables">
                            <div class="row d-flex d-flex-column">
                                <div class="deliverables-list d-flex d-flex-row">
                                    <span class="p1">HTML</span>
                                    <span class="p1">Human-centered</span>
                                    <span class="p1">CSS</span>
                                    <span class="p1">Accessible</span>
                                    <span class="p1">Empathy</span>
                                    <span class="p1">Understand</span>
                                    <span class="p1">Ideas</span>
                                    <span class="p1">Implement</span>
                                </div>
                                <div class="deliverables-list d-flex d-flex-row">
                                    <span class="p1">Analyse</span>
                                    <span class="p1">Needs</span>
                                    <span class="p1">Attention</span>
                                    <span class="p1">Prototype</span>
                                    <span class="p1">Wireframes</span>
                                    <span class="p1">Sketch</span>
                                    <span class="p1">Business</span>
                                    <span class="p1">Objectives</span>
                                </div>
                                <div class="deliverables-list d-flex d-flex-row">
                                    <span class="p1">Satisfy</span>
                                    <span class="p1">Concepts</span>
                                    <span class="p1">Experience</span>
                                    <span class="p1">User</span>
                                    <span class="p1">Testing</span>
                                    <span class="p1">Feedback</span>
                                    <span class="p1">Goals</span>
                                    <span class="p1">Details</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="why">
                    <div class="col-100 why-boxed">
                        <!-- <div class="mobile-img-why-me"></div> -->
                        <div class="text-divider hideme left">
                            <h2>A good fit?</h2>
                            <div id="liner"></div>
                            <p class="p4">
                                In my work, I strive to bring businesses closer to their target audiences by providing clear, readable and beautiful designs. <br/><br/>My focus is on end-to-end product design that combines my passion for design with a desire to improve user experiences &mdash; through providing product design strategy, component-based design systems, user research, market/competition analysis, interaction design, sketches, visual design, digital prototypes, and mockups. <br/><br/>This enables me to carefully communicate the business goals to the users in a language they understand.
                            </p>
                        </div>
                        <a class="btn four hideme left" href="/cv">
                            <div class="btn_bg"></div>
                            <div class="btn_cont">
                                <p id="text"><span>View</span> my CV</p>
                                <i class="las la-arrow-right"></i>
                            </div>
                        </a>
                        <div class="img-why-me hideme right"></div>
                    </div>
                </section>
            </article>
        </div>
        <?php
            include './public/components/footer.php';
        ?>
    </body>

    </html>
