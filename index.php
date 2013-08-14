<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Outbirds</title>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700,400italic' rel='stylesheet' type='text/css'>
        <link href="css/style.min.css" rel="stylesheet" type="text/css" media="all"/>
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    </head>
    <body>
        
<div class="wrapper">
	<header>
		
		<div class="hero">

			<div class="logo"></div>
			<h1>At <span>Outbirds</span> the world is your new circle of friends!</h1>

			<h2>meeting up to <span>start</span>, <span>share</span> & <span>enjoy</span></h2>

			<div class="activity"><p></p></div>

			<h3><span>together</span></h3>
		</div>

	</header>

	<section>
		
		<h2><b>Sign up</b> to get a head start in the Outbirds experience!</h2>
		
		<form id="register-form" action="<?=$_SERVER['PHP_SELF']; ?>" method="get">
			<input type="email" id="email" name="email" placeholder="enter your email">
			<input type="submit" id="submit" name="submit" value="">
		</form>
		
		<p id="response">
			<?php require_once('store-address.php'); if($_GET['submit']){ echo storeAddress(); } ?>
		</p>
		
		<hr>

		<p>If you have particular questions about what Outbirds can offer you as a user, business or investor please send an email to <a href="mailto:outbirds@outbirds.com">outbirds@outbirds.com</a></p>

	</section>
	<div class="push"></div>
</div>

<footer>
	<p>&copy; 2013 Outbirds</p>
	<div class="small-logo"></div>
</footer>

        <script src="js/main.js" ></script>
        <script src="js/ios-orientationchange-fix.js"></script>
    </body>
</html>