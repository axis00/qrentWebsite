<?php
	session_start();

	$_SESSION = array();

	if(ini_get("session.user_coockies")){
		$params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000,
	        $params["path"], $params["domain"],
	        $params["secure"], $params["httponly"]
	    );
	}

	session_destroy();
	header("Location:http://laboratory/");
	die();

?>