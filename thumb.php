<?php 

	$imagine = new \Imagine\Gd\Imagine();
	$image = $imagine->open('assets/logo-large.png');
	$thumbnail = $image->thumbnail(new Imagine\Image\Box(100, 100));
	$thumbnail->save('assets/example.thumb.png');

?>