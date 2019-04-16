<?php
	function ft_is_sort($array)
	{
		$order = $array;
		sort($order);
		$rorder = $array;
		rsort($rorder);
		if ($array === $order || $array === $rorder)
			return true;
		return false;
	}
?>