    <?php
        $title = 'Error 403';
        include './public/components/error-header.php';
    ?>

    </head>

    <body id="admin-landing">
        <section class="error">
            <div class="results-error-title">
                <h1>4<i class="las la-ban"></i>3</h1>
                <p>You're not allowed in here!</p>
            </div>
            <div class="results-error-description">
                <p class="p5">Your visitor's badge does not have the access to view this.</br>Try this links instead:</p>
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