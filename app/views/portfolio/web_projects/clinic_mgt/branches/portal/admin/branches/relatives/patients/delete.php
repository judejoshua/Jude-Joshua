<?php

    include('../../../config/server.php');

    $id = $_GET['id'];

    $sql = mysqli_query($db, "DELETE FROM `patients` WHERE `p_id`='".$id."' ");
    if($sql){
        $search = mysqli_query($db, "SELECT * FROM `inhouse` WHERE `p_id`='".$id."' LIMIT 1");
        $count_details = mysqli_num_rows($search);
        if($count_details == 1){
            $in_sql = mysqli_query($db, "DELETE FROM `inhouse` WHERE `p_id`='".$id."' ");
            $in_reset = mysqli_query($db, "ALTER TABLE `inhouse` AUTO_INCREMENT = 1");
        }else{
            $search_details = mysqli_query($db, "SELECT * FROM `visiting` WHERE `p_id`='".$id."' LIMIT 1");
            $count__search_details = mysqli_num_rows($search_details);
            if($count_search_details == 1){
                $vis_sql = mysqli_query($db, "DELETE FROM `visiting` WHERE `p_id`='".$id."' ");
                $vis_reset = mysqli_query($db, "ALTER TABLE `visiting` AUTO_INCREMENT = 1");    
            }
        }

        $reset = mysqli_query($db, "ALTER TABLE `patients` AUTO_INCREMENT = 1");
        header('Location: ../');
    }else{
        echo 'Error deleting Patient records!';
    }

?>