<?php

class Portfolio extends Controller
{
    public  function index()
    {
        $this->view('portfolio/index', [

        ]);
    }

    public  function case_study()
    {
        $this->view('portfolio/case_study/index', [

        ]);
    }

    
}