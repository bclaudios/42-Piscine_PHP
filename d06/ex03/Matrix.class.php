<?php

require_once 'Vertex.class.php';
require_once 'Vector.class.php';

Class Matrix	{

	const IDENTITY = "IDENTITY";
	const TRANSLATION = "TRANSLATION";
	const RX = "Ox ROTATION";
	const RY = "Oy ROTATION";
	const RZ = "Oz ROTATION";
	const SCALE = "SCALE";
	const PROJECTION = "PROJECTION";
	public $matrix;
	private $_preset;
	private $_vtc;
	private $_scale;
	private $_angle;
	private $_fov;
	private $_ratio;
	private $_near;
	private $_far;
	static $verbose = False;

	function __construct(array $values)	{
		$this->matrix = array(
			array(0.00, 0.00, 0.00, 0.00),
			array(0.00, 0.00, 0.00, 0.00),
			array(0.00, 0.00, 0.00, 0.00),
			array(0.00, 0.00, 0.00, 0.00));
		if (!empty($values['preset']))	{
			$this->_preset = $values['preset'];
			$this->_vtc = $values['vtc'];
			$this->_scale = $values['scale'];
			$this->_angle = $values['angle'];
			$this->_fov = $values['fov'];
			$this->_ratio = $values['ratio'];
			$this->_near = $values['near'];
			$this->_far = $values['far'];
			$this->SetMatrix();
			if (self::$verbose === True) {
				$presetStr = $this->_preset === "IDENTITY" ? $this->_preset : $this->_preset." preset";
                echo "Matrix ".$presetStr." instance constructed\n";
            }
		}
	}

	private function SetMatrix()	{
		if ($this->_preset == self::IDENTITY ||
		 $this->_preset == self::TRANSLATION ||
		  $this->_preset == self::RX ||
		   $this->_preset == 	self::RY ||
			$this->_preset == self::RZ)	
		{
			$this->matrix[0][0] = 1.0;
			$this->matrix[1][1] = 1.0;
			$this->matrix[2][2] = 1.0;
			$this->matrix[3][3] = 1.0;
		}
		if ($this->_preset == self::TRANSLATION && !empty($this->_vtc))	{
			$this->matrix[0][3] = $this->_vtc->getX();
			$this->matrix[1][3] = $this->_vtc->getY();
			$this->matrix[2][3] = $this->_vtc->getZ();
		}
		if ($this->_preset == self::SCALE && !empty($this->_scale))	{
			$this->matrix[0][0] = $this->_scale;
			$this->matrix[1][1] = $this->_scale;
			$this->matrix[2][2] = $this->_scale;
			$this->matrix[3][3] = 1.0;
		}
		if ($this->_preset == self::RX && !empty($this->_angle))	{
			$this->matrix[1][1] = cos($this->_angle);
			$this->matrix[1][2] = -sin($this->_angle);
			$this->matrix[2][1] = sin($this->_angle);
			$this->matrix[2][2] = cos($this->_angle); 
		}
		if ($this->_preset == self::RY && !empty($this->_angle))	{
			$this->matrix[0][0] = cos($this->_angle);
			$this->matrix[0][2] = sin($this->_angle);
			$this->matrix[2][0] = -sin($this->_angle);
			$this->matrix[2][2] = cos($this->_angle); 
		}
		if ($this->_preset == self::RZ && !empty($this->_angle))	{
			$this->matrix[0][0] = cos($this->_angle);
			$this->matrix[0][1] = -sin($this->_angle);
			$this->matrix[1][0] = sin($this->_angle);
			$this->matrix[1][1] = cos($this->_angle); 
		}
		if ($this->_preset == self::PROJECTION && !empty($this->_fov) && !empty($this->_ratio) && !empty($this->_near) && !empty($this->_far))	{
			$cot = 1 / tan(0.5 * deg2rad($this->_fov));
			$this->matrix[1][1] = $cot;
			$this->matrix[0][0] = $cot / $this->_ratio;
			$this->matrix[2][2] = -1 * (-$this->_near - $this->_far) / 	($this->_near - $this->_far);
			$this->matrix[3][2] = -1.00;
			$this->matrix[2][3] = (2 * $this->_near * $this->_far) / ($this->_near - $this->_far);
			$this->matrix[3][3] = 0.00;
		}
	}

	function mult(Matrix $rhs)	{
		$multMatrix = new Matrix(array("preset" => ""));
		for ($i = 0; $i < 4; $i++)	{
			for ($j = 0; $j < 4; $j++)	{
				$multMatrix->matrix[$i][$j] += $this->matrix[$i][0] * $rhs->matrix[0][$j];
                $multMatrix->matrix[$i][$j] += $this->matrix[$i][1] * $rhs->matrix[1][$j];
                $multMatrix->matrix[$i][$j] += $this->matrix[$i][2] * $rhs->matrix[2][$j];
                $multMatrix->matrix[$i][$j] += $this->matrix[$i][3] * $rhs->matrix[3][$j];		
			}
		}
		return $multMatrix;
	}

	public function transformVertex($vtx)
    {
        $transVertex = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 0));
        $transVertex->setX(($vtx->getX() * $this->matrix[0][0]) + ($vtx->getY() * $this->matrix[0][1]) + ($vtx->getZ() * $this->matrix[0][2]) + ($vtx->getW() * $this->matrix[0][3]));
        $transVertex->setY(($vtx->getX() * $this->matrix[1][0]) + ($vtx->getY() * $this->matrix[1][1]) + ($vtx->getZ() * $this->matrix[1][2]) + ($vtx->getW() * $this->matrix[1][3]));
        $transVertex->setZ(($vtx->getX() * $this->matrix[2][0]) + ($vtx->getY() * $this->matrix[2][1]) + ($vtx->getZ() * $this->matrix[2][2]) + ($vtx->getW() * $this->matrix[2][3]));
        $transVertex->setW(($vtx->getX() * $this->matrix[3][0]) + ($vtx->getY() * $this->matrix[3][1]) + ($vtx->getZ() * $this->matrix[3][2]) + ($vtx->getW() * $this->matrix[3][3]));
        return ($transVertex);
    }

	function __destruct()	{
		if (self::$verbose === True) {
			echo "Matrix instance destructed\n";
		}
	}

    public function __toString()
    {
        $str = "M | vtcX | vtcY | vtcZ | vtxO\n";
        $str .= "-----------------------------\n";
        $str .= "x | %0.2f | %0.2f | %0.2f | %0.2f\n";
        $str .= "y | %0.2f | %0.2f | %0.2f | %0.2f\n";
        $str .= "z | %0.2f | %0.2f | %0.2f | %0.2f\n";
        $str .= "w | %0.2f | %0.2f | %0.2f | %0.2f";
        return (vsprintf($str, array(
            $this->matrix[0][0], $this->matrix[0][1], $this->matrix[0][2], $this->matrix[0][3],
            $this->matrix[1][0], $this->matrix[1][1], $this->matrix[1][2], $this->matrix[1][3],
            $this->matrix[2][0], $this->matrix[2][1], $this->matrix[2][2], $this->matrix[2][3],
            $this->matrix[3][0], $this->matrix[3][1], $this->matrix[3][2], $this->matrix[3][3])));
    }
	
	static function doc()	{
		echo file_get_contents("Matrix.doc.txt");
	}
}
?>