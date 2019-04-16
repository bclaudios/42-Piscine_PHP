<?php
	if (file_exists("../private/chat"))
	{
		date_default_timezone_set("Europe/Paris");
		$data = unserialize(file_get_contents("../private/chat"));
		foreach($data as $msg)
		{
			$time = date("H:i", $msg['time']);
			echo "[".$time."] <b>".$msg['login']."</b>: ".$msg['msg']."<br />"."\n";
		}
	}
?>