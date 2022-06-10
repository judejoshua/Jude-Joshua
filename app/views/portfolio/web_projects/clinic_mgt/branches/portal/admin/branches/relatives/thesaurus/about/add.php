<?php

    include('../../../../config/server.php');

    $confirmrows = mysqli_query($db, "SELECT * FROM `services_info`");
    $query_confirmrows = mysqli_num_rows($confirmrows);
    if($query_confirmrows < 5){
        $sql = mysqli_query($db, "INSERT INTO `services_info`(  `icon`, `title`, `text`) VALUES ('', '', '')");
        if($sql){
            mysqli_close($db);
            header('location: ./');
        };
    }else{
        mysqli_close($db);
        echo 'Max Services of 5 reached! Cannot add more!!<a href="./">Cancel</a>';
    };



?>