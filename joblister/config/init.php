<?php
	session_start();
	// $_SESSION['logged_out'] = false;
	require_once 'config.php';
	require_once 'helpers/system_helper.php';

	function __autoload($classname){
		

	require_once 'lib/'.$classname.'.php';
	
	}

?>
