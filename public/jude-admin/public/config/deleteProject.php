<?php

	require_once 'config.php';

	$project_unique_id = $_GET['id'];

    $root = $_SERVER['DOCUMENT_ROOT'] . "/../";
    $directory = $root . 'assets/files/uploads/' . $project_unique_id;

	$projectClass = new Project;

	$deleteProject = $projectClass->deleteProjectData($project_unique_id);
    array_map('unlink', glob("$directory/*.*"));
    rmdir($directory);

    echo $deleteProject ? 'success' : $deleteProject;
