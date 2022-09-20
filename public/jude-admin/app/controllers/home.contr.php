<?php

class Home extends Controller
{
    public function __construct()
    {
        if(!isset($_SESSION['auid']))
        {
            $redirect = $this->model('Redirect');
            $page = '/login';
            $redirect->redirectTo($page);
        }
        else
        {
            return false;
        }
    }

    public function index()
    {
        $this->view('home/index', [

        ]);
    }
    
}