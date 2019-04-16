<?php 
	session_start();
	include "database.php";
	$user = $_SESSION['loggued_user'];
	$css = "login.css";
	$categories = GetCategories();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="css/<?=$css?>">
	<title><?=$title?></title>
</head>
<body>
	<header>
	<div id="logoCont">
            <a href="index.php"><button class="headerButton">VINYL SHOP</button></a>
	</div>
		<div id="navbar">
		<a href="articles.php"><button class="headerButton">ALL</button></a>
			<?php
			if ($categories !== NULL)
			{
				foreach($categories as $cat) {
					echo '<a href="categorie.php?categorie='.$cat.'"><button class="headerButton">'.strtoupper($cat).'</button></a>';
				}}?>
		</div>
		<div id="headerLeftCont">
			<?php if (!isset($user)) { ?>
				<a href="basket.php"><button class="headerButton">PANIER</button></a>
				<a href="signin.php"><button class="headerButton">SIGN IN</button></a>
				<a href="signup.php"><button class="headerButton">SIGN UP</button></a>
			<?php } else { ?>
				<?php if ($user['rank'] === "admin") { ?>
					<a href="admin.php"><button class="headerButton">ADMIN</button></a>
				<?php } ?>
				<a href="basket.php"><button class="headerButton">PANIER</button></a>
				<a href="logout.php"><button class="headerButton">LOG OUT</button></a>
				<a href="user.php"><button class="headerButton">COMPTE</button></a>
			<?php } ?>
		</div>
	</header>