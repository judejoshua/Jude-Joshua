    <?php
        $title = 'Error 404';
        include './public/components/error-header.php';
    ?>
    
    </head>

    <body id="admin-landing">
        <section class="error">
            <div class="results-error-title">
                <h1>4<i class="las la-low-vision"></i>4</h1>
                <p>File could not be located</p>
            </div>
            <div class="results-error-description">
                <p class="p5">I didn't see a need for the file, so I moved it out.</br>Try this links instead:</p>
                <div class="return-links">
                    <a href="/">Home</a>
                    <a href="/portfolio">Portfolio</a>
                </div>
            </div>
        </section>
        <?php
            include './public/components/footer.php';
        ?>
    </body>

    </html>