#!/usr/bin/php
<?php
	if (is_null($argv[1]))
		exit;
	$argv[1] = trim(preg_replace('!\s+!', ' ', $argv[1]));
	echo "$argv[1]\n";
?>