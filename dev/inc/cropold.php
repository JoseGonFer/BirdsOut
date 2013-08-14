<?php

/**
 * Tar emot bilden via POST, croppar och sparar. */


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$targ_w = 640;
	$targ_h = 320;
	$jpeg_quality = 99;
	$id = uniqid(); 

	$src = '/home/outbirds/public_html/dev/tmp/' . $_POST['filename'];



	$img_r = loadimage($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	$targ_w,$targ_h,$_POST['w'],$_POST['h']);

//	header('Content-type: image/jpeg');
//	imagejpeg($dst_r,null,$jpeg_quality);


	imagejpeg($dst_r, '/home/outbirds/public_html/dev/media/images/' . $id .'.jpg');
}

echo $id . '.jpg';

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
?>
