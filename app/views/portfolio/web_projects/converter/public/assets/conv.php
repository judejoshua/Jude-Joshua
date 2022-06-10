<?php
    //-----------------------------------------------------------------------------------------------------------------------
        require_once 'conn.php';
    //-----------------------------------------------------------------------------------------------------------------------
        if(isset($_POST['currency'], $_POST['to'])){
            $currency = htmlspecialchars(stripslashes(mysqli_real_escape_string($db, $_POST['currency'])));
            if (!empty($_POST['to'])){
                $to = htmlspecialchars(stripslashes(mysqli_real_escape_string($db, $_POST['to'])));
            }else{
                $to = 0;
            }       

            $sql = $db->prepare("SELECT * FROM `converter` WHERE `from_currency` = ?");
            $sql->bind_param("s", $currency);
            if($sql->execute()){
                $result = $sql->get_result();
                $row = $result->fetch_assoc();

                $value = $to * $row['rate'];
                
                $converted = $row['to_currency'].' '.$value;
                echo $converted;
            };
        }else{
            echo 'Please enter all input correctly';
        }
    //-----------------------------------------------------------------------------------------------------------------------
