<?php
	session_start();
	
	$_SESSION["auth_ok"] = null;
	$_SESSION["uid"] = -1;
	$_SESSION["user_name"] = null;
	
	include('login_info.php');
?>