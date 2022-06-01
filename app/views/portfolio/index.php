<?php
    $title = 'Past work || ';
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
                        Here are some ideas that I have turned into end-user-ready products. You will see that these projects better display what stress-free user interaction and satisfaction are about, with a rating of 4-5 stars.</p>
                </div>
                <div class="tags-row">
                    <span class="h5">Filter by:</span>
                    <div>
                        <span class="p5 secondary" id="tag-single" data-show="UI/UX">Design Case Studies</span>
                        <span class="p5 secondary" id="tag-single" data-show="Web design">Web Development Projects</span>
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
                                                    <img src="'.$project['project_img_directory'].$project['project_cover_img'].'" alt="'.$project_data['project_title'].'">
                                                    <div class="caption">
                                                        <div class="caption-text">
                                                            <h4>'.$project_data['project_title'].'</h4>
                                                            <span id="tags" class="p5">'.$project_data['project_tags'].'</span>
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
                
                $(".projects-holder .row").append('<a href="/portfolio/case_study/'+ project.unique_id +'"><div class="project"><img src="'+ project.project_img_directory + project.project_cover_img +'" alt="'+ project_data_array.project_title +'"><div class="caption"><div class="caption-text"><h4>'+ project_data_array.project_title +'</h4><span id="tags" class="p5">'+ project_data_array.project_tags +'</span></div><i class="las la-arrow-right"></i></div></div></a>')
            });
            
        })
    </script>
    
    </html>