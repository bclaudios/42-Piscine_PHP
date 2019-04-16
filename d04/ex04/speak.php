<?php
	session_start();
	$user = $_SESSION['loggued_on_user'];
	if (!$user)
		exit ("ERROR\n");

	$msg = $_POST['msg'];
	if ($msg)
	{
		if (file_exists("../private/chat"))
		{
			$file = fopen("../private/chat", "r");
			if (flock($file, LOCK_SH))
				$data = unserialize(file_get_contents("../private/chat"));
			flock($file, LOCK_UN);
			fclose($file);
		}
		$msg = array("login" => $user, "time" => time(), "msg" => $msg);
		$data[] = $msg;
		$data = serialize($data);
		file_put_contents("../private/chat", $data, LOCK_EX);?>
		<script langage="javascript">top.frames['chat'].location ='chat.php';</script><?php
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<form action="speak.php" method="post"">
		<input type="text" name="msg" style="width:100%;height:75%;">
	</form>
</body>
</html>