<?php

    include('../../../config/server.php');

    $id = $_GET['id'];

    $search = mysqli_query($db, "SELECT `p_id` FROM `appointments` WHERE `p_id`='".$id."' LIMIT 1");
    $view = mysqli_num_rows($search);

    if($view > 0){
        $sql = mysqli_query($db, "UPDATE `appointments` SET `request_status`='Ongoing' WHERE `p_id`='".$id."' ");
        
        header('location: ../view.php/?id='.$id.' ');
        exit();
    }else{
        echo 'Error Checking in patient.';
    }


?>