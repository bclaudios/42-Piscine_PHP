#!/usr/bin/php
<?php
	if ($argc != 3 || !file_exists($argv[1]))
		exit;
	$nom = array();
	$prenom = array();
	$mail = array();
	$IP = array();
	$pseudo = array();
	$file = fopen($argv[1], "r");
	$key_list = fgetcsv($file, 0, ";");
	if (!in_array($argv[2], $key_list))
		exit;
	for ($i = 0; $i < count($key_list); $i++)
		$index = $argv[2] == $key_list[$i] ? $i : $index;
	while (($raw_data = fgetcsv($file, 0, ";")) !== FALSE)
	{
		$nom[$raw_data[$index]] = $raw_data[0];
		$prenom[$raw_data[$index]] = $raw_data[1];
		$mail[$raw_data[$index]] = $raw_data[2];
		$IP[$raw_data[$index]] = $raw_data[3];
		$pseudo[$raw_data[$index]] = $raw_data[4];
	}
	while (1)
	{
		echo "Entrez votre commande: ";
		$input = trim(fgets(STDIN));
		eval($input);
	}
?>