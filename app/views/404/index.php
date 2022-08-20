    <?php
        $title = 'Not found!';
        include './public/components/error-header.php';
    ?>
    </head>

    <body id="home-landing">
        
        <div class="wrapper" id="top">
            <article id="body">
                <section class="error">
                    <div class="results-error-title">
                        <h1>4<i class="las la-low-vision"></i>4</h1>
                        <p>File could not be located</p>
                    </div>
                    <div class="results-error-description">
                        <p class="p5">I didn't see a need for the file, so I moved it out. Try this links instead:</p>
                        <div class="return-links">
                            <a href="/">Home</a>
                            <a href="/about">About Me</a>
                            <a href="/portfolio">Past works</a>
                            <a href="/cv">CV</a>
                            <a href="/contact">Send a message</a>
                        </div>
                    </div>
                </section>
            </article>
        </div>
        <?php
            include './public/components/error-footer.php';
        ?>
    </body>

    </html>