<?php

/**
 * Tar emot bilden via POST, croppar och sparar. */


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$targ_w = 600;
	$targ_h = 300;
	$x = 1;
	$y = 1;
	$jpeg_quality = 99;
	$id = uniqid();


	$src = '/home/outbirds/public_html/dev/tmp/' . $_POST['filename'];
	list($width_orig, $height_orig) = getimagesize($src);

	$img_r = resize_image($src, $_POST['cropwidth'], $_POST['cropheight']);
	$dst_r = imagecreatetruecolor( $targ_w, $targ_h );


	imagecopyresampled($dst_r, $img_r, 0, 0, abs($_POST['cropleft']), abs($_POST['croptop']), $_POST['cropwidth'], $_POST['cropheight'],$_POST['cropwidth'], $_POST['cropheight']);

	header('Content-type: image/jpeg');
	imagejpeg($dst_r,null,$jpeg_quality);


	// imagejpeg($dst_r, '/home/outbirds/public_html/dev/media/images/' . $id .'.jpg');
}


function loadimage ($file) {
	// kolla format
	global $type;
	$size=getimagesize($file);
	switch($size["mime"]){
	case "image/jpeg":
		$im = imagecreatefromjpeg($file); //jpeg file
		break;
	case "image/gif":
		$im = imagecreatefromgif($file); //gif file
		break;
	case "image/png":
		$im = imagecreatefrompng($file); //png file
		break;
	default:
		$im=false;
		break;
	}
	return $im;
}

function resize_image($file, $newwidth, $newheight) {
	list($width, $height) = getimagesize($file);
	$src = loadimage($file);
	$image = imagecreatetruecolor($newwidth, $newheight);
	imagecopyresampled($image, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	return $image;
}

?>
