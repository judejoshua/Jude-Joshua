<?php
    $title = 'Past work - Jude Joshua || Product designer and Web developer';
    $description = 'Here are more ideas from different industries and disciplines that I have turned into code-and-user-friendly digital products.';
    $img = '/public/assets/img/landing-image.webp';

    include './public/components/header.php';
?>
    </head>

    <body>
        <div class="wrapper" id="top">
            <header class="landing" id="home">
                <div class="text-divider">
                    <h1>Past Work</h1>
                    <div id="liner"></div>
                    <p class="p4">
                        Here are more ideas from different industries and disciplines that I have turned into code-and-user-friendly digital products. You will see that these projects display what stress-free user interaction and satisfaction are about and my process to balance these with the clients' business goals.
                    </p>
                </div>
                <div class="tags-row">
                    <span class="h5">Filter by:</span>
                    <div>
                        <span class="p5 secondary" id="tag-single" data-show="UI/UX">Design Case Studies <span id="project-counter"><?= $data['ui_ux'] ?></span></span>
                        <span class="p5 secondary" id="tag-single" data-show="Web design, Web development">Web Development Projects <span id="project-counter"><?= $data['web'] ?></span></span>
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
                                               
                                                echo '
                                                    <a id="projector" href="/portfolio/case_study/'.$project['unique_id'].'">
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
            
            //shuffle showArray
            function shuffle(array) {
                for (let i = array.length - 1; i > 0; i--) {
                    let j = Math.floor(Math.random() * (i + 1));
                    [array[i], array[j]] = [array[j], array[i]];
                }
            }
            shuffle(showArray);


            jQuery.each(showArray, function(index, project) {
                
                project_data_array = JSON.parse(project.project_data);
                
                $(".projects-holder .row").append('<a id="projector" href="/portfolio/case_study/'+ project.unique_id +'"><div class="project"><img src="'+ project.project_img_directory + project.project_cover_img +'" alt="'+ project_data_array.project_title +'"><div class="caption"><div class="caption-text"><h4>'+ project_data_array.project_title +'</h4><span id="tags" class="p5">'+ project.project_type +'</span></div><i class="las la-arrow-right"></i></div></div></a>')
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