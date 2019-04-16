#!/usr/bin/php
<?php
if ($argc != 2)
    exit("Incorrect Parameters\n");
if (!preg_match("~^([-+][\d]+|[\d]+)\s*([\+\-\*\/\%])\s*([-+][\d]+|[\d]+)$~", $argv[1], $values))
	exit("Syntax Error\n");
if (($values[2] == "/" || $values[2] == "%") && $values[3] == "0")
	exit("Values error\n");
$operation = $values[1]." ".$values[2]." ".$values[3];
eval("echo $operation;");
?>