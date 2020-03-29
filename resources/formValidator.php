<?php
	session_start();

	define('_DS', DIRECTORY_SEPARATOR);
	// The path to the file where user information is stored
	define('ACCOUNTS_FILE_PATH', '..' . _DS . 'accounts' . _DS);

	// Validation rules for user input.
	$validation_rules = [
		'registration' => [
			['name' => 'email', 'pattern' => '/(\w+[\.\-\_]?\w+)[@]{1,}\w+\.\w+/'],
			['name' => 'password', 'pattern' => '/[\d\w!@#$%&*^]{8,}/']
		],
		'infoAboutMe' => [
			['name' => 'username', 'pattern' => '/^[^!@#$%&*]{2,}$/i'],
			['name' => 'select_house',
			 'pattern' => '/^(Targaryen)?(Stark)?(Lannister)?(Tully)?(Arryn)?(Greyjoy)?(Baratheon)?$/i'
			],
			['name' => 'preferences', 'pattern' => '/^[^!@#$%&*]{2,}$/i']
		]
	];

	//Checks which form came for validation and sends the form data for verification
	function validationOfForm($array_post){
		if(isset($array_post['submit_firstForm'])){
			checkRegistraionForm($array_post);
		}
		if(isset($array_post['submit_seconForm'])){
			checkFormAboutMe($array_post);
		}
	}


	// Checks the first registration form. Calls a method for checking the validity of incoming data and,
	// on this basis, saves information in session variables to display them if any data is not valid.
	function checkRegistraionForm($array_post){
		global $validation_rules;
		
		if(checkInputs($array_post, $validation_rules['registration'])){
			if(file_exists(ACCOUNTS_FILE_PATH . $array_post['email'] . '.json')){
				$file = file_get_contents(ACCOUNTS_FILE_PATH . $array_post['email'] . '.json');
				$file = json_decode($file);
				if($file[1]->password != $array_post['password']){
					$_SESSION['flag']['passwordError'] = true;                       
				}else{
					$_SESSION['remember_me'] = isset($array_post['remember_me']);
					$_SESSION['display_form'] = true;
				}
			}else{
				$_SESSION['remember_me'] = isset($array_post['remember_me']);
				$_SESSION['display_form'] = true;
			}
		}
	}

	// Checks the second form of 'AboutMe'. Calls a method to save the collected user information to a .json file
	function checkFormAboutMe($array_post){
		global $validation_rules;
		if(checkInputs($array_post, $validation_rules['infoAboutMe'])){
			$_SESSION['select_house'] = $array_post['select_house'];
			saveAccountToFile();
			unset($_SESSION['flags']);
			session_destroy();
		}
	}

	// Checks user input for validity
	function checkInputs ($array_post, $registration){
		$result = true;
		foreach ($registration as $input) {
			$name = $input['name'];
			$_SESSION['flag'][$name] = isset($array_post[$name]) ? preg_match($input['pattern'], $array_post[$name]) : false;
			if($_SESSION['flag'][$name]){
				$_SESSION[$name] = $array_post[$name];
			}else{
				$result = false;
				$_SESSION[$name] = '';
			}
		}
		return $result;
	}

	// Saves user data to a .json file
	function saveAccountToFile () {
		global $validation_rules;
		$fileName = ACCOUNTS_FILE_PATH . $_SESSION['email'] . '.json';
		$account = [];
		foreach ($validation_rules as $form) {
			foreach ($form as $input) {
				$name = $input['name'];
				if(isset($_SESSION[$name])){
					array_push($account, [$name => $_SESSION[$name]]);
				}
			}
		}
		array_push($account, ['remember_me' => $_SESSION['remember_me']]);
		$file = fopen($fileName, 'w');
    fwrite($file, json_encode($account));
    fclose($file);
	}
?>
