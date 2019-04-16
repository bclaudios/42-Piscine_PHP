<?php

include_once('IFighter.class.php');

class NightsWatch implements IFighter	{
	
	private $soldiers;

	public function recruit($recruit)	{
		if ($recruit instanceof IFighter)	{
			$this->soldiers[] = $recruit;
		}
	}

	public function fight()	{
		foreach ($this->soldiers as $fighter)	{
			$fighter->fight();
		}
	}
}
?>