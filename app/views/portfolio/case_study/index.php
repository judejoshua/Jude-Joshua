<?php
    $title = json_decode($data['projectData'][0]['project_data'], true)['project_title'] .' - Jude Joshua || Product designer and Web developer';
    $description = json_decode($data['projectData'][0]['project_data'], true)['project_brief'];
    $img = $data['projectData'][0]['project_img_directory'].$data['projectData'][0]['project_cover_img'];

    include './public/components/header.php';
?>
    </head>

    <body id="case-study-body">
        <?php
            foreach ($data['projectData'] as $key => $projectData)
            {
                $project_data =  array_filter(json_decode($projectData['project_data'], true));

                echo '
                    <div class="wrapper" id="top">
                        <header class="landing" id="home">
                            <div class="case-study-title">
                                <div class="case-study-title-top">
                                    <div class="col-100 returner d-flex d-flex-column flex-align-start">
                                        <a href="/portfolio" class="return-button">
                                            <i class="las la-arrow-left "></i>
                                            <h6>Return to Past Works Page</h6>
                                        </a>
                                    </div>
                                    <div class="col-100 case-study-header-details d-flex d-flex-row flex-justify-between">
                                        <div class="case-study-header col-50 d-flex d-flex-column">
                                            <div class="title-text">
                                                <h1>'.$project_data['project_title'].'</h1>
                                                <p class="p4">'.$project_data['project_brief'].'</p>
                                            </div>
                                            <div class="case-study-header-details-text d-flex d-flex-column flex-justify-start">
                                                <p class="p4"><span class="h5">Project Type:</span> '.$projectData['project_type'].'</p>
                                                <p class="p4"><span class="h5">Project Duration:</span> '.$projectData['project_duration'].'</p>
                                                <p class="p4 p-tools d-flex d-flex-row"><span class="h5">Tools Used:</span><span class="project_tools_mother d-flex d-flex-column"><span class="project_tools">'.str_replace(',', '</span><span class="project_tools">', $project_data['project_tools']).'</span><span></p>
                                            </div>
                                        </div>
                                        <img class="case-study-img col-50" src="'.$projectData['project_img_directory'].$projectData['project_cover_img'].'" alt="project cover-image">
                                            
                                    </div>
                                </div>
                            </div>
                        </header>
                        <article id="body ">
                            <div class="portfolio-section">';

                            $body_project_data = array_splice($project_data, 3);

                            foreach ($body_project_data as $section => $section_data)
                            {
                                $section_heading = ucwords(str_replace("project_", "", $section));

                                if($section == 'project_show_reel')
                                {
                                    echo '
                                        <div class="sectioners show_reeler col-100 d-flex d-flex-row flex-align-start">
                                            <img src="'.$projectData['project_img_directory'].$section_data.'" class="col-100" id="show_reeler" alt="showreel of project screens">
                                        </div>
                                    ';
                                }else if($section == 'project_problem' || $section == 'project_solution')
                                {
                                    if(!empty(array_filter($section_data)))
                                    {
                                        echo '
                                            <div class="sectioners col-100 d-flex d-flex-row flex-align-start">
                                                <div class="text-divider">
                                                    <h2>'.$section_heading.':</h2>
                                                </div>
                                                <div class="text-divider sub-title">
                                                    <h3>'.implode('</h3><p class="p4">',$section_data).'</p>
                                                </div>
                                            </div>
                                        ';
                                    }else{
                                        echo '';
                                    }
                                }else if($section == 'project_process')
                                {
                                     echo '
                                        <div class="sectioners col-100 d-flex d-flex-column flex-align-start">
                                            <div class="process-contents col-100 d-flex d-flex-column">';
                                                if (is_array($section_data)) {
                                                    reset($section_data);
                                                    $firstKey = key($section_data);
                                                    foreach ($section_data as $sub_title => $contents)
                                                    {
                                                        echo'
                                                            <div>
                                                                <div class="process-sectioners sectioners col-100 d-flex d-flex-column flex-align-start">';
                                                                    if ($sub_title === $firstKey) {
                                                                        echo '
                                                                            <div class="text-divider" id="process-text-divider">
                                                                                <h2>The '.$section_heading.':</h2>
                                                                            </div>
                                                                        ';
                                                                    }
                                                                    echo' 
                                                                    <div class="text-divider sub-title">
                                                                        <div class="left">
                                                                            <h3>'.ucwords(str_replace("_", " ", $sub_title)).'</h3>';
                                                                            if (!is_array($contents))
                                                                            {
                                                                                echo '<p class="p4">'.$contents.'</p>';
                                                                            }else{
                                                                                if (array_key_exists("summary", $contents))
                                                                                {
                                                                                    echo '<p class="p4">'.$contents['summary'].'</p>';
                                                                                    unset($contents['summary']);
                                                                                }
                                                                            }
                                                                        echo'
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="projects-holder">';
                                                                    echo'
                                                                    <div class="row">';
                                                                        foreach ($contents as $images_alt_title => $images)
                                                                        {
                                                                            foreach ($images as $image)
                                                                            {
                                                                                echo'
                                                                                    <div class="project">
                                                                                        <img src="'.$projectData['project_img_directory'].$image.'" alt="'.ucwords(str_replace("_", " ", $images_alt_title)).'">
                                                                                ';
                                                                                if(!empty($contents))
                                                                                {
                                                                                    echo '
                                                                                        <div class="notice">
                                                                                            <p class="p6">Click on the image to view it\'s large size</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    ';
                                                                                }
                                                                            }
                                                                        }
                                                                    echo '
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        ';
                                                    }
                                                }
                                            echo'
                                            </div>
                                        </div>
                                    ';
                                }
                            }

                            
                            echo'
                                <div class="col-100-shift returner d-flex d-flex-column flex-align-start">
                                    <a href="/portfolio" class="return-button">
                                        <i class="las la-arrow-left "></i>
                                        <h6>Return to Past Works Page</h6>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                ';

                
            }
        ?>
        <?php
            include './public/components/footer.php';
        ?>
        <span class="cuddles" id="close"><i class="las la-times"></i></span>
        <div class="zooms">
            <span id="zoom-in" class="cuddles"><i class="las la-search-plus"></i></span>
            <span id="zoom-out" class="cuddles"><i class="las la-search-minus"></i></span>
        </div>
        <div class="modal hideout">
            <div class="img-holder">
                <img src="" class="zoom-in" id="larger"/>
            </div>
        </div>
    </body>

    </html>