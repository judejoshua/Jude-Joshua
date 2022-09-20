<?php

class Login extends Controller
{
    public function __construct()
    {
        if(isset($_SESSION['auid']))
        {
            $redirect = $this->model('Redirect');
            $page = '/';
            $redirect->redirectTo($page);
        }
        else
        {
            return false;
        }
    }

    public function index()
    {
        $this->view('login/index', [

        ]);
    }
    
}