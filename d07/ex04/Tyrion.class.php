<?php

include_once("Lannister.class.php");

class Tyrion extends Lannister	{
	
	public function mateCheck($mate)	{
		$parentName = get_parent_class($mate);
		if ($parentName == "Stark")	{
			return ("Let's do this.");
		}
		if ($parentName == "Lannister") {
			return ("Not even if I'm drunk !");
		}
	}
}
?>