<?php
/* Load F3*/
$f3=require('lib/base.php');
$db=new DB\SQL(
	'mysql:host=localhost;port=3306;dbname=outbirds_dev',
	'outbirds_dev',
	'outbirds123'
);
$f3->config('config.ini');
$f3->set('UI','ui/');


$f3->set('ONERROR','AppErrorHandler');


function AppErrorHandler() {
	echo View::instance()->render('404.php');
}

/* Core functions */
require_once('inc/templating.php');
require_once('inc/wysiwyg.php');
require_once('inc/class/user.php');
require_once('inc/class/tags.php');
require_once('inc/class/activities.php');
require_once('inc/class/activities.php');
require_once('inc/class/upload.php');



require_once('inc/login.php');
require_once('inc/class/fb/facebook.php');
session_start();






/* Routing */
$f3->route('GET /',
	function() {
		echo View::instance()->render('admin/index.php');
	}
);

$f3->route('GET /tags/@tag',
	function($f3,$params) {
		$array = array('tagid' => $params["tag"]);
		$tags = new Tags;
		$tags->storeValues($array);
		$name = $tags->getTagName();
		$f3->set('tag',$name);
		echo View::instance()->render('tag.php');
	}
);

$f3->route('GET /explore',
	function($f3) {
		if (is_logged_in()) {
			echo View::instance()->render('explore.php');
		}
		if (!is_logged_in()) {
			$f3->reroute('/');
		}
	}
);

/* Martins testrouting */
$f3->route('GET /test/@taggen',
	function($f3,$params) {
		$f3->set('taggen',$params["taggen"]);
		echo View::instance()->render('martin.php');

	}
);
$f3->route('GET /interests/@interest',
	function() {
		echo View::instance()->render('interest.php');
	}
);



$f3->route('GET /user/@userid',
	function() {
		echo View::instance()->render('user.php');
	}
);

// Admin Routing */
$f3->route('GET /administrator',
	function() {
		echo View::instance()->render('admin/index.php');
	}
);
$f3->route('GET /administrator/activity',
	function() {
		echo View::instance()->render('admin/activity.php');
	}
);
$f3->route('GET /administrator/activity/add',
	function() {
		echo View::instance()->render('admin/add-activity.php');
	}
);

$f3->route('GET /administrator/users',
	function() {
		echo View::instance()->render('admin/users.php');
	}
);
$f3->route('GET /administrator/users/add',
	function() {
		echo View::instance()->render('admin/add-user.php');
	}
);
$f3->route('GET /administrator/users/edit/@userid',
	function($f3,$params) {
		$userid = $params["userid"];
		$users = new Users;
		$userinfo = $users->getUserinfo($userid);
		$f3->set('userinfo',$userinfo);
		echo View::instance()->render('admin/edit-user.php');
	}
);
$f3->route('GET /administrator/tags',
	function() {
		echo View::instance()->render('admin/tags.php');
	}
);

$f3->route(array('GET /administrator/news/@id','GET /administrator/news'),
	function() {
		echo View::instance()->render('admin/news.php');
	}
);



$f3->route('GET /administrator/logout',
	function() {
		session_destroy();
		echo View::instance()->render('admin/index.php');
	}
);


/* Ajax */

$f3->route('POST /ajax/login/', function()
	{
		$usr = new Users;
		$usr->storeFormValues( $_POST['data'] );

		if( $usr->userLogin() ) {
			$_SESSION['login'] = $usr->userLogin();
			echo 'ok';
		} else {
			echo "error";
		}
	}
);


$f3->route('POST /ajax/add-activity/', function()
	{
		$activity = new Activities;
		$activity->storeValues( $_POST['data'] );
		$activity->addActivity();
	}
);
$f3->route('POST /ajax/upload-img/', function()
	{
		// list of valid extensions, ex. array("jpeg", "xml", "bmp")
		$allowedExtensions = array("jpeg","png","gif","jpg");
		// max file size in bytes
		$sizeLimit = 10 * 1024 * 1024;
		$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		// Call handleUpload() with the name of the folder, relative to PHP's getcwd()
		$result = $uploader->handleUpload('tmp/');
		// to pass data through iframe you will need to encode all html tags
		echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
	}
);

$f3->route('POST /ajax/add-user/', function()
	{
		$users = new Users;
		$users->storeFormValues( $_POST['data'] );
		$users->userRegister();
	}
);
// End of AJAX Routing
$f3->route('GET /administrator/facebook',
	function() {
		echo View::instance()->render('admin/facebook.php');
	}
);
$f3->route('GET /login/',
	function() {

		echo View::instance()->render('userref.htm');
	}
);
$f3->route('GET /userref',
	function() {
		echo View::instance()->render('userref.htm');
	}
);
$f3->route('GET /googlemaps',
	function() {
		echo View::instance()->render('admin/test.php');
	}
);

$f3->run();
