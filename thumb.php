<?php 

error_reporting(E_ALL);
ini_set('display_errors', '1');


	require "vendor/.composer/autoload.php";

	$imagine = new \Imagine\Gd\Imagine();
	$image = $imagine->open('assets/logo-large.png');
	$thumbnail = $image->thumbnail(new Imagine\Image\Box(100, 100));
	$thumbnail->save('assets/example.thumb.png');

?>
TEST