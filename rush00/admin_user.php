<?php
	include "header.php";
	if ($user['rank'] !== "admin")
	{
		echo '<script>window.location = "index.php"</script>';
		exit;
	}
	if (isset($_GET['deleting']))
		DeleteUser($_GET['deleting']);
	$user_DB = GetDatabase("user");
?>
<main>
	<div class="defaultContainer">
	<h2>Liste des utilisateur enregistré</h2>
	<table>
		<?php foreach($user_DB as $_user)
	{
		if ($_user['rank'] !== "admin")
		echo '<tr><td>'.$_user['login'].'</td><td>'.$_user['email'].'</td><td style="border:none;"><a href="admin_user.php?deleting='.$_user['login'].'"><button class="submitButton" style="width:100%;margin:0;">X</button></a></tr>';
	}
	?>
</table>
</div>
</main>
	</body>
	</html>