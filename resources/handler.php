<?php 
	session_start();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		require_once 'formValidator.php';
		validationOfForm($_POST);
	}

	header('Location: ../index.php');
?>
