<?php

    $db = new mysqli(
        $host = 'localhost',
        $user = 'root',
        $password = 'zQ1v0JFtFtfhDIqd',
        $database = 'converter',
        $port = '3306'//,
        //$socket = '',
    );
    
    if ($db -> connect_error) {
        die('Unexpected Error! Could not connect to the database:');
    }

    date_default_timezone_set('Africa/Lagos');
    session_start();

