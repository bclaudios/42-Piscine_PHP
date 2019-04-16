#!/usr/bin/php
<?php
	function UpperLink($link)
	{
		$link = preg_replace_callback('/(?<=title=")[^"]*/', uppervalue, $link);
		$link = preg_replace_callback("/(?<=>)[^<]*/", uppervalue, $link);
		return ($link[0]);
	}
	function UpperValue($value)
	{
		return (mb_strtoupper($value[0]));
	}
    $page = file_get_contents($argv[1]);
    $result = preg_replace_callback("#<a (.|\n)*?</a>#", upperlink, $page);
    echo $result;
?>