<?php

	/** Configuration Variables **/
	
	
	/*
		SITE/APPLICATION SPECIFIC CONSTANTS
		Set framework path to it's root folder,
		the default path is:
			
			SITE_ROOT/vendor/framework
	*/
	
	define('FRAMEWORK_ROOT', ROOT.DS."vendor".DS."framework".DS);
	define('FRAMEWORK_CONFIG', FRAMEWORK_ROOT."config".DS);
	
	/* 
		Set development environment to true,
		or false if production.
	*/
	
	define ('DEVELOPMENT_ENVIRONMENT', true);
	
	/* 
		DATABASE
		If you need socket support (use one), edit: framework/app/model.php 
	*/
	
	define('DB_NAME', 'phptest');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_HOST', 'localhost');
	define('DB_PORT', '8889');	
	
	// Site specific routing file
	// default: SITE_ROOT/config/routes.php
	
	define("ROUTES", SITE_CONFIG."routes.php");
	
	// Controllers
	define('CONTROLLERS', ROOT.DS."app".DS."controllers".DS);
	
	/* 
		Because I'm using phpActiveRecord there is not a directory
		at the end of the models path.
	*/
	
	define('MODELS_PATH', ROOT.DS."app".DS.'models');
	
	// SMARTY IS CURRENTLY USED AS THE TEMPLATING ENGINE
	// To use something else will need to alter framework/app/view.php
	
	define('SMARTY_DIR', FRAMEWORK_ROOT."lib".DS);
	
	
	// Javascript files
	define('JAVASCRIPTS', ROOT.DS."javascripts".DS);
	
	// Stylesheets
	define('STYLESHEETS', ROOT.DS."stylesheets".DS);
	
	// Images
	define('IMAGES', ROOT.DS."images".DS);

?>