#!/usr/bin/php
<?php
	if ($argc == 1)
		exit;
	array_shift($argv);
	$target = array_shift($argv);
	foreach ($argv as $arg)
	{
		if (strtok($arg, ':') == $target)
			$value = strtok(':');
	}
	echo $value."\n";
?>