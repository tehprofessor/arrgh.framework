<?php
	
	// I'm using php-activerecord for the database
	
	
	require_once(FRAMEWORK_ROOT . 'vendor/php-activerecord' . DS . 'ActiveRecord' . '.php');	
	
	ActiveRecord\Config::initialize(function($cfg){
		$db_settings = 'mysql://' . DB_USER . ':' . DB_PASSWORD . '@' . DB_HOST . ":" . DB_PORT . "/" . DB_NAME;
		$model_dir = MODELS_PATH;
	    $cfg->set_model_directory($model_dir);
	    $cfg->set_connections(array(
	        'development' => $db_settings));
	});

?>