#!/usr/bin/php
<?php
$file = fopen("/var/run/utmpx", "r");
while ($line = fread($file, 628)) 
	$utmpx[] = unpack("A256name/A4id/A32terminal/Ipid/Itype/Ltime/Lother/A256void/A64empty", $line);
date_default_timezone_set("Europe/Paris");
foreach($utmpx as $value)
{
	if ($value["type"] == 7 && $value["name"] !== "utmpx-1.00" && $value["name"] != null) 
		echo $value["name"]." ".$value["terminal"]."  ".date("M j H:i", $value["time"])." \n";
}
?>