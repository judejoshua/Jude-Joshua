<?php

	require_once 'config.php';

	$project_unique_id = $_GET['id'];

	$projectClass = new Project;

	$deleteProject = $projectClass->deleteProjectData($project_unique_id);
		echo $deleteProject == true ? 'success' : $deleteProject;
