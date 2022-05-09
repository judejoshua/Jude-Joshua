<?php

class Errors extends Controller
{
    public function index()
    {
        $this->view('500/index', [

        ]);
    }

    public static function not_found()
    {
        $controller = new Controller;
        $controller->view('404/index', [

        ]);
    }

    public function restricted()
    {
        $this->view('403/index', [

        ]);
    }

    
}