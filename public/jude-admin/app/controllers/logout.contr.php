<?php

class Logout extends Controller
{

    public function __construct()
    {
        $session = $this->model('Session');
        $session->killSessions();

        $redirect = $this->model('Redirect');
        $page = '/login';
        $redirect->redirectTo($page);
    }
    
}