<?php

	define('_DS', DIRECTORY_SEPARATOR);
	// The path to the file with user's messages.
	define('FILE_PATH', '..' . _DS . 'public' . _DS . 'json' . _DS . 'infoAboutUsers.json');

	// Gets a new object with user input and writes it to a .json file. Then it returns
	// a response to the AJAX request
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$dataAboutUser = $_POST;
		$newObjInfoUser = getNewObjInfoUser($dataAboutUser);

		$fileSize = filesize(FILE_PATH);
		if ($fileSize == 0) {
			$openFile = fopen(FILE_PATH, 'w');
			$arrInfoUser = [];
			array_push($arrInfoUser, $newObjInfoUser);
			fwrite($openFile, json_encode($arrInfoUser));
			fclose($openFile);
			echo json_encode('');
		} else {
			$flag = true;
			$file = file_get_contents(FILE_PATH);
			$file = json_decode($file);
			$user = $dataAboutUser['userEmail'];
			foreach ($file as $key => $value) {
				if($value->$user){
					$file[$key] = $newObjInfoUser;
					$flag = false;
				}
			}
			if ($flag) {
				array_push($file, $newObjInfoUser);
			}
			$openFile = fopen(FILE_PATH, 'w');
			fwrite($openFile, json_encode($file));
			fclose($openFile);
			echo json_encode('');
		}
	} else {
		return;
	}


	// Gets a new object with user input and returns it
	function getNewObjInfoUser($dataAboutUser) {
		$newObjInfoUser = [];
		$userEmail = $dataAboutUser['userEmail'];
		foreach ($dataAboutUser['infoAboutMe'] as $key => $input) {
			if ($input['name'] == 'submit_seconForm') {
				continue; 
			}
			$newObjInfoUser[0]->$userEmail['' . $input['name']] = $input['value']; 
		}
		return $newObjInfoUser[0];
	}

	// Checks incoming data
	function test_input($data) {
		foreach ($data as $key => $value) {
			$data[$key] = strip_tags($value);
			$data[$key] = trim($value);
			$data[$key] = stripslashes($value);
			$data[$key] = htmlspecialchars($value);
		}
		return $data;
	}