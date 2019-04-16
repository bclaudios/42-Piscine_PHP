<?php
	include "auth.php";
	session_start();
	$login = $_POST['login'];
	$passwd = $_POST['passwd'];
	if (!auth($login, $passwd))
	{
		$_SESSION['loggued_on_user'] = "";
		exit ("ERROR\n");
	}
	$_SESSION['loggued_on_user'] = $login;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Chat</title>
</head>
<body>
	<iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
	<iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
</body>
</html>