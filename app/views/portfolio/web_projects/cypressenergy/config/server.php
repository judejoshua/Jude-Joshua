<?php

    $errors = array();
    $successes = array();
    $db = mysqli_connect('localhost', 'judegniz_web_projects', 'web_projects234#', 'judegniz_cypressenergy');
    if(! $db ) {
        die('Could not connect to the database: ' . mysqli_connect_error());
    }

?>
