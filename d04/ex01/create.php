<?php
	if ($_POST['submit'] !== "OK" || $_POST['passwd'] === "" || $_POST['login'] === "")
		exit ("ERROR\n");
	if (!file_exists("../private"))
		mkdir("../private");
	if (file_exists("../private/passwd"))
		$data = unserialize(file_get_contents("../private/passwd"));
	if ($data[$_POST['login']])
		exit ("ERROR\n");
	$data[$_POST['login']] = array("login" => $_POST['login'], "passwd" => hash("sha256", $_POST['passwd']));
	$data = serialize($data);
	file_put_contents("../private/passwd", $data);
	echo "OK\n";
?>