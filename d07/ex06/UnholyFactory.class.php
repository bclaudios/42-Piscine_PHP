<?php

class UnholyFactory	{

	private $absorb = array();

	public function absorb($target)	{
		if ($target instanceof Fighter)	{
			$fighterType = get_class($target) == "Footsoldier" ? "foot soldier" : strtolower(get_class($target));
			if (array_key_exists($fighterType, $this->absorb))	{
				print ("(Factory already absorbed a fighter of type ".$fighterType.")". PHP_EOL);
			} else {
			$this->absorb[$fighterType] = $target;
			print ("(Factory absorbed a fighter of type ".$fighterType.")". PHP_EOL);
			}
		} else {
			print ("(Factory can't absorb this, it's not a fighter)". PHP_EOL);
		}
	}
	
	public function fabricate($fighter)	{
		if (array_key_exists($fighter, $this->absorb))	{
			print ("(Factory fabricates a fighter of type ".$fighter.")". PHP_EOL);
			return $this->absorb[$fighter];
		} else {
			print ("(Factory hasn't absorbed any fighter of type ".$fighter.")".PHP_EOL);
		}
	}
}
?>