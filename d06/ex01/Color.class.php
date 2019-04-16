<?php
Class Color	{

	public $red;
	public $green;
	public $blue;
	static $verbose = False;

	function __construct( array $values )	{
		if (isset($values['rgb']))	{
			$this->red = intval($values['rgb']) >> 16 & 0xFF;
			$this->green = intval($values['rgb']) >> 8 & 0xFF;
			$this->blue = intval($values['rgb']) & 0xFF;
		} else	{
			$this->red = intval($values['red']);
			$this->green = intval($values['green']);
			$this->blue = intval($values['blue']);
		}
		if (self::$verbose)
			echo $this->__toString()." constructed.\n";
	}

	function __destruct()	{
		if (self::$verbose)
			echo $this->__toString()." destructed.\n";
	}

	function __toString()	{
		return (vsprintf("Color( red: %3d, green: %3d, blue: %3d )", array($this->red, $this->green, $this->blue)));
	}

	static function doc()	{
		echo file_get_contents("Color.doc.txt");
	}

	public function add( Color $add )	{
		$newRed = $this->red + $add->red;
		$newGreen = $this->green + $add->green;
		$newBlue = $this->blue + $add->blue;
		$newColor = array("red" => $newRed, "green" => $newGreen, "blue" => $newBlue);
		return (new Color($newColor));
	}

	public function sub( Color $sub )	{
		$newRed = $this->red - $sub->red;
		$newGreen = $this->green - $sub->green;
		$newBlue = $this->blue - $sub->blue;
		$newColor = array("red" => $newRed, "green" => $newGreen, "blue" => $newBlue);
		return (new Color($newColor));
	}

	public function mult( $mult )	{
		$newRed = $this->red * $mult;
		$newGreen = $this->green * $mult;
		$newBlue = $this->blue * $mult;
		$newColor = array("red" => $newRed, "green" => $newGreen, "blue" => $newBlue);
		return (new Color($newColor));
	}
}
?>