<?php
	include "header.php";
	if (empty($user))
	{
		echo '<script>window.location = "index.php"</script>';
		exit;
	}
?>
<main>
	<div class="defaultContainer">
		<h2>Your personnal infos</h2>
		<table>
			<?php	
		foreach ($user as $info => $value)	{
			if ($info !== "passwd" && $info !== "basket")
			echo "<tr>\n<th style='text-align:left;'>".ucwords($info)." :</th>\n<td style='text-align:left;'>".$value."</td>\n</tr>";
		}
		?>
	</table>
</div>
<div class="defaultContainer" style="margin-top:15px; padding:0;">
	<a href="user_modif.php"><button class="submitButton" >Modifier informations</button></a>
	<a href="user_history.php"><button class="submitButton" >Historique de commande</button></a>
	<a href="user_delete.php"><button class="submitButton" style="margin-bottom:20px;">Supprimer mon compte</button></a>
</div>
</main>
	</body>
	</html>
