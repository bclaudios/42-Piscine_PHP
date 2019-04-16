<?php

abstract Class House	{
	abstract public function getHouseName();
	abstract public function getHouseMotto();
	abstract public function getHouseSeat();
	
	public function introduce()	{
		$houseName = $this->getHouseName();
		$houseMotto = $this->getHouseMotto();
		$houseSeat = $this->getHouseSeat();
		print ('House '.$houseName.' of '.$houseSeat.' : "'.$houseMotto.'"'.PHP_EOL);
	}
}

?>