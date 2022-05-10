<?php

class Portfolio extends Controller
{
    public function index()
    {
        $projectClass = $this->model('Project');

        $projectList = $projectClass->getProjectList();

        $this->view('portfolio/index', [
            
            'projectList' => $projectList

        ]);
    }

    public function case_study($project_unique_id)
    {
        $projectClass = $this->model('Project');

        $projectData = $projectClass->getProjectData($project_unique_id);

        $this->view('portfolio/case_study/index', [
            
            'projectData' => $projectData

        ]);
    }
    
}