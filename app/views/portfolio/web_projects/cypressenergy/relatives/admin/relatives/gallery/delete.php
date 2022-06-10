<?php

    include('../../config/server.php');

    $id = $_GET['id'];

    $search = mysqli_query($db, "SELECT * FROM `gallery` WHERE `id`='".$id."'");
    $view = mysqli_fetch_array($search);

    $sql = mysqli_query($db, "DELETE FROM `gallery` WHERE `id`='".$id."' ");
    if($sql){
        $sql = mysqli_query($db, "DELETE FROM `gallery` WHERE `id`='".$id."' ");
        $reset = mysqli_query($db, "ALTER TABLE `gallery` AUTO_INCREMENT = 1");
        header('Location: ../');
    }else{
        echo 'Error deleting user records!';
    }

?>
