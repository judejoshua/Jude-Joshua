<?php

    include('../../../config/server.php');

    $id = $_GET['id'];

    $search = mysqli_query($db, "SELECT * FROM `management` WHERE `name`='".$id."'");
    $view = mysqli_fetch_array($search);

    $role = $view['role'];

    $sql = mysqli_query($db, "DELETE FROM `management` WHERE `name`='".$id."' ");
    if($sql){
        $sql = mysqli_query($db, "DELETE FROM $role WHERE `name`='".$id."' ");
        $reset = mysqli_query($db, "ALTER TABLE `management` AUTO_INCREMENT = 1");
        $reset_two = mysqli_query($db, "ALTER TABLE $role AUTO_INCREMENT = 1");
        header('Location: ../');
    }else{
        echo 'Error deleting user records!';
    }

?>