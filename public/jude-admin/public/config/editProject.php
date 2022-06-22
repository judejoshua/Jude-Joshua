<?php

	require_once 'config.php';


	if(empty($_POST['project_type']))
	{
		echo "error=project_type=You need to select a project type!";
	}else{
		$projectClass = new Project;
		
		$project_unique_id = $_POST['project_id'];
		unset($_POST['project_id']);
		
		$root = $_SERVER['DOCUMENT_ROOT']."/../";
		$directory = $root.'assets/files/uploads/' . $project_unique_id;

		$project_type = $_POST['project_type'];

		$project_duration = $_POST['project_duration'];

		$project_cover_img = $_FILES["project_cover_img"]["name"];

		if(empty($project_cover_img))
		{
			$project_cover_img = $_POST['project_cover_img_old'];
			unset($_POST['project_cover_img_old']);
		}else{
	        $tmp = $_FILES['project_cover_img']['tmp_name'];

			$explode = explode('.', $project_cover_img);
	        $ext = end($explode);
	        $project_cover_img = uniqid().'.'.$ext;


	        $cover_move = $directory."/".$project_cover_img;

	        $uploaded = move_uploaded_file($tmp, $cover_move);//move the image to the $directory
		}

		$general_project_data = array_slice($_POST, 1, 8);

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

				//prototype url
				$general_project_data['Prototype'] = array(
					'prototype' => $_POST['project_prototype']
				);

				if(empty($general_project_data['Prototype']['prototype']))
				{
					echo "error=project_prototype=You need to enter a prototype url for your project";
					exit();
				}else{
					$general_project_data['Prototype']['prototype'] = $general_project_data['Prototype']['prototype'];
				}

				$general_project_data = array_filter($general_project_data);
			break;

			case 'Web design, Web development':
				$general_project_data['Website'] = array(
					'Snapshots' => array(
						'snap_img' => filter_var_array($_FILES["snap_img"]["name"]),
					),
					'project url' => $_POST['project_website']
				);

				$general_project_data['Website'] = check_array_images($general_project_data['Website'], $directory);

				if(empty($general_project_data['Website']['project url']))
				{
					echo "error=project_website=You need to enter a website url for your project";
					exit();
				}else{
					$general_project_data['Website']['project url'] = run_url_check($general_project_data['Website']['project url']);
				}
				
				$general_project_data = array_filter($general_project_data);
			break;
			
			default:
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

				$general_project_data['Website'] = array(
					'Snapshots' => array(
						'snap_img' => filter_var_array($_FILES["snap_img"]["name"]),
					),
					'project url' => $_POST['project_website'],
				);

				//process_images
				$general_project_data['UX Design'] = check_array_images($general_project_data['UX Design'], $directory);
				$general_project_data['UI Design'] = check_array_images($general_project_data['UI Design'], $directory);
				$general_project_data['Website'] = check_array_images($general_project_data['Website'], $directory);

				//prototype url
				$general_project_data['Prototype'] = array(
					'prototype' => $_POST['project_prototype']
				);

				if(empty($general_project_data['Prototype']['prototype']))
				{
					echo "error=project_prototype=You need to enter a prototype url for your project";
					exit();
				}else{
					$general_project_data['Prototype']['prototype'] = $general_project_data['Prototype']['prototype'];
				}
						
				//website url
				if(empty($general_project_data['Website']['project url']))
				{
					echo "error=project_website=You need to enter a website url for your project";
					exit();
				}else{
					$general_project_data['Website']['project url'] = run_url_check($general_project_data['Website']['project url']);
				}
				
				$general_project_data = array_filter($general_project_data);
			break;
		}

		$project_data = json_encode($general_project_data, true);

		$addProject = $projectClass->updateProjectData($project_unique_id, $project_type, $project_cover_img, $project_data, $project_duration);
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
							$img_array = array_filter($img_array);

							if(empty($img_array))
							{
								$array[$key][$inside_key][$inside_img_array] = $_POST[$inside_key.'_old'];
								unset($array[$inside_key.'_old']);
								unset($_POST[$inside_key.'_old']);
							}else{

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

	function run_url_check($url)
	{
		if (! filter_var($url, FILTER_VALIDATE_URL) === true) {
			echo "Enter a valid url in the format \"http://www.example.com\"";
			exit();
		}

		return $url;
	}