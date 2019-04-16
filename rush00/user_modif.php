<?php
	include "header.php";
	if (empty($user))
	{
		echo '<script>window.location = "index.php"</script>';	
		exit;
	}
	if ($_POST['submitinfo'] === "Change Infos")
	{
		array_pop($_POST);
		UpdateUser($user['login'], $_POST);
	}
	if ($_POST['submitpasswd'] === "Change Password")
	{
		$newPasswd = hash("sha256", $_POST['newPasswd']);
		$passwd = hash("sha256", $_POST['passwd']);
		if ($passwd !== $user['passwd'])
			$error = "Password not matching.";
		else
		{
			$tmpUser = GetUser($user['login']);
			$tmpUser['passwd'] = $newPasswd;
			UpdateUser($user['login'], $tmpUser);
		}
	}
	$_SESSION['loggued_user'] = GetUser($user['login']);
	$user = $_SESSION['loggued_user'];
?>
<main>
	<div class="defaultContainer">
<h2>Modif general infos</h2>
<form action="user_modif.php" method="post">
	<p>E-mail* : </p>
	<input class="input" type="text" name="email" value="<?=$user['email']?>" required><br>
	<p>Name : </p>
	<input class="input" type="text" name="name" value="<?=$user['title']?>"><br>
	<p>Surname : </p>
	<input class="input" type="text" name="surname" value="<?=$user['surname']?>"><br>
	<p>Address : </p>
	<input class="input" type="text" name="address" value="<?=$user['address']?>"><br>
	<p>Phone Number : </p>
	<input class="input" type="text" name="phone" value="<?=$user['phone']?>"><br>
	<input class="submitButton" type="submit" name="submitinfo" value="Change Infos">
</form>
<?=$error?>
</div>
<div class="defaultContainer" style="margin-top:15px;">
		<h2>Modif mot de passe</h2>
		<form action="user_modif.php" method="post">
			<p>Ancien mot de passe : </p>	
	<input class="input" type="password" name="passwd" required><br>
	<p>Nouveau mot de passe : </p>
	<input class="input" type="password" name="newPasswd" required><br>
	<input class="submitButton" type="submit" name="submitpasswd" value="Change Password">
</form>
</div>
</main>
	</body>
	</html>
