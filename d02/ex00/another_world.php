#!/usr/bin/php
<?php
	if (!is_null($argv[1]))
		echo trim(preg_replace('!\s+!', ' ', $argv[1]))."\n";
?>