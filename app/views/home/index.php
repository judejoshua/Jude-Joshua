<?php
    $title = '';
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
                            <h1>Using creativity and passion to <span id="landing-highlight"><span id="highlight-hidden">create.</span><span class="reveal" id="first">design</span><span class="reveal" id="second">build</span></span> a better world.</h1>
                            <p class="p4">I am Jude Joshua, a product designer, with background in web design & development from Nigeria 🇳🇬.<br>I seek to fuse my design knowledge and skills in ways that will create new patterns and lifestyles through digital systems in the simplest (useable) way possible.</p>
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
                        <img src="/public/assets/img/landing-img.png" alt="logo">
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
                            <h2>Digital Patterns that I have built...</h2>
                            <div id="liner"></div>
                            <p class="p4">"Building new design patterns" may sound easy to achieve, but in reality, they are, actually not that easy. This is because a lot of users are already used to a particular way of life/lifestlye. However, what always pushes through, is how much of a solution a digital platform has to offer.<br/>
                            And this is what I have done; spent years building and learning how to design what works and what gives users satisfaction.<br/><br/>
                            Here are a few awesome samples.</p>
                        </div>
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
                        <div class="text-divider">
                            <h2>How do I achieve these patterns?</h2>
                            <div id="liner"></div>
                            <p class="p4">Creating user-friendly systems don't just happen. It calls for certain skills to be applied through certain processes. This is why when working on projects, web or mobile; I prefer to break them down into smaller processes which I will work on, and then put them back them back together to achieve a unified solution.<br/>
                            Here’s what I mean...</p>
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
                                                Here comes the most exciting part of the process. With an established understanding, I begin to draft ideas and solutions to solve the problem and implement concepts. I pay keen attention to the needs and details of both the client and the user through sketches, wireframes, and visual mockups.
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
                                                After the initial prototype testing and implementation of the product, I test the product further, with real users.</br>
                                                After I get feedback, I cross-check it with the desired needs and if needed, re-adjust the product to give the desired results.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn mdn" href="/portfolio">
                        <div class="btn_bg"></div>
                        <div class="btn_cont">
                            <p id="text"><span>See</span> my past work</p>
                            <i class="las la-arrow-right"></i>
                        </div>
                    </a>
                </section>
                <section id="why">
                    <div class="text-divider">
                        <h2>What keeps me going...</h2>
                        <div id="liner"></div>
                        <p class="p4">
                            There is always a driving force that pushes one to excellence or otherwise. For me, I'm driven by a deep passion for design. Not a single day has gone by without me engaging my design skills in some way.<br/>
                            Like Samadara Ginige, an award winning logo designer and developer once said, "<span id="quote">Design is everywhere. From the dress you’re wearing to the smartphone you’re holding, it’s design</span>". I have had a love for design and arts from my childhood. This, combined with an interest to make life better and easy for people, are what pushed me to develop my skills in design.<br/>
                            And whether it is through design or coding, I always seek to make the digital life of my users as easy as I can make it.</p>
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