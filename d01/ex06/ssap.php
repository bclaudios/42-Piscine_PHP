#!/usr/bin/php
<?php
	$array = array();
	for ( $i = 1 ; $i < count($argv) ; $i++ )
	{
		$tmp = explode(' ', trim(preg_replace('!\s+!', ' ', $argv[$i])));
		foreach ($tmp as $arg)
			array_push($array, $arg);
	}
	sort($array);
	foreach ($array as $arg)
		echo "$arg\n";
?>