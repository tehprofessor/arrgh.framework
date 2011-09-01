<?php
	/* 
	// FRAMEWORK
	 
		A simple php-framework using MVC. I typically develop using Ruby On Rails; which,
		should explain a substantial amount of my methodology (for better or worse). 
		I have tried to make this fairly agnostic. Model logic is handled by 
		phpActiveRecord and template logic using Smarty.
		
		PHPACTIVERECORD FILE LOCATIONS
		
		framework/vendor/php-activerecord
		
		SMARTY FILE LOCATIONS:
		
		framework/lib
		framework/vendor/smarty
		
	*/
	
	/* 
		FRAMEWORK SPECIFIC CONSTANTS
		DO NOT CHANGE 
	*/
	
	define('ROOT', dirname(dirname(__FILE__)));
	define('DS', DIRECTORY_SEPARATOR);
	
	// Define Site Configuration Folder
	
	define("SITE_CONFIG", ROOT.DS."config".DS);
		
	// Load Site Specific Configuration

	require_once (SITE_CONFIG.'config.php');
	$url = $_SERVER['REQUEST_URI'];
	$get = $_GET;
	$post = $_POST;
	$cookie = $_COOKIE;
	// Boot 'er up...
	
	
	require_once(FRAMEWORK_ROOT.DS."config".DS.'boot.php');
	
?>