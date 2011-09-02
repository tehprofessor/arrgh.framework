<?php

	/* 
		Models are being included in the boot sequence because
		I'm not sure how exactly to handle 'em just 'em
	*/

	require_once (FRAMEWORK_ROOT.DS."app".DS."model.php");

	// Boot Framework

	require_once (FRAMEWORK_ROOT.DS.'framework.php');
	
	spl_autoload_register('application_autoload');

	function application_autoload($className) {
			require_once(FRAMEWORK_CONFIG. strtolower($className).".php");
			return false;
	}
	
	$secure = new Security($url, $get, $post, $cookie);
	$arrgh = new Arrgh($secure->url, $secure->get, $secure->post, $secure->cookie);
	$arrgh->start($arrgh->url);
	
	// $framework = new Framework();
	// $framework.__destruct();
		
?>