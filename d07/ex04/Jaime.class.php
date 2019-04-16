<?php

include_once("Lannister.class.php");

class Jaime extends Lannister	{

	public function mateCheck($mate)	{
		$mateName = get_class($mate);
		if ($mateName == "Sansa")	{
			return ("Let's do this.");
		}
		if ($mateName == "Cersei")	{
			return ("With pleasure, but only in a tower in Winterfell, then.");
		} else {
			return ("Not even if I'm drunk !");
		}
	}
}
?>