<?php
	function auth($login, $passwd)
	{
		if (!file_exists("../private/passwd"))
			return false;
		$passwd = hash("sha256", $passwd);
		$data = unserialize(file_get_contents("../private/passwd"));
		if (!$data[$login] || $passwd !== $data[$login]["passwd"])
			return false;
		return true;
	}
?>