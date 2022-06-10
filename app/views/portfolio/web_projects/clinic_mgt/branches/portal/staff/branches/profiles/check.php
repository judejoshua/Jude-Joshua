<?php

    require_once('../../config/server.php');

    $query = "SELECT * FROM `specialties` ";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='". $row['specialty']."'>".$row['specialty']."";
    }
?>