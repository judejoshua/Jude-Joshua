<?php
    $title = 'Jude Joshua || Product designer and Web developer';
    $description = 'I am a product designer with experience in web design & development. I seek to create code-and-user-friendly systems with design in the easiest way possible. Check out my portfolio to see how.';
    $img = '/public/assets/img/landing-image.webp';

    include './public/components/header.php';
?>
    </head>

    <body id="home-landing">
        <div class="wrapper" id="top">
            <header class="landing d-flex d-flex-row flex-justify-between flex-align-end" id="home">
                <div class="header_cont d-flex d-flex-row flex-justify-between flex-align-center">
                    <div class="header">
                        <div class="header-text">
                            <h1>Using creativity and</br>passion to <span id="landing-highlight"></span> a</br>better world.</h1>
                            <p class="p4">I seek to use my design knowledge and skills in ways that create better user patterns and improved lifestyles in the most intuitive and useful way possible.</p>
                            <a class="btn" href="#case-study">
                            <div class="btn_bg"></div>
                            <div class="btn_cont">
                                <p id="text"><span>See</span> how</p>
                                <i class="las la-arrow-down"></i>
                            </div>
                        </a>
                        </div>
                    </div>
                </div>
                <div id="landing-img"></div>
            </header>
            <article id="body">
                <section id="case-study">
                    <div class="text-divider">
                        <h2>Recent work</h2>
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

                                                echo '
                                                    <a id="projector" href="/portfolio/case_study/'.$project['unique_id'].'">
                                                        <div class="project">
                                                            <img src="'.$project['project_img_directory'].$project['project_cover_img'].'" alt="'.$project_data['project_title'].'">
                                                            <div class="caption">
                                                                <div class="caption-text">
                                                                    <h5>'.$project_data['project_title'].'</h5>
                                                                    <span id="tags" class="p6">'.$project_data['project_tags'].'</span>
                                                                </div>
                                                                <i class="las la-arrow-right"></i>
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
                    <a class="btn lng" href="/portfolio">
                        <div class="btn_bg"></div>
                        <div class="btn_cont">
                            <p id="text"><span>See</span> more case-studies</p>
                            <i class="las la-arrow-right"></i>
                        </div>
                    </a>
                </section>
                <section id="design-section">
                    <div class="design-style">
                        <div class="col-100-shift">
                            <div class="text-divider">
                                <h2>My Design Process</h2>
                                <div id="liner"></div>
                                <p class="p4">
                                    When I work on digital projects (either web or mobile), I like to break them down into smaller bits. This allows me to achieve solutions to complex ideas easily and faster. After following these processes diligently, I put them back together and the final outcome is usually a harmonious solution.<br/>
                                    Here's what I mean;
                                </p>
                            </div>
                        </div>
                        <div class="design-styles">
                            <div class="row">
                                <div class="design-rule">
                                    <div class="icon">
                                        <img src="/public/assets/img/design-style-1.svg" alt="research" />
                                    </div>
                                    <div class="design-rule-set">
                                        <div class="title">
                                            <h2><span>01.</span> Research</h2>
                                        </div>
                                        <div class="body">
                                            <p class="p4">
                                                This is the key process in getting the desired results. First, I pay close attention to the problem or idea, and try to understand the goals.<br/>
                                                After this, I conduct interviews, deep findings/researches and then, I create user personaes based on my findings. My research methodolgy is simple - <span id="highlight">Know</span>, <span id="highlight">Learn</span> and <span id="highlight">Understand</span>.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="design-rule">
                                    <div class="icon">
                                        <img src="/public/assets/img/design-style-2.svg" alt="design" />
                                    </div>
                                    <div class="design-rule-set">
                                        <div class="title">
                                            <h2><span>02.</span> Ideation</h2>
                                        </div>
                                        <div class="body">
                                            <p class="p4">
                                                Here comes the most exciting part of the process. With an established understanding, I analyse and then begin to draft ideas and solutions to solve the problem and implement concepts. I pay keen attention to the needs and details of both the client and the user through sketches, wireframes, and visual mockups.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="design-rule">
                                    <div class="icon">
                                        <img src="/public/assets/img/design-style-3.svg" alt="prototyping" />
                                    </div>
                                    <div class="design-rule-set">
                                        <div class="title">
                                            <h2><span>03.</span> Prototyping</h2>
                                        </div>
                                        <div class="body">
                                            <p class="p4">
                                                After designing, I carry out tests on the draft version of the product. I explore the product as a user while taking note of the 'why' behind the experience.<br/>
                                                From here, I can know what is lacking; or if the product is working as it should, and then adjust it to satisfy the desired needs.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="design-rule">
                                    <div class="icon">
                                        <img src="/public/assets/img/design-style-4.svg" alt="testing" />
                                    </div>
                                    <div class="design-rule-set">
                                        <div class="title">
                                            <h2><span>04.</span> Testing</h2>
                                        </div>
                                        <div class="body">
                                            <p class="p4">
                                                This is the main testing process.</br>
                                                After the initial prototype testing and implementation of the product, I test the product further with real users.</br>
                                                After I get feedback, I cross-check it with the desired needs and if needed, re-adjust the product to meet the desired business and user objectives.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-100-shift">
                        <a class="btn mdn" href="/portfolio">
                        <div class="btn_bg"></div>
                        <div class="btn_cont">
                            <p id="text"><span>See</span> a sample</p>
                            <i class="las la-arrow-right"></i>
                        </div>
                    </a>
                    </div>
                </section>
                <section id="why">
                    <div class="col-100 why-boxed">
                        <div class="text-divider">
                            <h2>A good fit?</h2>
                            <div id="liner"></div>
                            <p class="p4">
                                Every successful person has a driving force that motivates them to excel. For me, it is my deep passion for design. There isn't a day that goes by without me utilizing my design skills in some way.<br/>I have been fascinated by design since my childhood. This love combined with a desire to simplify and improve people's lives is what inspired me to become a designer. This is why, whether it is through design or coding, I strive to make the digital life of my users as easy as possible through accessible, minimalist, and useful designs.
                            </p>
                        </div>
                        <a class="btn" href="/cv">
                            <div class="btn_bg"></div>
                            <div class="btn_cont">
                                <p id="text"><span>View</span> my CV</p>
                                <i class="las la-arrow-right"></i>
                            </div>
                        </a>
                        <div class="img-why-me"></div>
                    </div>
                </section>
            </article>
        </div>
        <?php
            include './public/components/footer.php';
        ?>
    </body>

    </html>
