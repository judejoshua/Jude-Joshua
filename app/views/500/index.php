    <?php
        $title = 'Error 500';
        include './public/components/error-header.php';
    ?>
    
    </head>

    <body id="home-landing">
        
        <div class="wrapper" id="top">
            <article id="body">
                <section class="error">
                    <div class="results-error-title">
                        <h1>5<i class="lar la-grin-beam-sweat"></i><i class="las la-grin-beam-sweat"></i></h1>
                        <p>Internal Server Error</p>
                    </div>
                    <div class="results-error-description">
                        <p class="p5">Don't worry, it's not your fault. I was working and broke something.</br>It will be fixed shortly.</p>
                    </div>
                </section>
            </article>
        </div>
        <?php
            include './public/components/error-footer.php';
        ?>
    </body>

    </html>