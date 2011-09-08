<?php

	/* 
		Models are being included in the boot sequence because
		I'm not sure how exactly to handle 'em just 'em
	*/
	
	$arrgh_files[] = FRAMEWORK_ROOT."app".DS."model.php";
	// Logger: Very basic logging features
	$arrgh_files[] = FRAMEWORK_CORE."logger.php";
	// Security and sanitization (class)
	$arrgh_files[] = FRAMEWORK_CORE."security.php";
	// Route (class): stores each route from the SITE_CONFIG/routes.php
	$arrgh_files[] = FRAMEWORK_CORE."routing".DS."route.php";
	// Url (class): for parsing the incoming url string
	$arrgh_files[] = FRAMEWORK_CORE."routing".DS."url.php";
	// Resource (class): creates a resource object, with various routes (objects)
	$arrgh_files[] = FRAMEWORK_CORE."routing".DS."resource.php";
	// NestedResource (class): creates a NestedResource object, with various routes (objects)
	$arrgh_files[] = FRAMEWORK_CORE."routing".DS."nestedresource.php";
	// Routemap (class): creates a 'map' of Route objects, and sets a root path
	$arrgh_files[] = FRAMEWORK_CORE."routing".DS."routemap.php";
	// Routing (class): finds and matches a route (object) to the URL (object)
	$arrgh_files[] = FRAMEWORK_CORE."routing".DS."routing.php";
	// Dispatcher (class): Calls the appropriate controller based on Routing result
	$arrgh_files[] = FRAMEWORK_CORE."dispatcher.php";
	// Utilities (class): currently provides no functionality.
	$arrgh_files[] = FRAMEWORK_CORE."utilities.php";
	// Arrgh Framework file
	$arrgh_files[] = FRAMEWORK_ROOT."framework.php";
	
	foreach ($arrgh_files as $file){
		require_once($file);
	}
	
	spl_autoload_register('application_autoload');

	function application_autoload($className) {
		if(preg_match("/Controller/", $class)){
			preg_match_all('/((?:^|[A-Z])[a-z]+)/',$title, $matches);
			$controller_filename = strtolower(implode("_", $matches[0])).".php";
			if (file_exists(CONTROLLERS. strtolower($className).".php")){
				require_once(CONTROLLERS. strtolower($className).".php");
			}		
		}
	}
	
	// Clean slashes etc.
	
	$secure = new Security($url, $get, $post, $cookie);
	
	// Create & boot Arrgh Framework
	
	$arrgh = new Arrgh($secure->url, $secure->get, $secure->post, $secure->cookie, $request_method);
	$arrgh->start($arrgh->url);
		
?>