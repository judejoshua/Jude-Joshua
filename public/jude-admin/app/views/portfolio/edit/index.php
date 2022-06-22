<?php
    $title = 'Edit project '.$data['projectData'][0]['unique_id'].' || ';
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
                                    <a href="/portfolio/case_study/'.$projectData['unique_id'].'" class="return-button">
                                        <i class="las la-arrow-left "></i>
                                        <h5>Return to Portfolio Page</h5>
                                    </a>
                                    <div class="title-text">
                                        <h1>Edit project</h1>
                                        <p class="p4">
                                            '.$project_data['project_title'].'
                                        </p>
                                    </div>
                                </div>
                                <div class="scroll-down-indicator">
                                    <div class="scroll-down">
                                        <div class="mouse">
                                            <div id="arrow-tail-short"></div>
                                        </div>
                                        <div id="arrow-tail-long"></div>
                                    </div>
                                    <p class="p5">Scroll down</p>
                                </div>
                            </div>
                        </header>
                        <article id="body" class="add">
                            <div class="portfolio-section">
                                <form>
                                    <div class="form-body">
                                        <input type="hidden" value="'.$projectData['unique_id'].'" name="project_id">
                                        <div class="form-group">
                                            <label for="project_type" id="to-title" class="h4">Project Type*</label>
                                            <div class="input-group">
                                                <div class="input-field">
                                                    <select id="project_type" name="project_type" class="form-input p4">
                                                        <option value="UI/UX"'; echo $projectData['project_type'] == 'UI/UX' ? 'selected' : ''; echo '>UI/UX</option>
                                                        <option value="Web design, Web development"'; echo $projectData['project_type'] == 'Web design, Web development' ? 'selected' : '';echo '>Website development</option>
                                                        <option value="UI/UX, Web development" '; echo $projectData['project_type'] == 'UI/UX, Web development' ? 'selected' : ''; echo'>Both</option>
                                                    </select>
                                                    <div class="labels">
                                                        <p class="p5 placeholder">Choose your project type (Required)</p>
                                                        <p class="p5 error" data-error="project_type"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cover-imagePreview" id="to-title" class="h4">Project Cover Image*</label>
                                            <div class="img-upload input-group">
                                                <div class="input-field">
                                                    <div class="labels">
                                                        <p class="p5 placeholder">Select a cover image for your project in the ratio 1:1 (Required)</p>
                                                        <p class="p5 error" data-error="project_cover_img"></p>
                                                    </div>
                                                    <input type="hidden" name="project_cover_img_old" id="project_cover_img_old" value="' .$projectData['project_cover_img']. '">
                                                    <input type="file" id="project_cover_img" name="project_cover_img" class="form-input p4" accept="image/webp" onchange="document.getElementById(\'cover-imagePreview\').src = window.URL.createObjectURL(this.files[0]);document.getElementById(\'project_cover_img_old\').value=\'\'"/>
                                                    <label for="project_cover_img" class="choose-img-label">
                                                        <div class="project">
                                                            <img id="cover-imagePreview" src="https://judejoshua.me'.$projectData['project_img_directory'].$projectData['project_cover_img'].'" alt="cover image" />
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <fieldset id="general">
                                            <legend>Project Details</legend>
                                            <div class="form-group">
                                                <label for="project_title" id="to-title" class="h4">Project Title*</label>
                                                <div class="input-group">
                                                    <div class="input-field">
                                                        <input type="text" value="'; echo isset($project_data['project_title']) ? $project_data['project_title'] : ''; echo'" id="project_title" name="project_title" class="form-input p4"/>
                                                        <div class="labels">
                                                            <p class="p5 placeholder">Enter your project title (Required)</p>
                                                            <p class="p5 error" data-error="project_title"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="project_description" id="to-title" class="h4">Project Mini Description*</label>
                                                <div class="input-group">
                                                    <div class="input-field">
                                                        <textarea type="text" id="project_description" name="project_description" class="form-input p4 form-area" maxlength="200">'; echo isset($project_data['project_description']) ? $project_data['project_description'] : ''; echo'</textarea>
                                                        <div class="labels">
                                                            <p class="p5 placeholder">Say a little talk about your project (Required)</p>
                                                            <p class="p5 error" data-error="project_description"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="project_tags" id="to-title" class="h4">Project Tags*</label>
                                                <div class="input-group">
                                                    <div class="input-field">
                                                        <input type="text" id="project_tags" value="'; echo isset($project_data['project_tags']) ? $project_data['project_tags'] : ''; echo'" name="project_tags" class="form-input p4"/>
                                                        <div class="labels">
                                                            <p class="p5 placeholder">Enter your project tags seperated by a comma (Required)</p>
                                                            <p class="p5 error" data-error="project_tags"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="project_about" id="to-title" class="h4">About the project*</label>
                                                <div class="input-group">
                                                    <div class="input-field">
                                                        <textarea type="text" id="project_about" name="project_about" class="form-input p4 form-area" maxlength="2000">'; echo isset($project_data['project_about']) ? $project_data['project_about'] : ''; echo'</textarea>
                                                        <div class="labels">
                                                            <p class="p5 placeholder">Let\'s talk about the client and what they intend to achieve with the project in details (Required)</p>
                                                            <p class="p5 error" data-error="project_about"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="project_problem_statement" id="to-title" class="h4">Problem Statement</label>
                                                <div class="input-group">
                                                    <div class="input-field">
                                                        <textarea type="text" id="project_problem_statement" name="project_problem_statement" class="form-input p4 form-area" maxlength="2000">'; echo isset($project_data['project_problem_statement']) ? $project_data['project_problem_statement'] : ''; echo'</textarea>
                                                        <div class="labels">
                                                            <p class="p5 placeholder">What problem were you trying to solve (Required for UI/UX)</p>
                                                            <p class="p5 error" data-error="project_problem_statement"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="project_solution" id="to-title" class="h4">Solution</label>
                                                <div class="input-group">
                                                    <div class="input-field">
                                                        <textarea type="text" id="project_solution" name="project_solution" class="form-input p4 form-area" maxlength="1000">'; echo isset($project_data['project_solution']) ? $project_data['project_solution'] : ''; echo'</textarea>
                                                        <div class="labels">
                                                            <p class="p5 placeholder">What was the solution? (Optional)</p>
                                                            <p class="p5 error" data-error="project_solution"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="project_recommendation" id="to-title" class="h4">Recommendation</label>
                                                <div class="input-group">
                                                    <div class="input-field">
                                                        <textarea type="text" id="project_recommendation" name="project_recommendation" class="form-input p4 form-area" maxlength="1000">'; echo isset($project_data['project_recommendation']) ? $project_data['project_recommendation'] : ''; echo'</textarea>
                                                        <div class="labels">
                                                            <p class="p5 placeholder">Any recommendations? (Required for UI/UX)</p>
                                                            <p class="p5 error" data-error="project_recommendation"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="project_role" id="to-title" class="h4">Role*</label>
                                                <div class="input-group">
                                                    <div class="input-field">
                                                        <input type="text" value="'; echo isset($project_data['project_role']) ? $project_data['project_role'] : ''; echo'" id="project_role" name="project_role" class="form-input p4"/>
                                                        <div class="labels">
                                                            <p class="p5 placeholder">Your role in the project (Required)</p>
                                                            <p class="p5 error" data-error="project_role"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="project_duration" id="to-title" class="h4">Project Duration*</label>
                                                <div class="input-group">
                                                    <div class="input-field">
                                                        <input type="text" id="project_duration" value="'; echo isset($projectData['project_duration']) ? $projectData['project_duration'] : ''; echo'" name="project_duration" class="form-input p4"/>
                                                        <div class="labels">
                                                            <p class="p5 placeholder">How long did you work on this project? (Required)</p>
                                                            <p class="p5 error" data-error="project_duration"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="form-group '; echo $projectData['project_type'] == 'UI/UX' || $projectData['project_type'] == 'UI/UX, Web development' ? '' : 'hidden'; echo'" id="ui-ux">
                                            <fieldset id="ux">
                                                <legend>UX Design</legend>
                                                <div class="form-group">
                                                    <label for="project_ux-design" id="to-title" class="h4"></label>
                                                    <div class="input-group">
                                                        <div class="input-field">
                                                            <textarea type="text" id="project_ux-design" name="project_ux-design" class="form-input p4 form-area" maxlength="1000">'; echo isset($project_data['UX Design']['summary']) ? $project_data['UX Design']['summary'] : ''; echo'</textarea>
                                                            <div class="labels">
                                                                <p class="p5 placeholder">What little summary can you give about the ux design process?</p>
                                                                <p class="p5 error" data-error="project_ux-design"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="research" class="ux-buddy">
                                                    <legend>User Research</legend>
                                                    <div class="form-group">
                                                        <label for="project_research-summary" id="to-title" class="h4"></label>
                                                        <div class="input-group">
                                                            <div class="input-field">
                                                                <textarea type="text" id="project_research-summary" name="project_research-summary" class="form-input p4 form-area" maxlength="1000">'; echo isset($project_data['UX Design']['User Research']['summary']) ? $project_data['UX Design']['User Research']['summary'] : ''; echo'</textarea>
                                                                <div class="labels">
                                                                    <p class="p5 placeholder">What little summary can you give about the user research process?</p>
                                                                    <p class="p5 error" data-error="project_research-summary"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label id="to-title" class="h4">Upload images*</label>
                                                        <div class="labels">
                                                            <p class="p5 placeholder">Upload an image to show your research process</p>
                                                            <p class="p5 error" data-error="research_img"></p>
                                                        </div>
                                                        <div class="img-upload input-group d-flex flex-wrap">';
                                                            if(is_array($project_data['UX Design']['User Research']['research_img'])){
                                                                $x=0;
                                                                foreach ($project_data['UX Design']['User Research']['research_img'] as $key => $img)
                                                                {
                                                                    $x++;
                                                                    echo'
                                                                        <div class="d-flex flex-wrap" id="img-container" data-type="research">
                                                                            <div class="input-field" id="research_img">
                                                                                <input type="hidden" name="research_img_old" id="research_img_old'.$x.'" value="' .$img. '">
                                                                                <input type="file" id="research_img'.$x.'" name="research_img[]" class="form-input p4" accept="image/webp" onchange="document.getElementById(\'research-imagePreview-'.$x.'\').src = window.URL.createObjectURL(this.files[0]);document.getElementById(\'research_img_old'.$x.'\').value=\'\'"/>
                                                                                <label for="research_img'.$x.'" class="choose-img-label">
                                                                                    <div class="project">
                                                                                        <img src="https://judejoshua.me'.$projectData['project_img_directory'].$img.'" id="research-imagePreview-'.$x.'" alt="research image" />
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    ';
                                                                }
                                                            }
                                                            echo'
                                                            <span id="tag-single" class="add-more-images">Add another image</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="personae" class="ux-buddy">
                                                    <legend>User Personae</legend>
                                                    <div class="form-group">
                                                        <label for="project_personae-summary" id="to-title" class="h4"></label>
                                                        <div class="input-group">
                                                            <div class="input-field">
                                                                <textarea type="text" id="project_personae-summary" name="project_personae-summary" class="form-input p4 form-area" maxlength="1000">'; echo isset($project_data['UX Design']['User Personae']['summary']) ? $project_data['UX Design']['User Personae']['summary'] : ''; echo'</textarea>
                                                                <div class="labels">
                                                                    <p class="p5 placeholder">What little summary can you give about the user personae?</p>
                                                                    <p class="p5 error" data-error="project_personae-summary"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group personae">
                                                        <label id="to-title" class="h4">Upload images*</label>
                                                        <div class="labels">
                                                            <p class="p5 placeholder">Upload an image to show your user personae</p>
                                                            <p class="p5 error" data-error="personae_img"></p>
                                                        </div>
                                                        <div class="img-upload input-group d-flex flex-wrap">';
                                                            if(is_array($project_data['UX Design']['User Personae']['personae_img'])){
                                                                $x=0;
                                                                foreach ($project_data['UX Design']['User Personae']['personae_img'] as $key => $img)
                                                                {
                                                                    $x++;
                                                                    echo'
                                                                        <div class="d-flex flex-wrap" id="img-container" data-type="personae">
                                                                            <div class="input-field" id="personae_img">
                                                                                <input type="hidden" name="personae_img_old" id="personae_img_old'.$x.'" value="' .$img. '">
                                                                                <input type="file" id="personae_img'.$x.'" name="personae_img[]" class="form-input p4" accept="image/webp" onchange="document.getElementById(\'personae-imagePreview-'.$x.'\').src = window.URL.createObjectURL(this.files[0]);document.getElementById(\'personae_img_old'.$x.'\').value=\'\'"/>
                                                                                <label for="personae_img'.$x.'" class="choose-img-label">
                                                                                    <div class="project">
                                                                                        <img src="https://judejoshua.me'.$projectData['project_img_directory'].$img.'" id="personae-imagePreview-'.$x.'" alt="personae image" />
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    ';
                                                                }
                                                            }
                                                            echo'
                                                            <span id="tag-single" class="add-more-images">Add another image</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset id="ui">
                                                <legend>UI Design</legend>
                                                <div class="form-group">
                                                    <label for="project_ui-design" id="to-title" class="h4"></label>
                                                    <div class="input-group">
                                                        <div class="input-field">
                                                            <textarea type="text" id="project_ui-design" name="project_ui-design" class="form-input p4 form-area" maxlength="1000">'; echo isset($project_data['UI Design']['summary']) ? $project_data['UI Design']['summary'] : ''; echo'</textarea>
                                                            <div class="labels">
                                                                <p class="p5 placeholder">What little summary can you give about the ui design process?</p>
                                                                <p class="p5 error" data-error="project_ui-design"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="wireframes" class="ui-buddy">
                                                    <legend>Wireframes and Sketches</legend>
                                                    <div class="form-group">
                                                        <label for="project_wireframes-summary" id="to-title" class="h4"></label>
                                                        <div class="input-group">
                                                            <div class="input-field">
                                                                <textarea type="text" id="project_wireframes-summary" name="project_wireframes-summary" class="form-input p4 form-area" maxlength="1000">'; echo isset($project_data['UI Design']['Wireframes and Sketches']['summary']) ? $project_data['UI Design']['Wireframes and Sketches']['summary'] : ''; echo'</textarea>
                                                                <div class="labels">
                                                                    <p class="p5 placeholder">What little summary can you give about the user wireframes process?</p>
                                                                    <p class="p5 error" data-error="project_wireframes-summary"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label id="to-title" class="h4">Upload images*</label>
                                                        <div class="labels">
                                                            <p class="p5 placeholder">Upload images to show your wireframes</p>
                                                            <p class="p5 error" data-error="wireframes_img"></p>
                                                        </div>
                                                        <div class="img-upload input-group d-flex flex-wrap">';
                                                            if(is_array($project_data['UI Design']['Wireframes and Sketches']['wireframes_img'])){
                                                                $x=0;
                                                                foreach ($project_data['UI Design']['Wireframes and Sketches']['wireframes_img'] as $key => $img)
                                                                {
                                                                    $x++;
                                                                    echo'
                                                                        <div class="d-flex flex-wrap" id="img-container" data-type="wireframes">
                                                                            <div class="input-field" id="wireframes_img">
                                                                                <input type="hidden" name="wireframes_img_old" id="wireframes_img_old'.$x.'" value="' .$img. '">
                                                                                <input type="file" id="wireframes_img'.$x.'" name="wireframes_img[]" class="form-input p4" accept="image/webp" onchange="document.getElementById(\'wireframes-imagePreview-'.$x.'\').src = window.URL.createObjectURL(this.files[0]);document.getElementById(\'wireframes_img_old'.$x.'\').value=\'\'"/>
                                                                                <label for="wireframes_img'.$x.'" class="choose-img-label">
                                                                                    <div class="project">
                                                                                        <img src="https://judejoshua.me'.$projectData['project_img_directory'].$img.'" id="wireframes-imagePreview-'.$x.'" alt="wireframes image" />
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    ';
                                                                }
                                                            }
                                                            echo'
                                                            <span id="tag-single" class="add-more-images">Add another image</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="hi-fi" class="ui-buddy">
                                                    <legend>High Fidelity Mockup</legend>
                                                    <div class="form-group">
                                                        <label for="project_hiFI-summary" id="to-title" class="h4"></label>
                                                        <div class="input-group">
                                                            <div class="input-field">
                                                                <textarea type="text" id="project_hiFI-summary" name="project_hiFI-summary" class="form-input p4 form-area" maxlength="1000">'; echo isset($project_data['UI Design']['High Fidelity Mockup']['summary']) ? $project_data['UI Design']['High Fidelity Mockup']['summary'] : ''; echo'</textarea>
                                                                <div class="labels">
                                                                    <p class="p5 placeholder">What little summary can you give about the high fidelity mockups?</p>
                                                                    <p class="p5 error" data-error="project_hiFI-summary"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group hiFI">
                                                        <label id="to-title" class="h4">Upload images*</label>
                                                        <div class="labels">
                                                            <p class="p5 placeholder">Upload an image to show your user high fidelity mockups</p>
                                                            <p class="p5 error" data-error="hiFI_img"></p>
                                                        </div>
                                                        <div class="img-upload input-group d-flex flex-wrap">';
                                                            if(is_array($project_data['UI Design']['High Fidelity Mockup']['hiFI_img'])){
                                                                $x=0;
                                                                foreach ($project_data['UI Design']['High Fidelity Mockup']['hiFI_img'] as $key => $img)
                                                                {
                                                                    $x++;
                                                                    echo'
                                                                        <div class="d-flex flex-wrap" id="img-container" data-type="hiFI">
                                                                            <div class="input-field" id="hiFI_img">
                                                                                <input type="hidden" name="hiFI_img_old" id="hiFI_img_old'.$x.'" value="' .$img. '">
                                                                                <input type="file" id="hiFI_img'.$x.'" name="hiFI_img[]" class="form-input p4" accept="image/webp" onchange="document.getElementById(\'hiFI-imagePreview-'.$x.'\').src = window.URL.createObjectURL(this.files[0]);document.getElementById(\'hiFI_img_old'.$x.'\').value=\'\'"/>
                                                                                <label for="hiFI_img'.$x.'" class="choose-img-label">
                                                                                    <div class="project">
                                                                                        <img src="https://judejoshua.me'.$projectData['project_img_directory'].$img.'" id="hiFI-imagePreview-'.$x.'" alt="hiFI image" />
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    ';
                                                                }
                                                            }
                                                            echo'
                                                            <span id="tag-single" class="add-more-images">Add another image</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset id="prototype">
                                            <legend>Project Prototype</legend>
                                            <div class="form-group">
                                                <label for="project_prototype" id="to-title" class="h4">Project Prototype*</label>
                                                <div class="input-group">
                                                    <div class="input-field">
                                                        <input type="url" id="project_prototype" value="'; echo isset($project_data['Prototype']['project prototype']) ? $project_data['Prototype']['project prototype'] : ''; echo'" name="project_prototype" class="form-input p4"/>
                                                        <div class="labels">
                                                            <p class="p5 placeholder">Enter the prototype of the project (Required)</p>
                                                            <p class="p5 error" data-error="project_prototype"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        </div>
                                        <fieldset id="web" class="'; echo $projectData['project_type'] == 'Web design, Web development' || $projectData['project_type'] == 'UI/UX, Web development' ? '' : 'hidden'; echo'">
                                            <legend>Project Website</legend>
                                            <div class="form-group">
                                                <label id="to-title" class="h4">Upload snapshots*</label>
                                                <div class="labels">
                                                    <p class="p5 placeholder">Upload some snapshots of the web project</p>
                                                    <p class="p5 error" data-error="snap_img"></p>
                                                </div>
                                                <div class="img-upload input-group d-flex flex-wrap">';
                                                    if(is_array($project_data['Website']['snap_img'])){
                                                        $x=0;
                                                        foreach ($project_data['Website']['snap_img'] as $key => $img)
                                                        {
                                                            $x++;
                                                            echo'
                                                                <div class="d-flex flex-wrap" id="img-container" data-type="snap">
                                                                    <div class="input-field" id="snap_img">
                                                                        <input type="hidden" name="snap_img_old" id="snap_img_old'.$x.'" value="' .$img. '">
                                                                        <input type="file" id="snap_img'.$x.'" name="snap_img[]" class="form-input p4" accept="image/webp" onchange="document.getElementById(\'snap-imagePreview-'.$x.'\').src = window.URL.createObjectURL(this.files[0]);document.getElementById(\'snap_img_old'.$x.'\').value=\'\'"/>
                                                                        <label for="snap_img'.$x.'" class="choose-img-label">
                                                                            <div class="project">
                                                                                <img src="https://judejoshua.me'.$projectData['project_img_directory'].$img.'" id="snap-imagePreview-'.$x.'" alt="snap image" />
                                                                            </div>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            ';
                                                        }
                                                    }
                                                    echo'
                                                    <span id="tag-single" class="add-more-images">Add another image</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="project_website" id="to-title" class="h4">Project Website*</label>
                                                <div class="input-group">
                                                    <div class="input-field">
                                                        <input type="text"  value="'; echo isset($project_data['Website']['project url']) ? $project_data['Website']['project url'] : ''; echo'" id="project_website" name="project_website" class="form-input p4"/>
                                                        <div class="labels">
                                                            <p class="p5 placeholder">Enter the website of the project (Required)</p>
                                                            <p class="p5 error" data-error="project_website"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <button class="btn" type="submit" id="edit-project">
                                        <div class="btn_bg"></div>
                                        <div class="btn_cont">
                                            <p id="text"><span>Save</span> project</p>
                                            <i class="las la-arrow-right"></i>
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </article>
                    </div>
                ';                
            }
        ?>
        <div class="success-message pop-up">
            <i class="las la-check"></i>
            <p class="p5">Your form message was sent successfullly. Please expect my response in the next few minutes.</p>
        </div>

        <?php
            include './public/components/footer.php';
        ?>
    </body>

    </html>
    