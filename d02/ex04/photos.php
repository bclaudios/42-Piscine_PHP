#!/usr/bin/php
<?php
	if (is_null($argv[1]))
		exit;
	$html = @file_get_contents($argv[1]);
	if ($html === false)
		exit;
	preg_match('/.*?:\/\/(.*?)(\/|\z)/', $argv[1], $dirname);
	preg_match_all('/<img.*?src=[\'"](.*?)[\'"].*?>/i',$html, $matches);
	if (!is_dir($dirname[1]))
		mkdir($dirname[1]);
	$matches[1] = array_values(array_filter($matches[1]));
	foreach ($matches[1] as &$path)
	{
		if (preg_match("/^(h|\/|[a-z]|[A-Z])/", $path))
		{
			if (!preg_match("/http.*/", $path))
				$path = $dirname[0].$path;
			$info = pathinfo($path);
			$info = parse_url($info["basename"]);
			$info = pathinfo($info["path"]);
			// if ($info["extension"])
			// {
				$i = 0;
				while (file_exists($dirname[1]."/".$info["filename"].$i.".".$info["extension"]))
					$i++;
				$dest = $dirname[1]."/".$info["filename"].$i.".".$info["extension"];
				copy($path, $dest);
			// }
		}
	}
	?>