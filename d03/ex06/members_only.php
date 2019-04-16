<?php
	$image = base64_encode(file_get_contents("../img/42.png"));
	$login = $_SERVER['PHP_AUTH_USER'];
	$pw = $_SERVER['PHP_AUTH_PW'];
	if ($login !== "zaz" || $pw !== "jaimelespetitsponeys") {
		header('WWW-Authenticate: Basic realm="Espace membres"');
		header('HTTP/1.0 401 Unauthorized');
		echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
		exit;
	} else {
		ucfirst($login);
		echo "<html><body>\n";
		echo "Bonjour ".$login."<br />\n";
		echo "<img src='data:image/png;base64,".$image."'>\n";
		echo "</body></html>\n";
	}
	?>