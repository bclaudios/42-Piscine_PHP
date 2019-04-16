#!/usr/bin/php
<?php
	$array = array(
		"mais pourquoi cette demo ?" => "Tout simplement pour qu'en feuilletant le sujet on ne s'apercoive pas de la nature de l'exo\n",
		"mais pourquoi cette chanson ?" => "Parce que Kwame a des enfants\n",
		"vraiment1" => "Nan c'est parce que c'est le premier avril\n",
		"vraiment2" => "Oui il a vraiment des enfants\n");
	if ($argv[1] == "vraiment ?")
		$argv[1] = time() % 2 ? "vraiment1\n" : "vraiment2\n";
	echo $array[$argv[1]];
?>