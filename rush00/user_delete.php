<?php
	include "header.php";
	if (empty($user))
	{
		echo '<script>window.location = "index.php"</script>';	
		exit;
	}
	$del_user = $user['login'];
	session_unset();
	$user = "";
	$user_DB = GetDatabase("user");
	unset($user_DB[$del_user]);
	UpdateDatabase("user", $user_DB);
?>
<main>
	<div class="defaultContainer">
<h2>Your account has been deleted.</h2>
<a href="index.php"><button class="submitButton">Back to main page</button></a>
</div>
</main>
	</body>
	</html>
