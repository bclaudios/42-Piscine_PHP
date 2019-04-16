#!/usr/bin/php
<?php
	if (is_null($argv[1]))
		exit;
	$result = explode(' ', trim(preg_replace('!\s+!', ' ', $argv[1])));
	array_push($result, array_shift($result));
	echo implode(" ", $result) . "\n";
?>