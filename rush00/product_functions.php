<?php
	function not_empty($str)
	{
		if (!$str || $str === "")
			return (False);
		return (True);
	}
	function format_array($arr)
	{
		$format_array = array_filter($arr, "not_empty");
		return ($format_array);
	}
	function format_category($str)
	{
		$format_str = trim(preg_replace("/[ \t\n\r\v\f]+/", "", $str));
		$categories = explode(';', $format_str);
		$format_array = format_array($categories);
		foreach ($format_array as &$v)
		{
			$v = strtolower($v);
		}
		return ($format_array);
	}

	function format_array_category($arr)
	{
		$categories = array();
		foreach ($arr as $a)
		{
			if (strpos($a, ';'))
			{
				$categories = array_merge(
					$categories,
					format_category($a)
				);
			}
			else
			{
				$categories[] = $a;
			}
		}
		$ret = format_array($categories);
		foreach ($ret as &$v)
		{
			$v = strtolower($v);
		}
		return ($ret);
	}
?>