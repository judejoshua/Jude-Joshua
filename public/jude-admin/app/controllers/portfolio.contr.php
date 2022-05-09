<?php

class Portfolio extends Controller
{
    public  function index()
    {
        $this->view('portfolio/index', [

        ]);
    }

    public  function add()
    {
        $this->view('portfolio/add/index', [

        ]);
    }

    
}