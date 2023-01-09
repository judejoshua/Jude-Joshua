<?php
    $title = 'Jude Joshua &#8212; Top Product Designer for Businesses and Brands';
    $description = 'Get user-centred designs for your website or app that communicate your brand\'s business goals to your target audience.';
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
                            <p class="p4">Hello. Minimalist.</p>
                            <h1 class="">I help <span id="highlight">businesses</span> and <span id="highlight">brands</span> connect with their <span id="highlight">target</span> users using <span id="highlight">product</span> design.</h1>
                        </div>
                        <a class="btn" href="#balance">
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
                <section id="balance">
                    <div class="text-divider hideme left">
                        <h2>A <span id="highlight">journey</span> from Idea to Solution.</h2>
                    </div>
                    <div class="balance-holder d-flex d-flex-column flex-justify-between flex-align-stretch">
                        <div class="d-flex d-flex-row cap">
                            <h3 class="hideme left">01</h3>
                            <div class="designer-caption d-flex d-flex-column">
                                <h3 class="hideme right">Understand the Goal</h3>
                                <div class="divisor"></div>
                                <p class="p4 hideme right">
                                    My job is to ensure the business makes money with their digital product. As a first step, I analyze in details the business' goals and objectives, industry standards and market requirements.
                                </p>
                            </div>
                        </div>
                        <div class="d-flex d-flex-row cap">
                            <h3 class="hideme left ">02</h3>
                            <div class="designer-caption d-flex d-flex-column">
                                <h3 class="hideme right">Feel the Users</h3>
                                <div class="divisor"></div>
                                <p class="p4 hideme right">
                                    My next goal is to understand the target audience better and I do this through surveys and interviews. By understanding the users' needs and pain points, I can carefully map each pain point with a supporting business objective.
                                </p>
                            </div>
                        </div>
                        <div class="d-flex d-flex-row cap">
                            <h3 class="hideme left">03</h3>
                            <div class="designer-caption d-flex d-flex-column">
                                <h3 class="hideme right">Develop Solutions</h3>
                                <div class="divisor"></div>
                                <p class="p4 hideme right">
                                    My final step is to develop possible solutions that balance both the business and user needs without overlapping. At the end of the day, the most balanced solution wins.
                                </p>
                            </div>
                        </div>
                    </div>
                    <a class="btn lng hideme left" href="#case-study-section">
                        <div class="btn_bg"></div>
                        <div class="btn_cont">
                            <p id="text"><span>See</span> Featured Samples</p>
                            <i class="las la-arrow-down"></i>
                        </div>
                    </a>
                </section>
                <section id="case-study-section">
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
                        <div class="col-100-shift d-flex d-flex-row flex-justify-between">
                            <div class="d-flex d-flex-column cap">
                                <div class="text-divider">
                                    <div class="designer-caption d-flex d-flex-column">
                                        <p class="p4 hideme left">The Human Goal.</p>
                                        <h2 class="h1 hideme left">I turn <span id="highlight">great</span> ideas into excellent <span id="highlight">user-centered</span> solutions.</h2>
                                    </div>
                                </div>
                                <a class="btn mdn hideme left case-study-link" href="/contact">
                                    <div class="btn_bg"></div>
                                    <div class="btn_cont">
                                        <p id="text"><span>Disc</span>uss a project</p>
                                        <i class="las la-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="design-style-image hideme right">
                                <img src="/public/assets/img/the-human-goal-2.webp" alt="picture showing a sketchbook and a pen laying on the table">
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
                                    <span class="p1">UX Design</span>
                                    <span class="p1">Prototype</span>
                                    <span class="p1">Wireframes</span>
                                    <span class="p1">Business</span>
                                    <span class="p1">Sketch</span>
                                    <span class="p1">Objectives</span>
                                </div>
                                <div class="deliverables-list d-flex d-flex-row">
                                    <span class="p1">Concepts</span>
                                    <span class="p1">Experience</span>
                                    <span class="p1">User</span>
                                    <span class="p1">Testing</span>
                                    <span class="p1">UI Design</span>
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
