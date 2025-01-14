<?php

class Portfolio extends Controller
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
        $projectClass = new Project;

        $projectList = $projectClass->getProjectList();

        $this->view('portfolio/index', [
            
            'projectList' => $projectList

        ]);
    }

    public function add()
    {
        $this->view('portfolio/add/index', [

        ]);
    }

    public function case_study($project_unique_id)
    {
        $projectClass = new Project;

        $projectData = $projectClass->getProjectData($project_unique_id);

        $this->view('portfolio/case_study/index', [
            
            'projectData' => $projectData

        ]);
    }

    public function edit($project_unique_id)
    {
        $projectClass = new Project;

        $projectData = $projectClass->getProjectData($project_unique_id);

        $this->view('portfolio/edit/index', [
            
            'projectData' => $projectData

        ]);
    }


    
}