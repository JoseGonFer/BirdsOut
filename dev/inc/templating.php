<?php

function get_header() {
	echo View::instance()->render('header.php');
}

function get_footer() {
		echo View::instance()->render('footer.php');
}

function get_admin_header() {
	echo View::instance()->render('/admin/header.php');
}

function get_admin_footer() {
		echo View::instance()->render('/admin/footer.php');

}
?>