<?php
    switch(true){
        case empty($_POST['name']):
            echo 'Please enter your name.<br/>';
        break;
        case empty($_POST['email']):
            echo 'Please enter your email address.<br/>';
        break;
        case empty($_POST['phone']):
            echo 'Please enter your phone number.<br/>';
        break;
        default:
            echo 'Successful!';
        break;
    }