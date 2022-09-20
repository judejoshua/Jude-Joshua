<?php
    $title = '';
    include './public/components/header.php';
?>
    </head>

    <body id="admin-landing" class="admin-login">
        <div class="admin results-section">
            <div class="results-section-title">
                <p class="p3">Hi there, enter the system password below to continue.</p>
                <div>
                    <div class="input-field d-flex-row flex-align-end">
                        <div class="d-flex d-flex-column flex-align-end">
                            <input type="password" id="password_input" name="password_input" class="form-input h1"/>
                            <div class="labels">
                                <p class="p5 placeholder"></p>
                                <p class="p5 error" data-error="password_input"></p>
                            </div>
                        </div>
                        <p class="p4"><a id="login-submit" data-role="login">Continue</a></p>
                    </div>
                </div>
            </div>
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