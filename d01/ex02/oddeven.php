#!/usr/bin/php
<?php
while (1)
{
	echo "Entrez un nombre: ";
	$input = trim(fgets(STDIN));
	if (!is_numeric($input))
		echo "'$input' n'est pas un chiffre\n";
	else
	{
		if (substr($input, -1) % 2)
			$result = "Impair";
		else
			$result = "Pair";
		echo "Le chiffre $input est $result\n";
	}
}
?>