<?php
    $title = 'Jude Joshua || Product designer and Web developer';
    $description = 'I am a product designer with experience in web design & development. I seek to create code-and-user-friendly systems with design in the easiest way possible. Check out my portfolio to see how.';
    $img = '/public/assets/img/landing-image.webp';

    include './public/components/header.php';
?>
    </head>

    <body id="home-landing">
        <div class="wrapper" id="top">
            <header class="landing" id="home">
                <div class="bg-play">
                    <div class="shade"></div>
                </div>
                <div class="header_cont">
                    <div class="header">
                        <div class="header-text">
                            <h1>Using creativity and passion to <span id="landing-highlight"></span> a better world.</h1>
                            <p class="p4">I am Jude Joshua, a product designer with experience in web design & development from Nigeria 🇳🇬.<br>I seek to fuse my design knowledge and skills in ways that will create better design patterns and improved lifestyles in the most uncomplicated (useable) way possible.</p>
                        </div>
                        <div class="header-cta">
                            <a class="btn" href="#body">
                                <div class="btn_bg"></div>
                                <div class="btn_cont">
                                    <p id="text"><span>See</span> how</p>
                                    <i class="las la-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="landing-image">
                        <img src="/public/assets/img/landing-img.webp" alt="logo">
                        <a href="/cv" class="services">
                            <p class="p5">View my Résumé</p><i class="las la-arrow-right"></i></a>
                    </div>
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
                            <!--<h2>Design Systems that I have built</h2>-->
                            <div id="liner"></div>
                            <p class="p4">
                                I have worked on ideas from different industries and disciplines and everytime, I always combine my technical and creative expertise to help my clients explore and get the best value of technology in their business. I work to ensure that your project scope is delivered in such a way that the idea of the product is conveyed to the user and they can understand it at once, at the pace that you need.<br/><br/>
                                Shown below are a few samples.
                            </p>
                        </div>
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
                                        if($count > 3){
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
                                                    <a href="/portfolio/case_study/'.$project['unique_id'].'">
                                                        <div class="project">
                                                            <img src="'.$project['project_img_directory'].$project['project_cover_img'].'" alt="'.$project_data['project_title'].'">
                                                            <div class="caption">
                                                                <div class="caption-text">
                                                                    <h4>'.$project_data['project_title'].'</h4>
                                                                    <span id="tags" class="p5">'.$project['project_type'].'</span>
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
                    <a class="btn mdn" href="/portfolio">
                        <div class="btn_bg"></div>
                        <div class="btn_cont">
                            <p id="text"><span>See</span> more work</p>
                            <i class="las la-arrow-right"></i>
                        </div>
                    </a>
                </section>
                <section id="design-section">
                    <div class="design-style">
                        <div class="full-width-shift">
                            <div class="text-divider">
                            <h2>My Design Process</h2>
                            <div id="liner"></div>
                            <p class="p4">
                                Creating user-friendly systems doesn't just happen. It calls for some skills applied through different processes. When I work on projects (on the web or mobile), I prefer to break them down into smaller processes which I will work on first. After that, I put them back together to achieve a harmonious solution.<br/>
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
                                            <h2>Research</h2>
                                        </div>
                                        <div class="body">
                                            <p class="paragraphsdescriptions">
                                                This is the key process in getting the desired results. First, I pay close attention to the problem or idea, and try to understand the goals.<br/>
                                                After this, I conduct deep findings/researches and then, I create user personaes based on my findings.<br/>
                                                My research methodolgy is simple; <span id="highlight">Know</span>, <span id="highlight">Learn</span> and <span id="highlight">Understand</span>.
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
                                            <h2>Ideation</h2>
                                        </div>
                                        <div class="body">
                                            <p class="paragraphsdescriptions">
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
                                            <h2>Prototyping</h2>
                                        </div>
                                        <div class="body">
                                            <p class="paragraphsdescriptions">
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
                                            <h2>Testing</h2>
                                        </div>
                                        <div class="body">
                                            <p class="paragraphsdescriptions">
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
                    <div class="full-width-shift">
                        <a class="btn mdn" href="/portfolio">
                        <div class="btn_bg"></div>
                        <div class="btn_cont">
                            <p id="text"><span>See</span> my work</p>
                            <i class="las la-arrow-right"></i>
                        </div>
                    </a>
                    </div>
                </section>
                <section id="why">
                    <div class="text-divider">
                        <h2>A good fit?</h2>
                        <div id="liner"></div>
                        <p class="p4">
                            There is always a driving force that pushes one to excellence or otherwise. Me, I'm driven by a deep passion for design.<br/>
                            Many designs today have the beauty, luxury, and ease of a workable platform. But they often fail to consider one critical point - development feasibility. That is one of the key challenges developers experience when working with product designers.</br>
                            <!--A lot of work goes in from the design stage to the development stage. Most times, there are a lot of design changes that must take place during development to accommodate code functionality.-->To this end, developers make various design-code changes which usually results in a loss of style. I know this because I have been opportune to experience both sides of the web world as a web designer & developer and then a product designer.<br/>
                            My ability to leverage this problem and provide a design that works in functionality and experience makes me different from the rest. I do this by providing a design system that respects the laws of coding and development. It is not prone to numerous developer alterations and balances the end users' needs and the business objectives.
                            <!--There is always a driving force that pushes one to excellence or otherwise. Me, I'm driven by a deep passion for design. A single day doesn't go by without me engaging my design skills with some task.</br>-->
                            <!--<span id="quote">"Design is everywhere. From the dress, you're wearing to the smartphone you're holding, its design."<br/><br/>- Samandara Ginige</span>-->
                            <!--I have loved design and arts since my childhood. And combining this love with a zeal to make life better and easy for people is what pushed me to develop my skills in design. And whether it is through design or coding, I always seek to make the digital life of my users as easy as I can make it.-->
                        </p>
                    </div>
                    <a class="btn mdn" href="/cv">
                        <div class="btn_bg"></div>
                        <div class="btn_cont">
                            <p id="text"><span>View</span> my Résumé</p>
                            <i class="las la-arrow-right"></i>
                        </div>
                    </a>
                </section>
            </article>
        </div>
        <?php
            include './public/components/footer.php';
        ?>
    </body>

    </html>