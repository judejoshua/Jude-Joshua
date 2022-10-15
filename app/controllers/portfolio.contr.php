<?php

class Portfolio extends Controller
{
    public function index()
    {
        $projectClass = $this->model('Project');

        $projectList = $projectClass->getProjectList();
        
        $ui_ux = 0;
        $ui = 0;
        $web = 0;
        foreach ($projectList as $key => $project)
        {
            if($project['project_type'] == 'UI/UX design'){
                $ui_ux++;
            }else if($project['project_type'] == 'UI(Visual) design'){
                $ui++;
            }else{
                $web++;
            }
        }
        
        $this->view('portfolio/index', [
            
            'projectList' => $projectList,
            'web' => $web,
            'ui' => $ui,
            'ui_ux' => $ui_ux

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