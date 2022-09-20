<?php

	require_once 'config.php';


	if(empty($_POST['project_type']))
	{
		echo "error=project_type=You need to select a project type!";
	}else {
        $projectClass = new Project;

        $project_unique_id = uniqid();

        $root = $_SERVER['DOCUMENT_ROOT'] . "/../";
        $directory = $root . 'assets/files/uploads/' . $project_unique_id;

        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $project_img_directory = '/public/assets/files/uploads/' . $project_unique_id . '/';

        $project_type = $_POST['project_type'];

        $project_duration = $_POST['project_duration'];
        
        $project_year = $_POST['project_year'];

        $project_cover_img = $_FILES["project_cover_img"]["name"];

        if (empty($project_cover_img)) {
            echo "error=project_cover_img=Select a cover image for your project";
            exit();
        } else {
            $tmp = $_FILES['project_cover_img']['tmp_name'];

            $explode = explode('.', $project_cover_img);
            $ext = end($explode);
            $project_cover_img = uniqid() . '.' . $ext;

            $cover_move = $directory . "/" . $project_cover_img;

            $uploaded = move_uploaded_file($tmp, $cover_move);
        }

        $general_project_data = array_slice($_POST, 1, 8);
        $project_process = array_slice($_POST, 9);

        foreach ($general_project_data as $key => $value) {
            if ($key == 'project_title' || $key == 'project_brief' || $key == 'project_duration' || $key == 'project_tools' || $key = 'project_year') {
                if ($value == '') {
                    echo "error=" . $key . "=You need to enter a " . ucwords(str_replace("_", " ", $key));
                    exit();
                }
            }

            $general_project_data[$key] = nl2br($value);
        }

        unset($project_process['process_filled']);
        unset($project_process['fieldset_title']);
        unset($general_project_data['project_duration']);
        unset($general_project_data['project_year']);
        unset($general_project_data['project_problem_statement']);
        unset($general_project_data['project_problem_statement_title']);
        unset($general_project_data['project_solution_title']);
        unset($general_project_data['project_solution']);

        //add the project problem and the solution
        $general_project_data['project_problem'] = array(
            'problem' => $_POST['project_problem_title'],
            'problem_details' => $_POST['project_problem']
        );
        $general_project_data['project_solution'] = array(
            'solution' => $_POST['project_solution_title'],
            'solution_details' => $_POST['project_solution']
        );

        //add the project show reel
        $project_show_reel = $_FILES['project_show_reel']["name"];
        if(!empty($project_show_reel))
        {
            $tmp = $_FILES['project_show_reel']['tmp_name'];

            $explode = explode('.', $project_show_reel);
            $ext = end($explode);
            $project_show_reel = uniqid() . '.' . $ext;

            $project_show_reel_move = $directory . "/" . $project_show_reel;

            $uploaded = move_uploaded_file($tmp, $project_show_reel_move);
        }
        $general_project_data['project_show_reel'] = $project_show_reel;

        //add the project process
        if($_POST['process_filled'] == '1')
        {
            foreach ($project_process as $step => $value) {
                $project_process_step = explode('-', $step)[0];

                $general_project_data['project_process'][$project_process_step] = array(
                    'summary' => nl2br($value),
                    $project_process_step . '_img' => filter_var_array($_FILES[$project_process_step . '_img']["name"]),
                );
            }
        }else{
            echo "Please add at least one step that you took to make this project a success.";
            exit();
        }

		//process the project process image files
		$general_project_data['project_process'] = check_array_images(array_filter($general_project_data['project_process']), $directory);

		$project_data = json_encode($general_project_data, true);

		$addProject = $projectClass->addProjectData($project_unique_id, $project_type, $project_cover_img, $project_img_directory, $project_data, $project_duration, $project_year);
		echo $addProject ? 'success' : $addProject;
	}


	function check_array_images($array, $directory)
	{
		foreach ($array as $key => $value)
		{
			if(is_array($value))
			{
				foreach ($value as $inside_key => $img_array)
				{
					if(is_array($img_array))
					{
						foreach ($img_array as $inside_img_array => $inside_img_array_value)
						{
							$img_array = array_filter($img_array);
								
							$name = $_FILES[$inside_key]['name'][$inside_img_array];
							$tmp = $_FILES[$inside_key]['tmp_name'][$inside_img_array];

							if($name !== '')
							{
								$explode = explode('.', $name);
								$ext = end($explode);
								$new_img_name = uniqid().'.'.$ext;

								$move = $directory."/".$new_img_name;

								$uploaded = move_uploaded_file($tmp, $move);//move the image to the $directory
							}else{
								$new_img_name = '';
							}

							$array[$key][$inside_key][$inside_img_array] = $new_img_name;

						}
						$array[$key][$inside_key] = array_filter($array[$key][$inside_key]);
					}
					$array[$key] = array_filter($array[$key]);
				}
			}
		}

		$array = array_filter($array);
		return $array;
	}
