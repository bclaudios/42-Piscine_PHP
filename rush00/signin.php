<?php
	include "header.php";

	$login = $_POST['login'];
	$passwd = $_POST['passwd'];
	if ($login)
	{
		$passwd = hash("sha256", $passwd);
		$user_DB = GetDatabase("user");
		if (!isset($user_DB[$login]))
			$error = "This user does not exist.<br>";
		if ($user_DB[$login]['passwd'] !== $passwd)
			$error = "Wrong password<br>";
		if (isset($user_DB[$login]) && $user_DB[$login]['passwd'] === $passwd)
		{
			$_SESSION['loggued_user'] = GetUser($login);
			echo '<script>window.location = "index.php"</script>';
		}
	}
?>
<main>
	<div class="defaultContainer" style="width:600px;">
		<h2>LOGIN PAGE</h2>
		<?php if ($error) {
		echo '<p class="errorLog">'.$error.'</p>';}?>
		<form action="signin.php" method="post">
			<p>Login :</p>
			<input type="text" name="login" class="input" required>
			<p>Password :</p>
			<input type="password" name="passwd" class="input" required>
			<input type="submit" name="submit" value="CONNECTION" class="submitButton">
		</form>
	</div>
</main>
	</body>
	</html>