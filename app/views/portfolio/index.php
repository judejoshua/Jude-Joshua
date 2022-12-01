<?php
    $title = 'Design solutions - Jude Joshua | Top-notch mobile and web experience designer';
    $description = 'Get human-centred product designs that communicate your brand\'s business goals to your target audience.';
    $img = '/public/assets/img/landing-image.webp';

    include './public/components/header.php';
?>
    </head>

    <body>
        <div class="wrapper" id="top">
            <header class="landing" id="home">
                <div class="text-divider hideme left">
                    <h1><span id="highlight">Beautifully</span> crafted solutions, <br>for <span id="highlight">Businesses</span> and <span id="highlight">Brands</span>.</h1>
                    <!-- <div id="liner"></div> -->
                    <!-- <p class="p4">
                        The goal of every digital project is to provide the best solution in a code and user-friendly manner. Here are ideas that I worked on, turning the goals into code-ready and user-friendly digital products with a stress-free user flow.
                    </p> -->
                </div>
                <div class="tags-row hideme right">
                    <span class="h5">Filter by:</span>
                    <div>
                        <span class="p5 secondary" id="tag-single" data-show="UI/UX design">Design Case Studies <span id="project-counter"><?= $data['ui_ux'] ?></span></span>
                        <span class="p5 secondary" id="tag-single" data-show="UI(Visual) design">Visual (UI) Designs <span id="project-counter"><?= $data['ui'] ?></span></span>
                        <span class="p5 secondary" id="tag-single" data-show="Web UI design, Web development">Web Design Projects <span id="project-counter"><?= $data['web'] ?></span></span>
                    </diV>
                </div>
            </header>
            <article id="body">
                <section id="case-study">
                    <div class="case-studies-body">
                        <div class="projects-holder">
                            <div class="row">
                                <?php
                                    $columnLimit = 2;
                                    $columns = array_fill(0, $columnLimit, []);
                                    foreach ($data['projectList'] as $key => $project)
                                    {
                                        $columns[$key % $columnLimit][] = $project;
                                    };
                                    
                                    foreach ($columns as $column)
                                    {
                                        echo '
                                            <div class="flexer">';
                                            
                                            foreach ($column as $project)
                                            {
                                                $project_data = json_decode($project['project_data'], true);
                                                
                                                if($project['project_type'] == 'UI/UX design'){
                                                    $show = 'case study';
                                                }else if($project['project_type'] == 'UI(Visual) design'){
                                                    $show = 'design process';
                                                }else{
                                                    $show = 'project';
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
                        <div class="pagination">
                            <a href="" class="las la-angle-left"></a>
                            <a href="" class="las la-angle-right"></a>
                        </div>
                    </div>
                </section>
            </article>
        </div>
        <?php
            include './public/components/footer.php';
        ?>
    </body>
    
    <script>
        var projectsArray = <?php echo json_encode($data['projectList']); ?>;
        
        $(".tags-row div span").click(function(){
            
            let project_type = $(this).attr("data-show");
            
            if($(this).siblings().hasClass("active")){
                $(this).siblings().removeClass("active")
            }

            
            if($(this).hasClass("active")){
                
                $(this).removeClass("active");
                showArray = projectsArray;
                
            }else{
                $(this).addClass("active");
                var results = projectsArray.filter(function(elem) {
                    return elem.project_type.indexOf(project_type) !== -1;
                });
                
                showArray = results;
            }
            
            $(".projects-holder .row").empty();

            jQuery.each(showArray, function(index, project) {
                
                project_data_array = JSON.parse(project.project_data);
                
                if(project.project_type == 'UI/UX design'){
                    show = 'case study';
                }else if(project.project_type == 'UI(Visual) design'){
                    show = 'design process';
                }else{
                    show = 'project';
                }
                $(".projects-holder .row").append('<a id="projector" class="projector hideme showme" href="/portfolio/case_study/'+ project.unique_id +'"><div class="project"><img class="projector-image lazy-image" loading="lazy" src="'+ project.project_img_directory + project.project_cover_img +'" alt="'+ project_data_array.project_title +'"><div class="caption"><div class="caption-text"><div class="d-flex d-flex-row flex-justify-between flex-align-start"><div class="before-year"><h5 class="p4">'+ project_data_array.project_title +'</h5><span id="tags" class="p5">'+ project.project_type +'</span></div><span class="p5 year">'+ project.project_year.split(" ")[1] +'</span></div><div class="d-flex d-flex-row flex-justify-between flex-align-start"><span class="p5 view">View '+ show +'</span><i class="las la-arrow-right"></i></div></div></div></div></a>')
            });


            const outerHTML = elem => elem.outerHTML

            const sortIntoColumns = (numCols) =>
            (columns, value, i) => {
                const index = i % numCols

                columns[index] = Array.isArray(columns[index])
                ? [...columns[index], value]
                : [value]

                return columns
            }

            const concatHTML = (html, column) =>
            `${html}<div class='flexer'>\n${column.join('\n')}\n</div>\n`


            const toColumns = (elems, numCols = 1) =>
            Array.from(elems)
                .map(outerHTML)
                .reduce(sortIntoColumns(numCols), [])
                .reduce(concatHTML, '')

            const posts = document.querySelectorAll('.projects-holder .row a')
            
            const motherbox = document.querySelector(".projects-holder .row");
            motherbox.innerHTML = toColumns(posts, 2);
            
        })
    </script>
    
    </html>