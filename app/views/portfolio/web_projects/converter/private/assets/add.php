<?php
    //-----------------------------------------------------------------------------------------------------------------------
        require_once 'conn.php';
    //-----------------------------------------------------------------------------------------------------------------------
        if(isset($_POST['from'], $_POST['to'], $_POST['rate'])){
            $from = htmlspecialchars(stripslashes(mysqli_real_escape_string($db, $_POST['from'])));

            $to = htmlspecialchars(stripslashes(mysqli_real_escape_string($db, $_POST['to'])));

            $rate = htmlspecialchars(stripslashes(mysqli_real_escape_string($db, $_POST['rate'])));
            $drate = 1/$rate;
            $inrate = number_format((float)$drate, 5, '.', '');

            $set = $db->prepare("INSERT INTO `converter`(`from_currency`, `to_currency`, `rate`) VALUES (?,?,?)");
            $set->bind_param("ssi", $from, $to, $rate);
            if ($set->execute()) {
                $set->close();
                $set = $db->prepare("INSERT INTO `converter`(`from_currency`, `to_currency`, `rate`) VALUES (?,?,?)");
                $set->bind_param("ssd", $to, $from, $inrate);
                if ($set->execute()) {
                    $set->close();
                    echo 'Successful!';
                } else {
                    echo 'Oops! There was an unusual error. Please try again in a few minutes.';
                }
            }
        }else{
            echo 'Please enter all input correctly';
        }
    //-----------------------------------------------------------------------------------------------------------------------
