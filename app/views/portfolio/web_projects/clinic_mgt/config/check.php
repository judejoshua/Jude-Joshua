<?php

    require_once('server.php');

    $query = "SELECT * FROM `specialties` ";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='". $row['specialty']."'>".$row['specialty']."";
    }
?>