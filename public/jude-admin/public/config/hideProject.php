<?php

    require_once 'config.php';

    $project_unique_id = $_GET['id'];

    $projectClass = new Project;

    $projectData = $projectClass->getProjectData($project_unique_id);


    if($projectData[0]['hidden'] == '0')
    {
        $hide = '1';

        $deleteProject = $projectClass->hideProjectData($hide, $project_unique_id);

        echo $deleteProject ? 'success=Your project was hidden successfully' : $deleteProject;
    }else{
        $hide = '0';

        $deleteProject = $projectClass->showProjectData($hide, $project_unique_id);

        echo $deleteProject ? 'success=Your project was shown successfully' : $deleteProject;
    }
