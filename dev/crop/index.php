<?php

/**
 * Tar emot bilden via POST. Lär spara istället för att bara visa.
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$targ_w = 880;
	$targ_h = 440;
	$jpeg_quality = 99;
	$id = uniqid(); 

	$src = 'zlatan.jpg';
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	$targ_w,$targ_h,$_POST['w'],$_POST['h']);

//	header('Content-type: image/jpeg');
//	imagejpeg($dst_r,null,$jpeg_quality);


	imagejpeg($dst_r, 'bilder/' . $id .'.jpg');
?>

<html lang="en">
<head>
  <title>CROP CROP CROP</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.Jcrop.js"></script>
 
  <link rel="stylesheet" href="main.css" type="text/css" />
  <link rel="stylesheet" href="demos.css" type="text/css" />
  <link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />


<body>

<div class="container">
<div class="row">
<div class="span12">
<div class="jc-demo-box">

<div class="page-header">
<ul class="breadcrumb first">
</ul>
<h1>Här är din bild!</h1>
</div>

<img src="bilder/<?php echo $id; ?>.jpg"  id="cropbox"/>
<br/>

http://outbirds.com/dev/crop/bilder/<?php echo $id; ?>.jpg

	</div>
	</div>
	</div>
	</div>
	</body>

</html>

<?php
	exit;
}


?><!DOCTYPE html>
<html lang="en">
<head>
  <title>CROP CROP CROP</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.Jcrop.js"></script>
  <link rel="stylesheet" href="main.css" type="text/css" />
  <link rel="stylesheet" href="demos.css" type="text/css" />
  <link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />

<script type="text/javascript">


  $(function(){

    $('#cropbox').Jcrop({
      aspectRatio: 4/2,
      onSelect: updateCoords
    });

  });

  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Du lär välja område först, retard.');
    return false;
  };

</script>


</head>
<body>

<div class="container">
<div class="row">
<div class="span12">
<div class="jc-demo-box">

<div class="page-header">
<ul class="breadcrumb first">
</ul>
<h1>MR CROPPITY CROP CROP!</h1>
</div>

		<img src="zlatan.jpg" id="cropbox" />

		<form action="index.php" method="post" onsubmit="return checkCoords();">
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
			<input type="submit" value="Crop that shit" class="btn btn-large btn-inverse" />
		</form>

		<p>
			Bara att croppa loss!
		</p>


	</div>
	</div>
	</div>
	</div>
	</body>

</html>
