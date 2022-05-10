<?php

class Home extends Controller
{
    public function index()
    {
        $projectClass = $this->model('Project');

        $projectList = $projectClass->getProjectList();

        $this->view('home/index', [

            'projectList' => $projectList

        ]);
    }
    
}