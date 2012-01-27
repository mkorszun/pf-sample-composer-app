<?php
	require "vendor/.composer/autoload.php";

	// Yaml library loaded by composer
	echo file_get_contents('./config/app_config.yml');
	$config = Symfony\Component\Yaml\Yaml::parse(file_get_contents('config/app.yml'));

?>
<html>
<head>
	<title><?=$config['site-title']?></title>
	<style type="text/css">
		body, td, th, h1, h2 {font-family: sans-serif;}
		body { font-size: 85%;}
	</style>
</head>
<body>
	<h1><?=$config['site-title']?></h1>

	<p><?=$config['welcome-message']?></p>
</body>
</html>
