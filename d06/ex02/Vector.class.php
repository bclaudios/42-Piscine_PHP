<?php

require_once 'Vertex.class.php';
require_once 'Color.class.php';

Class Vector	{

	private $_x;
	private $_y;
	private $_z;
	private $_w = 0.00;
	static $verbose = False;

	function __construct(array $values)	{
		$destVertex = new Vertex(array("x" => 0.0, "y" => 0.0, "z" => 0.0, "w" => 1.0));
		if (isset($values['dest']) && $values['dest'] instanceof Vertex)	{
			if (isset($values['orig']) && $values['orig'] instanceof Vertex)	{
				$destVertex->setX($values['orig']->getX());
				$destVertex->setY($values['orig']->getY());
				$destVertex->setZ($values['orig']->getZ());
			}
			$this->_x = $values['dest']->getX() - $destVertex->getX();
			$this->_y = $values['dest']->getY() - $destVertex->getY();
			$this->_z = $values['dest']->getZ() - $destVertex->getZ();
			if (self::$verbose) {
				echo $this->__toString() . " constructed\n";
			}
		}
	}

	function __destruct () {
        if (self::$verbose) {
            echo $this->__toString() . " destructed\n";
        }
	}
	
	static function doc() {
        echo file_get_contents("Vector.doc.txt");
    }

	function __toString() {
        return (vsprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
	}
	
	public function getX() {
		return $this->_x;
	}

	public function getY() {
		return $this->_y;
	}

	public function getZ() {
		return $this->_z;
	}

	public function getW() {
		return $this->_w;
	}

	public function magnitude()	{
		return (sqrt($this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z));
	}

	public function normalize()	{
		$mag = $this->magnitude();
		$normVertex = new Vertex (array("x" => $this->_x, "y" => $this->_y, "z" => $this->_z));
		if ($mag > 0 && $mag !== 1) {
			$normX = $this->_x / $mag;
			$normY = $this->_y / $mag;
			$normZ = $this->_z / $mag;
			$normVertex->setX($normX);
			$normVertex->setY($normY);
			$normVertex->setZ($normZ);
		}
		return (new Vector(array("dest" => $normVertex)));
	}

	public function add(Vector $rhs)	{
		$addX = $this->_x + $rhs->GetX();
		$addY = $this->_y + $rhs->GetY();
		$addZ = $this->_z + $rhs->GetZ();
		$addVertex = new Vertex(array("x" => $addX, "y" => $addY, "z" => $addZ));
		return (new Vector(array("dest" => $addVertex)));
	}

	public function sub(Vector $rhs)	{
		$subX = $this->_x - $rhs->GetX();
		$subY = $this->_y - $rhs->GetY();
		$subZ = $this->_z - $rhs->GetZ();
		$subVertex = new Vertex(array("x" => $subX, "y" => $subY, "z" => $subZ));
		return (new Vector(array("dest" => $subVertex)));
	}

	public function opposite()	{
		$opX = -$this->_x;
		$opY = -$this->_y;
		$opZ = -$this->_z;
		$opVertex = new Vertex(array("x" => $opX, "y" => $opY, "z" => $opZ));
		return (new Vector(array("dest" => $opVertex)));
	}

	public function scalarProduct ($k)	{
		$scpX = $this->_x * $k;
		$scpY = $this->_y * $k;
		$scpZ = $this->_z * $k;
		$scpVertex = new Vertex(array("x" => $scpX, "y" => $scpY, "z" => $scpZ));
		return (new Vector(array("dest" => $scpVertex)));
	}

	public function dotProduct(Vector $rhs)	{
		$dpX = $this->_x * $rhs->_x;
		$dpY = $this->_y * $rhs->_y;
		$dpZ = $this->_z * $rhs->_z;
		return ($dpX + $dpY + $dpZ);
	}

	public function cos(Vector $rhs)	{
		return ($this->dotProduct($rhs) / ($this->magnitude() * sqrt(pow($rhs->GetX(), 2) + pow($rhs->GetY(), 2) + pow($rhs->GetZ(), 2))));
	}

	public function crossProduct(Vector $rhs) {
	$crossVertex = new Vertex(array('x' => $this->_y * $rhs->getZ() - $this->_z * $rhs->getY(), 'y' => $this->_z * $rhs->getX() - $this->_x * $rhs->getZ(), 'z' => $this->_x * $rhs->getY() - $this->_y * $rhs->getX()));
		return (new Vector(array("dest" => $crossVertex)));
	}
}
?>