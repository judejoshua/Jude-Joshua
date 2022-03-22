<?php

class Home extends Controller
{
    public function index()
    {
        // $User = $this->model('User');//calling the class

        $this->view('home/index', [

        ]);
    }
    
}