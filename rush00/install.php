#!/usr/bin/php
<?php
	if ($_SERVER['REQUEST_METHOD']) {
	    header('HTTP/1.0 403 Forbidden');
	    echo 'You are forbidden!';
	    exit;
	}
	function rmdir_recursive($dir) {
		$files = glob($dir."/*");
		foreach($files as $file){
    		if(is_file($file))
    			unlink($file);
		}
	}

	if (!file_exists("database"))
		mkdir("database");
	else
		rmdir_recursive("database");

	if (!file_exists("img"))
		mkdir("img");
	else
		rmdir_recursive("img");
	
	copy("https://i.ibb.co/nmMR7W5/blues1.jpg", "img/blues1.jpg");
	copy("https://i.ibb.co/mBZpybZ/blues2.jpg", "img/blues2.jpg");
	copy("https://i.ibb.co/dQmZxgd/blues3.jpg", "img/blues3.jpg");
	copy("https://i.ibb.co/bHCYdGv/blues4.jpg", "img/blues4.jpg");
	copy("https://i.ibb.co/PZdbzzK/blues5.jpg", "img/blues5.jpg");
	copy("https://i.ibb.co/TK3xq3w/disco1.jpg", "img/disco1.jpg");
	copy("https://i.ibb.co/BGV7jqR/disco2.jpg", "img/disco2.jpg");
	copy("https://i.ibb.co/gVJcfvx/disco3.jpg", "img/disco3.jpg");
	copy("https://i.ibb.co/Kw8qCtz/disco4.jpg", "img/disco4.jpg");
	copy("https://i.ibb.co/SKsrSNJ/disco5.jpg", "img/disco5.jpg");
	copy("https://i.ibb.co/DWpPCb6/funk1.jpg", "img/funk1.jpg");
	copy("https://i.ibb.co/fCjyZKs/funk2.jpg", "img/funk2.jpg");
	copy("https://i.ibb.co/Yj1KTsR/funk3.jpg", "img/funk3.jpg");
	copy("https://i.ibb.co/wMP8kZx/funk4.jpg", "img/funk4.jpg");
	copy("https://i.ibb.co/VQsBbCP/funk5.jpg", "img/funk5.jpg");
	copy("https://i.ibb.co/3m6zy5m/jazz1.jpg", "img/jazz1.jpg");
	copy("https://i.ibb.co/vHhW9Bd/jazz2.jpg", "img/jazz2.jpg");
	copy("https://i.ibb.co/BKGDmsb/jazz3.jpg", "img/jazz3.jpg");
	copy("https://i.ibb.co/QPHN4KJ/jazz4.jpg", "img/jazz4.jpg");
	copy("https://i.ibb.co/85B4JNj/jazz5.jpg", "img/jazz5.jpg");

	file_put_contents("database/user", 'a:2:{s:9:"bclaudios";a:9:{s:5:"login";s:9:"bclaudios";s:5:"email";s:22:"bclaudio@student.42.fr";s:6:"passwd";s:64:"e028445f48bd526dd2dc214a45831323ff27b5ce05da1fdaef1e4cb8b2ee5384";s:4:"name";s:8:"Claudios";s:7:"surname";s:10:"Barthelemy";s:7:"address";s:32:"36 rue de la chevre 52000 Limoge";s:5:"phone";s:10:"0685478952";s:4:"rank";s:5:"admin";s:6:"basket";s:0:"";}s:8:"jergauth";a:9:{s:5:"login";s:8:"jergauth";s:5:"email";s:22:"jergauth@student.42.fr";s:6:"passwd";s:64:"1cb1d8081f63a2ce21566a76476aa5f081a25c35fe9f909353ebf733942abe3b";s:4:"name";s:8:"Gauthier";s:7:"surname";s:7:"Jeremie";s:7:"address";s:32:"36 rue de la chevre 52000 Limoge";s:5:"phone";s:10:"0685478952";s:4:"rank";s:5:"admin";s:6:"basket";s:0:"";}}');

	file_put_contents("database/product", 'a:19:{s:12:"kind of blue";a:6:{s:5:"title";s:12:"kind of blue";s:6:"artist";s:11:"miles davis";s:5:"price";s:5:"19.00";s:8:"quantity";s:2:"10";s:8:"category";a:1:{i:0;s:4:"jazz";}s:5:"image";s:13:"img/jazz1.jpg";}s:9:"graceland";a:6:{s:5:"title";s:9:"graceland";s:6:"artist";s:10:"paul simon";s:5:"price";s:5:"19.00";s:8:"quantity";s:2:"10";s:8:"category";a:1:{i:0;s:4:"funk";}s:5:"image";s:13:"img/funk2.jpg";}s:3:"aja";a:6:{s:5:"title";s:3:"aja";s:6:"artist";s:10:"steely dan";s:5:"price";s:5:"19.00";s:8:"quantity";s:2:"10";s:8:"category";a:1:{i:0;s:4:"jazz";}s:5:"image";s:13:"img/jazz3.jpg";}s:12:"diamond life";a:6:{s:5:"title";s:12:"diamond life";s:6:"artist";s:4:"sade";s:5:"price";s:5:"19.00";s:8:"quantity";s:2:"10";s:8:"category";a:1:{i:0;s:4:"jazz";}s:5:"image";s:13:"img/jazz3.jpg";}s:14:"a love supreme";a:6:{s:5:"title";s:14:"a love supreme";s:6:"artist";s:13:"john coltrane";s:5:"price";s:5:"19.00";s:8:"quantity";s:2:"10";s:8:"category";a:1:{i:0;s:4:"jazz";}s:5:"image";s:13:"img/jazz5.jpg";}s:18:"axis: bold as love";a:6:{s:5:"title";s:18:"axis: bold as love";s:6:"artist";s:27:"the jimi hendrix experience";s:5:"price";s:5:"19.00";s:8:"quantity";s:2:"10";s:8:"category";a:1:{i:0;s:5:"blues";}s:5:"image";s:14:"img/blues1.jpg";}s:16:"blonde on blonde";a:6:{s:5:"title";s:16:"blonde on blonde";s:6:"artist";s:9:"bob dylan";s:5:"price";s:5:"19.00";s:8:"quantity";s:2:"10";s:8:"category";a:1:{i:0;s:5:"blues";}s:5:"image";s:14:"img/blues2.jpg";}s:5:"pearl";a:6:{s:5:"title";s:5:"pearl";s:6:"artist";s:12:"janis joplin";s:5:"price";s:5:"19.00";s:8:"quantity";s:2:"10";s:8:"category";a:1:{i:0;s:5:"blues";}s:5:"image";s:14:"img/blues3.jpg";}s:17:"more (soundtrack)";a:6:{s:5:"title";s:17:"more (soundtrack)";s:6:"artist";s:10:"pink floyd";s:5:"price";s:5:"19.00";s:8:"quantity";s:2:"10";s:8:"category";a:1:{i:0;s:5:"blues";}s:5:"image";s:14:"img/blues4.jpg";}s:18:"the blues brothers";a:6:{s:5:"title";s:18:"the blues brothers";s:6:"artist";s:18:"the blues brothers";s:5:"price";s:5:"19.00";s:8:"quantity";s:2:"10";s:8:"category";a:1:{i:0;s:5:"blues";}s:5:"image";s:14:"img/blues5.jpg";}s:8:"thriller";a:6:{s:5:"title";s:8:"thriller";s:6:"artist";s:15:"michael jackson";s:5:"price";s:5:"19.00";s:8:"quantity";s:2:"10";s:8:"category";a:1:{i:0;s:5:"disco";}s:5:"image";s:14:"img/disco1.jpg";}s:10:"some girls";a:6:{s:5:"title";s:10:"some girls";s:6:"artist";s:18:"the rolling stones";s:5:"price";s:5:"19.00";s:8:"quantity";s:2:"10";s:8:"category";a:1:{i:0;s:5:"disco";}s:5:"image";s:14:"img/disco2.jpg";}s:16:"rapper\'s delight";a:6:{s:5:"title";s:16:"rapper\'s delight";s:6:"artist";s:14:"sugarhill gang";s:5:"price";s:5:"19.00";s:8:"quantity";s:2:"10";s:8:"category";a:1:{i:0;s:5:"disco";}s:5:"image";s:14:"img/disco3.jpg";}s:6:"prince";a:6:{s:5:"title";s:6:"prince";s:6:"artist";s:6:"prince";s:5:"price";s:5:"19.00";s:8:"quantity";s:2:"10";s:8:"category";a:1:{i:0;s:5:"disco";}s:5:"image";s:14:"img/disco4.jpg";}s:7:"dynasty";a:6:{s:5:"title";s:7:"dynasty";s:6:"artist";s:4:"kiss";s:5:"price";s:5:"19.00";s:8:"quantity";s:2:"10";s:8:"category";a:1:{i:0;s:5:"disco";}s:5:"image";s:14:"img/disco5.jpg";}s:24:"songs in the key of life";a:6:{s:5:"title";s:24:"songs in the key of life";s:6:"artist";s:13:"stevie wonder";s:5:"price";s:5:"19.00";s:8:"quantity";s:2:"10";s:8:"category";a:1:{i:0;s:4:"funk";}s:5:"image";s:13:"img/funk1.jpg";}s:12:"innervisions";a:6:{s:5:"title";s:12:"innervisions";s:6:"artist";s:13:"stevie wonder";s:5:"price";s:5:"19.00";s:8:"quantity";s:2:"10";s:8:"category";a:1:{i:0;s:4:"funk";}s:5:"image";s:13:"img/funk3.jpg";}s:22:"super fly (soundtrack)";a:6:{s:5:"title";s:22:"super fly (soundtrack)";s:6:"artist";s:15:"curtis mayfield";s:5:"price";s:5:"19.00";s:8:"quantity";s:2:"10";s:8:"category";a:1:{i:0;s:4:"funk";}s:5:"image";s:13:"img/funk4.jpg";}s:12:"talking book";a:6:{s:5:"title";s:12:"talking book";s:6:"artist";s:13:"stevie wonder";s:5:"price";s:5:"19.00";s:8:"quantity";s:2:"10";s:8:"category";a:1:{i:0;s:4:"funk";}s:5:"image";s:13:"img/funk5.jpg";}}');
?>