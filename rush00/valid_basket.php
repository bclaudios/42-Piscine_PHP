<?php
	include 'header.php';
	if (empty($user))
	{
		echo '<script>window.location = "signin.php"</script>';
		exit;
	}
	$command = $_SESSION['basket'];
	if ($_POST['submit'] === "PASSER LA COMMANDE")
	{
		$command['user'] = $user['login'];
		$historic = GetDatabase("historic");
		$historic[] = $command;
		UpdateDatabase("historic", $historic);
		unset($_SESSION['basket']);
	?>
		<p>COMMANDE VALIDEE</p>
		<a href="articles.php">Retour a la boutique</a>
	<?php 
	}
	else
	{
		foreach ($command as $k => $v)
		{
			if ($k !== "full_price" && $k !== "user") {
				IncreaseQuantity($v['title'], $v['quantity']);
			}
		}
		unset($_SESSION['basket']);
	?>
		<p>COMMANDE SUPPRIMEE</p>
		<a href="basket.php">Revenir au panier</a>
	<?php 
	}
?>
</body>
</html>