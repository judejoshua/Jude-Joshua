<?php
    $title = 'Add a new project || ';
    include './public/components/header.php';
?>
    </head>

    <body id="case-study-body">
        <div class="wrapper" id="top">
            <header class="landing" id="home">
                <div class="case-study-title">
                    <div class="case-study-title-top">
                        <a href="/portfolio" class="return-button">
                            <i class="las la-arrow-left "></i>
                            <h6>Return to Portfolio Page</h6>
                        </a>
                        <div class="title-text">
                            <h1>Add a new Project</h1>
                        </div>
                    </div>
                </div>
            </header>
            <article id="body" class="add">
                <div class="portfolio-section">
                    <form>
                        <div class="form-body">
                            <div class="form-group">
                                <label for="project_type" id="to-title" class="h4">Project Type*</label>
                                <div class="input-group">
                                    <div class="input-field">
                                        <select id="project_type" name="project_type" class="form-input p4">
                                            <option value="" selected hidden>Choose project type</option>
                                            <option value="UI(Visual) design">UI(Visual) Design</option>
                                            <option value="UI/UX design">UI/UX</option>
                                            <option value="Web UI design, Web development">Website development</option>
                                            <!-- <option value="UI/UX design, Web development">Both</option> -->
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
                                        <input type="file" id="project_cover_img" name="project_cover_img" class="form-input p4" accept="image/webp" onchange="document.getElementById('cover-imagePreview').src = window.URL.createObjectURL(this.files[0])"/>
                                        <label for="project_cover_img" class="choose-img-label">
                                            <div class="project">
                                                <img id="cover-imagePreview" alt="cover image" />
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
                                            <input type="text" id="project_title" name="project_title" class="form-input p4"/>
                                            <div class="labels">
                                                <p class="p5 placeholder">Enter your project title (Required)</p>
                                                <p class="p5 error" data-error="project_title"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="project_brief" id="to-title" class="h4">Project Brief*</label>
                                    <div class="input-group">
                                        <div class="input-field">
                                            <textarea type="text" id="project_brief" name="project_brief" class="form-input p4 form-area" maxlength="200"></textarea>
                                            <div class="labels">
                                                <p class="p5 placeholder">Say a little talk about your project (Required)</p>
                                                <p class="p5 error" data-error="project_brief"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="project_duration" id="to-title" class="h4">Project Duration*</label>
                                    <div class="input-group">
                                        <div class="input-field">
                                            <input type="text" id="project_duration" name="project_duration" class="form-input p4"/>
                                            <div class="labels">
                                                <p class="p5 placeholder">How long did you work on this project? (Required)</p>
                                                <p class="p5 error" data-error="project_duration"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="project_year" id="to-title" class="h4">Project Year*</label>
                                    <div class="input-group">
                                        <div class="input-field">
                                            <input type="text" id="project_year" name="project_year" class="form-input p4"/>
                                            <div class="labels">
                                                <p class="p5 placeholder">In what year did you complete this project? (Required)</p>
                                                <p class="p5 error" data-error="project_year"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="project_tools" id="to-title" class="h4">Tools Used*</label>
                                    <div class="input-group">
                                        <div class="input-field">
                                            <input type="text" id="project_tools" name="project_tools" class="form-input p4"/>
                                            <div class="labels">
                                                <p class="p5 placeholder">Enter your project tools seperated by a comma (Required)</p>
                                                <p class="p5 error" data-error="project_tools"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="project_problem" id="to-title" class="h4">Problem</label>
                                    <div class="input-group">
                                        <div class="input-field">
                                            <input type="text" id="project_problem_title" name="project_problem_title" class="form-input p4"/>
                                            <div class="labels">
                                                <p class="p5 placeholder">Enter a title (Required if you adding a problem)</p>
                                                <p class="p5 error" data-error="project_problem_title"></p>
                                            </div>
                                        </div>
                                        <div class="input-field">
                                            <textarea type="text" id="project_problem" name="project_problem" class="form-input p4 form-area" maxlength="500"></textarea>
                                            <div class="labels">
                                                <p class="p5 placeholder">What problem were you trying to solve? (Optional)</p>
                                                <p class="p5 error" data-error="project_problem"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="project_solution" id="to-title" class="h4">Solution</label>
                                    <div class="input-group">
                                        <div class="input-field">
                                            <input type="text" id="project_solution_title" name="project_solution_title" class="form-input p4"/>
                                            <div class="labels">
                                                <p class="p5 placeholder">Enter a title (Required if you adding a solution)</p>
                                                <p class="p5 error" data-error="project_solution_title"></p>
                                            </div>
                                        </div>
                                        <div class="input-field">
                                            <textarea type="text" id="project_solution" name="project_solution" class="form-input p4 form-area" maxlength="500"></textarea>
                                            <div class="labels">
                                                <p class="p5 placeholder">What was the solution? (Optional)</p>
                                                <p class="p5 error" data-error="project_solution"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="showReel-imagePreview" id="to-title" class="h4">Project Show-reel</label>
                                    <div class="img-upload input-group">
                                        <div class="input-field">
                                            <div class="labels">
                                                <p class="p5 placeholder">Add a show-reel for your project (Optional)</p>
                                                <p class="p5 error" data-error="project_show_reel"></p>
                                            </div>
                                            <input type="file" id="project_show_reel" name="project_show_reel" class="form-input p4" accept="image/gif" onchange="document.getElementById('showReel-imagePreview').src = window.URL.createObjectURL(this.files[0])"/>
                                            <label for="project_show_reel" class="choose-img-label col-100">
                                                <div class="project col-100">
                                                    <img id="showReel-imagePreview" alt="showReel image" />
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="process">
                                <div class="title-text">
                                    <h2>The process</h2>
                                    <p>Click on the "+" below to add a process</p>
                                    <br/><br/>
                                </div>
                                <div class="process-list d-flex"></div>
                                <div class="field-button-group d-flex d-flex-row flex-align-start">
                                    <div class="input-field field-set-field">
                                        <input type="hidden" id="process_filled" name="process_filled" class="form-input p4" value=""/>
                                        <input type="text" id="fieldset_title" name="fieldset_title" class="form-input p4" placeholder="Enter name of the process step" list="process_steps"/>
                                        <datalist id="process_steps">
                                            <option value="desk research">desk research</option>
                                            <option value="competitive analysis">competitive analysis</option>
                                            <option value="user interviews">user interviews</option>
                                            <option value="user persona">user persona</option>
                                            <option value="information architecture">information architecture</option>
                                            <option value="user flows">user flows</option>
                                            <option value="sketches">sketches</option>
                                            <option value="wireframes">wireframes</option>
                                            <option value="final design">final design</option>
                                            <option value="prototype">prototype</option>
                                            <option value="tests and feedback">tests and feedback</option>
                                            <option value="improvements/insights">improvements/insights</option>
                                            <option value="conclusion">conclusion</option>
                                        </datalist>
                                    </div>
                                    <a class="p5 secondary add-process" id="tag-single">+ Add process step</a>
                                </div>
                            </div>
                        </div>
                        <button class="btn" type="submit" id="add-project">
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
        <div class="success-message pop-up">
            <i class="las la-check"></i>
            <p class="p5"></p>
        </div>

        <?php
            include './public/components/footer.php';
        ?>
    </body>

    </html>
    