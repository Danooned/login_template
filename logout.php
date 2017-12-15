<?php
	session_start();

	if (!isset($_SESSION['id'])) {
		header('Location: index.php');
		die();
	}

	require_once 'class/User.php';
	require_once 'class/Core.php';
	require_once 'class/Authentication.php';

	$userid = $_SESSION['id'];

	$authentication = new Authentication;

	$authentication->logout($userid);

	header('Location: index.php');

	die();
?>