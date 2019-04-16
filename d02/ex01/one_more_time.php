#!/usr/bin/php
<?php
	function CheckFormat($raw_date)
	{
		if (count($raw_date) != 5)
			return FALSE;
		if (!preg_match("/^[lL]undi$|^[mM]ardi$|^[mM]ercredi$|^[jJ]eudi$|^[vV]endredi$|^[sS]amedi$|^[dD]imanche$/", $raw_date[0]))
			return FALSE;
		if (!preg_match("/^[1-9]$|^[0-2][0-9]$|^3[0-1]$/", $raw_date[1]))
			return FALSE;
		if (!preg_match("/^[jJ]anvier$|^[fF][eé]vrier$|^[mM]ars$|^[aA]vril$||^[jJ]uin$|^[jJ]uillet$|^[Aa]o[uû]t$|^[sS]eptembre$|^[oO]ctobre$|^[nN]		ovembre$|^[dD][eé]cembre$/u", $raw_date[2]))	
			return FALSE;
		if (!preg_match("/^[0-9]{1,4}$/", $raw_date[3]))
			return FALSE;
		if (!preg_match("/^([0-1][0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/", $raw_date[4]))
			return FALSE;
		return TRUE;
	}

	function TranslateMonth(&$month)
	{
		if (preg_match("/^[jJ]anvier$/", $month))
			$month = "january";
		if (preg_match("/^[fF][eé]vrier$/u", $month))
			$month = "february";
		if (preg_match("/^[mM]ars$/", $month))
			$month = "march";
		if (preg_match("/^[aA]vril$/", $month))
			$month = "april";
		if (preg_match("/^[mM]ai$/", $month))
			$month = "may";
		if (preg_match("/^[jJ]uin$/", $month))
			$month = "june";
		if (preg_match("/^[jJ]uillet$/", $month))
			$month = "july";
		if (preg_match("/^[Aa]o[uû]t$/u", $month))
			$month = "august";
		if (preg_match("/^[sS]eptembre$/", $month))
			$month = "september";
		if (preg_match("/^[oO]ctobre$/", $month))
			$month = "october";
		if (preg_match("/^[nN]ovembre$/", $month))
			$month = "november";
		if (preg_match("/^[dD][eé]cembre$/u", $month))
			$month = "december";
	}

	if (!$argv[1])
		exit;
	$raw_date = explode(' ', $argv[1]);
	if (!CheckFormat($raw_date))
		exit ("Wrong Format\n");
	array_shift($raw_date);
	TranslateMonth($raw_date[1]);
	$date = implode($raw_date);
	date_default_timezone_set('Europe/Paris');
	$date = strtotime(implode($raw_date));
	if (!empty($date))
		echo $date."\n";
	else
		exit ("Wrong Format\n");
?>