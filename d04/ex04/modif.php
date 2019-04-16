<?php
	if ($_POST['submit'] !== "OK" || $_POST['passwd'] === "" || !file_exists("../private/passwd"))
		exit ("ERROR\n");
	$data = unserialize(file_get_contents("../private/passwd"));
	$login = $_POST['login'];
	$passwd = hash("sha256", $_POST['oldpw']);
	if (!$data[$login] || $passwd !== $data[$login]['passwd'])
		exit ("ERROR\n");
	$data[$login]['passwd'] = $passwd;
	$data = serialize($data);
	file_put_contents("../private/passwd", $data);
	header("Location: index.html");
	echo "OK\n";
?>