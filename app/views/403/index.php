    <?php
        $title = 'Access Denied! - Jude Joshua | Top Product Designer for Businesses and Brands';
        $description = 'Error 403';
        include './public/components/error-header.php';
    ?>
    
    </head>

    <body id="home-landing">
        
        <div class="wrapper" id="top">
            <article id="body">
                <section class="error">
                    <div class="results-error-title">
                        <h1>4<i class="las la-ban"></i>3</h1>
                        <p class="h4">You're not allowed in here!</p>
                    </div>
                    <div class="results-error-description">
                        <p class="p4">Your visitor's badge does not have the access to view this. Try this links instead:</p>
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