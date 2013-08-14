<?php
function is_logged_in() {
	if (isset($_SESSION["login"])) { return true; }	
}
?>