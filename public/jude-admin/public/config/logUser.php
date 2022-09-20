<?php

	require_once 'config.php';

    $session = new Session();
    $session->startSession();

	$password = $_GET['input'];

    $userClass = new User();
	$auth = $userClass->getAuth();

    if (password_verify($password, $auth[0]['auth_code']))
    {
        $_SESSION['auid'] = '1fwf';
        echo 'success';
    }
    else 
    {
        echo 'The password you entered is incorrect.';
        exit();
    }
