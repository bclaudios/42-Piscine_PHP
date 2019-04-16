<?php
	function ft_split($str)
	{
		$array = explode(' ', trim(preg_replace('!\s+!', ' ', $str)));
		sort($array);
		return $array;
	}
?>