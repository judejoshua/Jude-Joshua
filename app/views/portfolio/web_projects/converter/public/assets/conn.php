<?php

    $db = new mysqli(
        $host = 'localhost',
        $user = 'judegniz_web_projects',
        $password = 'web_projects234#',
        $database = 'judegniz_converter',
        $port = '3306'//,
        //$socket = '',
    );
    
    if ($db -> connect_error) {
        die('Unexpected Error! Could not connect to the database:');
    }

    date_default_timezone_set('Africa/Lagos');
    session_start();

