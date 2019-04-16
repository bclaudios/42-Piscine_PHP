<?php
	session_start();
	if ($_GET['submit'] == "OK" && $_GET['passwd'] !== "" && $_GET['login'] !== "")
	{
		$_SESSION['passwd'] = $_GET['passwd'];
		$_SESSION['login'] = $_GET['login'];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
</head>
<body>
	<form action="index.php" method="get" name="index.php">
		Username: <input type="text" name="login" value="<?php echo $_SESSION['login']?>"/>
		<br />
		Password: <input type="password" name="passwd" value="<?php echo $_SESSION['passwd']?>">
		<br />
		<input type="submit" name="submit" value="OK"/>
		<br />
	</form>
</body>
</html>