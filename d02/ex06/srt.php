#!/usr/bin/php
<?php
	if ($argc == 1 || !file_exists($argv[1]))
		exit;
	$lines = file($argv[1]);
	$data = array();
	array_shift($lines);
	foreach ($lines as $line)
	{	
		if (preg_match("/^\d\d\:\d\d\:\d\d\,\d\d\d \-\-\> \d\d\:\d\d\:\d\d\,\d\d\d/", $line))
		{
			if (isset($timer))
			{
				array_pop($data[$timer]);
				$data[$timer] = array_values(array_filter($data[$timer]));
			}
			$timer = $line;
			$data[$timer] = array();
		}	
		else
			array_push($data[$timer], $line === "\n" ? false : $line);
		}
	ksort($data);
	foreach ($data as $key => &$value)
	{
		array_push($value, "\n");
		$last = $key;
	}
	array_pop($data[$last]);
	$i = 1;
	foreach($data as $timer => $srt)
	{
		echo $i++."\n";
		echo $timer;
		foreach ($srt as $str)
			echo $str;
	}
?>