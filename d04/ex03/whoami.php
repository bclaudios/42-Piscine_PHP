<?php
	session_start();
	if (!$_SESSION['loggued_on_user'])
		exit ("ERROR\n");
	echo $_SESSION['loggued_on_user']."\n";
?>