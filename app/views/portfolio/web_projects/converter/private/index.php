<?php
    require ('./assets/conn.php');

?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="author" content="Mite Systems">
        <meta name="description" content="">
        <meta name="format-detection" content="telephone=no">
        <meta name="keywords" content="">

        <title>Converter</title>

        <link rel="stylesheet" type="text/css" media="screen" href="" />
    </head>

    <body>
        <div class="divWrap fade">
            <div class="form converter">
                <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="converter-form" id="converter-form">
                    <div class="form-content">
                        <div class="form-group header">
                            <p>Please enter currency details below...</p>
                        </div>
                        <div class="form-group">
                            <label for="from"></label>
                            <input type="text" id="from" name="from" title="Three letters max" placeholder="Enter Base Currency" size="20" minlength="3" maxlength="3">
                        </div>
                        <div class="form-group">
                            <label for="to"></label>
                            <input type="text" id="to" name="to" title="Three letters max" placeholder="Enter To Currency" size="20" minlength="3" maxlength="3">
                        </div>
                        <div class="form-group">
                            <label for="rate"></label>
                            <input type="number" id="rate" name="rate" title="Enter currency rate" placeholder="Enter conversion rate" size="20">
                        </div>
                        <div class="form-group error-hold fader" style="border-top: none; padding: 0px;">
                            <div class="error">
                                <p id="error"></p>
                                <p id="success"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="converter" id="converter-button">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="./assets/js/jquery-3.2.1.min.js"></script>
    <script src="./assets/js/pri.js"></script>
</html>