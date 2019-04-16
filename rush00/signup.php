<?php
	include "header.php";
	function CheckSignupValidity($login, $passwd, $passwdVerif, $email)
	{
		if ($_POST['passwd'] !== $_POST['passwd2'])
			$log = $log."Password not matching.<br>";
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			$log = $log."Wrong email format.<br>";
		if (GetUser($_POST['login']))
			$log = $log."Login already exist.<br>";
		if (CheckEmailExist($_POST['email']))
			$log = $log."Email already exist.<br>";
		return $log;
	}
	if ($_POST['submit'] === "Register")
	{
		$error = CheckSignupValidity($_POST['login'], $_POST['paswd'], $_POST['passwd2'], $_POST['email']);
		if (empty($error))
		{
			array_pop($_POST);
			unset($_POST['passwd2']);
			NewUser($_POST);
			$registered = TRUE;
		}
	}
	$css = "login.css";
?>
<div class="defaultContainer" style="width:600px; text-align:center;">
<?php if ($registered === TRUE) {?>
	<h1>Your account has been created.</h1>
	<p>You can now login and buy stuff</p>
	<a href="index.php"><button class="submitButton">Back to main page</button></a>
<?php } else { ?>
	<h2>Create your account</h2>
	<?php if ($error) {
		echo "<p class='errorLog'>".$error."</p>";}?>
	<form action="signup.php" method="post">
		<p>Login* : </p>
		<input class="input" type="text" name="login" required><br>
		<p>E-mail* : </p>
		<input class="input" type="text" name="email" required><br>
		<p>Password* : </p>
		<input class="input" type="password" name="passwd" required><br>
		<p>Password confirmation* : </p>
		<input class="input" type="password" name="passwd2" required><br>
		<p>Name : </p>
		<input class="input" type="text" name="name" ><br>
		<p>Surname : </p>
		<input class="input" type="text" name="surname" ><br>
		<p>Address : </p>
		<input class="input" type="text" name="address" ><br>
		<p>Phone Number : </p>
		<input class="input" type="text" name="phone" ><br>
		<input type="submit" name="submit" value="Register" class="submitButton">
	</form>
<?php }?>
</div>
	</body>
	</html>
