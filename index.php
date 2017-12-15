<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'class/Authentication.php';
require_once 'class/Core.php';

$auth = new Authentication();
$core = new Core();

if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['password'])) {
    // if (filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
        $user = $core->getUserByName(trim($_POST['name']));
        if ($user != null) {
            if ($auth->validatePassword(trim($_POST["name"]), trim($_POST["password"]))) {
                $_SESSION['id'] = $user->getId();
                echo $user->getId();
                header("Location: home.php");
                die();
            }
            else {
            	echo "Wrong password.";
            }
        }
        else {
        	echo "User not found.";
        }
    // }
    // else {
    // 	echo "Email bestaat niet.";
    // }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
		<form method="POST">
			<label for="name">Naam:</label>
			<input type="text" id="name" name="name"><br>
			<label for="password">Wachtwoord:</label>
			<input type="password" id="password" name="password"><br>
			<input type="submit" name="submit">
		</form>
</body>
</html>

<?php
	// require_once 'class/Authentication.php';
	// $auth = new Authentication();
	// echo print_r($auth->validatePassword('willem', 'lol12345'));

    function isLandstede($email) {  
        $data = substr($email, strpos($email, "@") + 1);

        if($data === 'student.landstede.nl' or $data === 'landstede.nl') return true; else return false;
    }
?>

