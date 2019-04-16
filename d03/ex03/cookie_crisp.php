<?php
	$action = $_GET['action'];
	if ($action == "set")
		setcookie($_GET['name'], $_GET['value']);
	if ($action == "get" && $_COOKIE[$_GET['name']])
		echo $_COOKIE[$_GET['name']]."\n";
	if ($action == "del")
		setcookie($_COOKIE['name'], "", time() - 3600);
?>