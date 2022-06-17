<?php

class Errors extends Controller
{
    public function index()
    {
        $this->view('500/index', [

        ]);
    }

    public function not_found()
    {
        // $controller = new Controller;
        $this->view('404/index', [

        ]);
    }

    public function restricted()
    {
        $this->view('403/index', [

        ]);
    }

    
}