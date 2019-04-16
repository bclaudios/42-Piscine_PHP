<?php
	session_start();
	if (empty($_SESSION['loggued_user']))
	{
		echo '<script>window.location = "index.php"</script>';	
		exit;
	}
	session_unset();
	header("Location: ../index.php");
?>