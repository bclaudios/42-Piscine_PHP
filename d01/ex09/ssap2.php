#!/usr/bin/php
<?php
	function ctype_special($c)
	{
		if (($c >= 33 && c <= 47) ||
		   ($c >= 58 && $c <= 64) ||
		   ($c >= 91 && $c <= 96) ||
		   ($c >= 123 && $c <= 126))
		   {
			   return (1);
		   }
		return (0);
	}

	function check_order($s1, $s2)
	{
		$s1 = strtoupper($s1);
		$s2 = strtoupper($s2);
		while (isset($s1[$i]) && isset($s2[$i]) && $s1[$i] == $s2[$i])
				$i++;
		if ($s1[$i] == $s2[$i])
			return (0);
		if (isset($s1[$i]) && isset($s2[$i]))
		{
			if (ctype_alpha($s1[$i]) > ctype_alpha($s2[$i]))
				return (-1);
			if (ctype_alpha($s1[$i]) < ctype_alpha($s2[$i]))
				return (1);
			if (ctype_digit($s1[$i]) > ctype_digit($s2[$i]))
				return (-1);			
			if (ctype_digit($s1[$i]) < ctype_digit($s2[$i]))
				return (1);
			if (ctype_special($s1[$i]) > ctype_special($s2[$i]))
				return (-1);			
			if (ctype_special($s1[$i]) < ctype_special($s2[$i]))
				return (1);
		}
		return ($s2[$i] > $s1[$i] ? -1 : 1);
	}

	function ft_split($str)
	{
		$array = explode(' ', trim(preg_replace('!\s+!', ' ', $str)));
		sort($array);
		return $array;
	}

	$array = array();
	for ( $i = 1 ; $i < count($argv) ; $i++ )
	{
		$tmp = ft_split($argv[$i]);
		foreach ($tmp as $arg)
			array_push($array, $arg);
	}
	usort($array, check_order);
	foreach ($array as $arg)
		echo "$arg\n";
?>