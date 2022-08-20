    <?php
        $title = 'Internal server Error';
        include './public/components/error-header.php';
    ?>
    
    </head>

    <body id="home-landing">
        
        <div class="wrapper" id="top">
            <article id="body">
                <section class="error">
                    <div class="results-error-title">
                        <h1>5<i class="lar la-grin-beam-sweat"></i><i class="las la-grin-beam-sweat"></i></h1>
                        <p class="h4">Internal Server Error</p>
                    </div>
                    <div class="results-error-description">
                        <p class="p4">Don't worry, it's not your fault. I was working and broke something. It will be fixed shortly.<br/>Try again with any of these links:</p>
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