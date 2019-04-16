#!/usr/bin/php
<?php
if ($argc != 4)
	exit ("Incorrect Parameters\n");
array_shift($argv);
foreach ($argv as &$arg)
	$arg = trim($arg);
switch ($argv[1])
{
	case "+":
		echo $argv[0] + $argv[2];
		break;
	case "-":
		echo $argv[0] - $argv[2];
		break;
	case "*":
		echo $argv[0] * $argv[2];
		break;
	case "/":
		echo $argv[0] / $argv[2];
		break;
	case "%":
		echo $argv[0] % $argv[2];
		break;
}
?>