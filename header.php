<?php
	error_reporting(E_ALL ^ E_NOTICE); 

	//forceHttps();

	function forceHttps(){
		if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
			$location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			header('HTTP/1.1 301 Moved Permanently');
			header('Location: ' . $location);
			exit;
		}
	}

	function create_header($name){
		echo '<title>' . $name . '</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="Card creator for X Wing Miniatures Games">
  		<meta name="keywords" content="x-wing, miniature game, card ceator, second edition">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
		
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="/src/fonts/xwing-miniatures-modified.css">
		<link rel="stylesheet" href="/src/style.css">
		<link rel="shortcut icon" type="image/png" href="/img/favicon.png"/>
		';
	}

?>