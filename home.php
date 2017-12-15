<?php
session_start();
	require_once 'class/Core.php';
	require_once 'class/User.php';

	// if (!isset($_SESSION["id"])) {
	// 	header('Location: index.php');
	// }
	
	$core = new Core();
	$user = $core->getUserById($_SESSION["id"]);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>

<?php
	echo 'Welkom, '.$user->getName();
?>
	<br><br>

<a href='logout.php'>Logout</a>

</body>
</html>