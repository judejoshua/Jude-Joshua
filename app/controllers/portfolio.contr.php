<?php

class Portfolio extends Controller
{
    public function index()
    {
        $projectClass = $this->model('Project');

        $projectList = $projectClass->getProjectList();
        
        $case_studies = 0;
        $ui = 0;
        foreach ($projectList as $key => $project)
        {
            if($project['project_type'] !== 'UI(Visual) design'){
                $case_studies++;
            }else if($project['project_type'] == 'UI(Visual) design'){
                $ui++;
            }
        }
        
        $this->view('portfolio/index', [
            
            'projectList' => $projectList,
            'ui' => $ui,
            'case_studies' => $case_studies

        ]);
    }

    public function case_study($project_unique_id)
    {
        $projectClass = $this->model('Project');

        $projectData = $projectClass->getProjectData($project_unique_id);
        
        if($projectData != []){
            $this->view('portfolio/case_study/index', [
                
                'projectData' => $projectData
    
            ]);
        }else{
             $this->view('404/index', [
    
            ]);
        }

    }
    
}