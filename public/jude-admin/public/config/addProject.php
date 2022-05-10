<?php

	require_once 'config.php';

	$projectClass = new Project;

	$project_unique_id = uniqid();

	$root = $_SERVER['DOCUMENT_ROOT']."/../";
	$directory = $root.'includes/assets/files/uploads/' . $project_unique_id;

	$project_img_directory = '/public/includes/assets/files/uploads/' . $project_unique_id .'/';

	$project_type = $_POST['project_type'];

	$project_duration = $_POST['project_duration'];

	if($project_type == "")
	{
		echo "error=project_type=You need to select a project type!";
	}else{

		$project_cover_img = $_FILES["project_cover_img"]["name"];

		if(empty($project_cover_img))
		{
			echo "error=project_cover_img=Select a cover image for your project";
			exit();
		}else{
	        $tmp = $_FILES['project_cover_img']['tmp_name'];

			$explode = explode('.', $project_cover_img);
	        $ext = end($explode);
	        $project_cover_img = uniqid().'.'.$ext;

	        if (!is_dir($directory)) {
			    mkdir($directory, 0755, true);
			}

	        $fold = $directory."/".$project_cover_img;

	        $uploaded = move_uploaded_file($tmp, $fold);//move the image to the $directory
		}

		$general_project_data = array_slice($_POST, 1, 7);

		foreach ($general_project_data as $key => $value)
		{
			if($value ==  '')
			{
				echo "error=".$key."=You need to enter an input for ".ucwords(str_replace("_", " ", $key));
				exit();
			}
		}

		switch ($project_type)
		{
			case 'UI/UX':
				$general_project_data['UX Design'] = array(
					'summary' => $_POST['project_ux-design'],
					'User Research' => array(
						'summary' => $_POST['project_research-summary'],
						'research_img' => filter_var_array($_FILES["research_img"]["name"]),
					),
					'User Personae' => array(
						'summary' => $_POST['project_personae-summary'],
						'personae_img' => filter_var_array($_FILES["personae_img"]["name"]),
					)
				);

				$general_project_data['UI Design'] = array(
					'summary' => $_POST['project_ui-design'],
					'Wireframes and Sketches' => array(
						'summary' => $_POST['project_wireframes-summary'],
						'wireframes_img' => filter_var_array($_FILES["wireframes_img"]["name"]),
					),
					'High Fidelity Mockup' => array(
						'summary' => $_POST['project_hiFI-summary'],
						'hiFI_img' => filter_var_array($_FILES["hiFI_img"]["name"]),
					)
				);

				$general_project_data['UX Design'] = check_array_images($general_project_data['UX Design'], $directory);
				$general_project_data['UI Design'] = check_array_images($general_project_data['UI Design'], $directory);

			break;

			case 'Web design':
				$general_project_data['Website'] = array(
					'project url' => $_POST['project_website']
				);

				if(empty($general_project_data['Website']['project url']))
				{
					echo "error=project_website=You need to enter a website url for your project";
					exit();
				}
				
			break;
			
			default:
				$general_project_data['UX Design'] = array(
					'summary' => $_POST['project_ux-design'],
					'User Research' => array(
						'summary' => $_POST['project_research-summary'],
						'images' => filter_var_array($_FILES["research_img"]["name"]),
					),
					'User Personae' => array(
						'summary' => $_POST['project_personae-summary'],
						'images' => filter_var_array($_FILES["personae_img"]["name"]),
					)
				);

				$general_project_data['UI Design'] = array(
					'summary' => $_POST['project_ui-design'],
					'Wireframes and Sketches' => array(
						'summary' => $_POST['project_wireframes-summary'],
						'images' => filter_var_array($_FILES["project_wireframes"]["name"]),
					),
					'High Fidelity Mockup' => array(
						'summary' => $_POST['project_hiFI-summary'],
						'images' => filter_var_array($_FILES["hiFI_img"]["name"]),
					)
				);

				$general_project_data['Website'] = array(
					'project url' => $_POST['project_website']
				);

				$general_project_data['UX Design'] = check_array_images($general_project_data['UX Design'], $directory);
				$general_project_data['UI Design'] = check_array_images($general_project_data['UI Design'], $directory);

				if(empty($general_project_data['Website']['project url']))
				{
					echo "error=project_website=You need to enter a website url for your project";
					exit();
				}
			break;
		}

		foreach ($_POST as $key => $value) {
			$_POST[ucwords(str_replace("_", " ", $key))] = $value;
			unset($_POST[$key]);
		}

		$project_data = json_encode($_POST, true);

		$addProject = $projectClass->addProjectData($project_unique_id, $project_type, $project_cover_img, $project_img_directory, $project_data, $project_duration);
		echo $addProject == true ? 'success' : $addProject;

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
							if($inside_img_array_value ==  '')
							{
								echo "error=".$inside_key."= Select a ".ucwords(str_replace("_", " ", $inside_key))." image for your project";
								exit();
							}else{
								$project_new_name_imgs = [];
								foreach($img_array as $i => $name)
								{
			                        $name = $_FILES[$inside_key]['name'][$i];
			                        $tmp = $_FILES[$inside_key]['tmp_name'][$i];

									$explode = explode('.', $name);
			                        $ext = end($explode);
			                        $new_img_name = uniqid().'.'.$ext;

			                        if (!is_dir($directory)) {
									    mkdir($directory, 0755, true);
									}

			                        $fold = $directory."/".$new_img_name;

	                                $uploaded = move_uploaded_file($tmp, $fold);//move the image to the $directory

	                                $array[$key][$inside_key][$inside_img_array] = $new_img_name;
			                    }
							}
						}
					}
				}
			}
		}

		return $array;
	}