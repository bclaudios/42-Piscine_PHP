<?php
session_start();
include 'database.php';

$redirection = "index.php";
if ($_POST['submit'] !== "COMMANDER") {
	header('Location: ' . $redirection);
	exit("ERROR\n");
}

$command = $_POST;
if ($command['quantity'] <= 0) {
	header('Location: articles.php');
	exit("ERROR INVALID QUANTITY\n");
}
if (!(DecreaseQuantity($command['title'], $command['quantity']))) {
	exit ("ERROR FAIL DECREASE\n");
}
if (isset($_SESSION['basket']))
{
	if (array_key_exists($command['title'], $_SESSION['basket']))
	{
		$sess_com = &$_SESSION['basket'][$command['title']];
		$sess_com['quantity'] += $command['quantity'];
		$sess_com['total_price'] = $sess_com['quantity'] * $sess_com['price'];
	}
	else
	{
		$command['total_price'] = $command['price'] * $command['quantity'];
		$_SESSION['basket'][$command['title']] = $command;
	}
}
else
{
	$command['total_price'] = $command['price'] * $command['quantity'];
	$_SESSION['basket'][$command['title']] = $command;
}

$full_price = 0;
foreach ($_SESSION['basket'] as $k => $v) {
	$full_price += $v['total_price'];
}
$_SESSION['basket']['full_price'] = $full_price;

header('Location: basket.php');
exit("OK\n");
?>