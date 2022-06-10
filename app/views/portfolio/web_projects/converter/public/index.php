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
                            <p>Please enter your base currency amount below...</p>
                        </div>
                        <div class="form-group">
                            <label for="currency"></label>
                            <select id="currency" name="currency" required>
                                <option disabled selected>Select a currency</option>
                                <?php
                                    $sql = $db->prepare("SELECT `from_currency` FROM `converter`");
                                    $sql->execute();
                                    $result = $sql->get_result();
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' .$row['from_currency']. '">' .$row['from_currency']. '</option>';
                                        }
                                    } else {
                                        echo '<option value="none">No currencies found!</option>';
                                    }
                                    $db->close();
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="to"></label>
                            <input type="number" id="to" name="to" placeholder="Enter amount" size="20" min="0" max="2000000000">
                        </div>
                        <div class="form-group">
                            <h1 id="coverted"></h1>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="./assets/js/jquery-3.2.1.min.js"></script>
    <script src="./assets/js/pub.js"></script>
</html>