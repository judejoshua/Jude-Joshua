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
                            <h5>Return to Portfolio Page</h5>
                        </a>
                        <div class="title-text">
                            <h1>Add a new Project</h1>
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
                            <div class="form-group">
                                <label for="project_type" id="to-title" class="h4">Project Type*</label>
                                <div class="input-group">
                                    <div class="input-field">
                                        <select id="project_type" name="project_type" class="form-input p4">
                                            <option value="" selected hidden>Choose project type</option>
                                            <option value="UI/UX">UI/UX</option>
                                            <option value="Web development">Website development</option>
                                            <option value="UI/UX, Web development">Both</option>
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
                                    <label for="project_description" id="to-title" class="h4">Project Mini Description*</label>
                                    <div class="input-group">
                                        <div class="input-field">
                                            <textarea type="text" id="project_description" name="project_description" class="form-input p4 form-area" maxlength="200"></textarea>
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
                                            <input type="text" id="project_tags" name="project_tags" class="form-input p4"/>
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
                                            <textarea type="text" id="project_about" name="project_about" class="form-input p4 form-area" maxlength="2000"></textarea>
                                            <div class="labels">
                                                <p class="p5 placeholder">Let's talk about the client and what they intend to achieve with the project in details (Required)</p>
                                                <p class="p5 error" data-error="project_about"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="project_problem_statement" id="to-title" class="h4">Problem Statement*</label>
                                    <div class="input-group">
                                        <div class="input-field">
                                            <textarea type="text" id="project_problem_statement" name="project_problem_statement" class="form-input p4 form-area" maxlength="2000"></textarea>
                                            <div class="labels">
                                                <p class="p5 placeholder">What problem were you trying to solve (Required)</p>
                                                <p class="p5 error" data-error="project_problem_statement"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="project_solution" id="to-title" class="h4">Solution*</label>
                                    <div class="input-group">
                                        <div class="input-field">
                                            <textarea type="text" id="project_solution" name="project_solution" class="form-input p4 form-area" maxlength="1000"></textarea>
                                            <div class="labels">
                                                <p class="p5 placeholder">What was the solution? (Required)</p>
                                                <p class="p5 error" data-error="project_solution"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="project_recommendation" id="to-title" class="h4">Recommendation*</label>
                                    <div class="input-group">
                                        <div class="input-field">
                                            <textarea type="text" id="project_recommendation" name="project_recommendation" class="form-input p4 form-area" maxlength="1000"></textarea>
                                            <div class="labels">
                                                <p class="p5 placeholder">Any recommendations? (Required)</p>
                                                <p class="p5 error" data-error="project_recommendation"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="project_role" id="to-title" class="h4">Role*</label>
                                    <div class="input-group">
                                        <div class="input-field">
                                            <input type="text" id="project_role" name="project_role" class="form-input p4"/>
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
                                            <input type="text" id="project_duration" name="project_duration" class="form-input p4"/>
                                            <div class="labels">
                                                <p class="p5 placeholder">How long did you work on this project? (Required)</p>
                                                <p class="p5 error" data-error="project_duration"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group hidden" id="ui-ux">
                                <fieldset id="ux">
                                    <legend>UX Design</legend>
                                    <div class="form-group">
                                        <label for="project_ux-design" id="to-title" class="h4"></label>
                                        <div class="input-group">
                                            <div class="input-field">
                                                <textarea type="text" id="project_ux-design" name="project_ux-design" class="form-input p4 form-area" maxlength="1000"></textarea>
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
                                                    <textarea type="text" id="project_research-summary" name="project_research-summary" class="form-input p4 form-area" maxlength="1000"></textarea>
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
                                            <div class="img-upload input-group d-flex flex-wrap">
                                                <div class="d-flex flex-wrap" id="img-container" data-type="research">
                                                    <div class="input-field" id="research_img">
                                                        <input type="file" id="research_img-1" name="research_img[]" class="form-input p4" accept="image/webp" onchange="document.getElementById('research-imagePreview-1').src = window.URL.createObjectURL(this.files[0])"/>
                                                        <label for="research_img-1" class="choose-img-label">
                                                            <div class="project">
                                                                <img id="research-imagePreview-1" alt="research image" />
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
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
                                                    <textarea type="text" id="project_personae-summary" name="project_personae-summary" class="form-input p4 form-area" maxlength="1000"></textarea>
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
                                            <div class="img-upload input-group d-flex flex-wrap">
                                                <div class="d-flex flex-wrap" id="img-container" data-type="personae">
                                                    <div class="input-field" id="personae_img">
                                                        <input type="file" id="personae_img-1" name="personae_img[]" class="form-input p4" accept="image/webp" onchange="document.getElementById('personae-imagePreview-1').src = window.URL.createObjectURL(this.files[0])"/>
                                                        <label for="personae_img-1" class="choose-img-label">
                                                            <div class="project">
                                                                <img id="personae-imagePreview-1" alt="personae image" />
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
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
                                                <textarea type="text" id="project_ui-design" name="project_ui-design" class="form-input p4 form-area" maxlength="1000"></textarea>
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
                                                    <textarea type="text" id="project_wireframes-summary" name="project_wireframes-summary" class="form-input p4 form-area" maxlength="1000"></textarea>
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
                                            <div class="img-upload input-group d-flex flex-wrap">
                                                <div class="d-flex flex-wrap" id="img-container" data-type="wireframes">
                                                    <div class="input-field" id="wireframes_img">
                                                        <input type="file" id="wireframes_img-1" name="wireframes_img[]" class="form-input p4" accept="image/webp" onchange="document.getElementById('wireframes-imagePreview-1').src = window.URL.createObjectURL(this.files[0])"/>
                                                        <label for="wireframes_img-1" class="choose-img-label">
                                                            <div class="project">
                                                                <img id="wireframes-imagePreview-1" alt="wireframes image" />
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
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
                                                    <textarea type="text" id="project_hiFI-summary" name="project_hiFI-summary" class="form-input p4 form-area" maxlength="1000"></textarea>
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
                                            <div class="img-upload input-group d-flex flex-wrap">
                                                <div class="d-flex flex-wrap" id="img-container" data-type="hiFI">
                                                    <div class="input-field" id="hiFI_img">
                                                        <input type="file" id="hiFI_img-1" name="hiFI_img[]" class="form-input p4" accept="image/webp" onchange="document.getElementById('hiFI-imagePreview-1').src = window.URL.createObjectURL(this.files[0])"/>
                                                        <label for="hiFI_img-1" class="choose-img-label">
                                                            <div class="project">
                                                                <img id="hiFI-imagePreview-1" alt="hiFI image" />
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <span id="tag-single" class="add-more-images">Add another image</span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <fieldset id="web" class="hidden">
                                <legend>Project Website</legend>
                                <div class="form-group">
                                    <label for="project_website" id="to-title" class="h4">Project Website*</label>
                                    <div class="input-group">
                                        <div class="input-field">
                                            <input type="url" id="project_website" name="project_website" class="form-input p4"/>
                                            <div class="labels">
                                                <p class="p5 placeholder">Enter the website of the project (Required)</p>
                                                <p class="p5 error" data-error="project_website"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <button class="btn" type="submit">
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
            <p class="p5">Your form message was sent successfullly. Please expect my response in the next few minutes.</p>
        </div>

        <?php
            include './public/components/footer.php';
        ?>
    </body>

    </html>
    