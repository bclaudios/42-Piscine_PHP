<?php

require_once "Color.class.php";

Class Vertex	{

	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;
	static $verbose = False;

	function __construct(array $values)	{
		if (isset($values['x']) && isset($values['y']) && isset($values['z']))	{
		$this->_x = $values['x'];
		$this->_y = $values['y'];
		$this->_z = $values['z'];
		}
		if (isset($values['w']))
			$this->_w = $values['w'];
		else
			$this->_w = 1.0;
		if (isset($values['color']))
			$this->_color = $values['color'];
		else	{
			$defaultColor = new Color(array("red" => 255, "green" => 255, "blue" => 255)); 
			$this->_color = $defaultColor;
		}
		if (self::$verbose)
			echo $this->__toString()." constructed\n";
	} 

	function __destruct()	{
		if (self::$verbose)
			echo $this->__toString()." destructed\n";
	}

	function getX() {
		return $this->_x;
	}

	function setX($v)	{
		$this->_x = $v;
	}

	function getY() {
		return $this->_y;
	}

	function setY($v)	{
		$this->_y = $v;
	}

	function getZ() {
		return $this->_z;
	}

	function setZ($v)	{
		$this->_z = $v;
	}

	function getW() {
		return $this->_w;
	}

	function setW($v)	{
		$this->_w = $v;
	}

	function getColor() {
		return $this->_color;
	}

	function setColor( Color $v)	{
		$this->_color = $v;
	}

	function __toString() {
        if (self::$verbose) {
            return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )", array($this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue)));
        } else {
            return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
        }
	}
	
	static function doc()	{
		echo file_get_contents("Vertex.doc.txt");
	}
}

?>