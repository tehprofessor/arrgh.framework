<?php

function setReporting() {
if (DEVELOPMENT_ENVIRONMENT == true) {
	error_reporting(E_ALL);
	ini_set('display_errors','On');
} else {
	error_reporting(E_ALL);
	ini_set('display_errors','Off');
	ini_set('log_errors', 'On');
	ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
}
}

/** Check for Magic Quotes and remove them **/

function stripSlashesDeep($value) {
	$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
	return $value;
}

function removeMagicQuotes() {
if ( get_magic_quotes_gpc() ) {
	$_GET    = stripSlashesDeep($_GET   );
	$_POST   = stripSlashesDeep($_POST  );
	$_COOKIE = stripSlashesDeep($_COOKIE);
}
}

/** Check register globals and remove them **/

function unregisterGlobals() {
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}

function callHook() {
	
	global $url;
	
	$actions = array('show','edit','destroy');
	$urlArray = array();
	$urlArray = preg_split("/\//",$url);
	$_controller = $urlArray[1];
	$controller = ucwords($urlArray[1])."Controller";
	if ($controller != "Controller"){
		if(count($urlArray) > 2){
		 	if (preg_match("/[0-9]+/", $urlArray[2]) > 0){
			$id = $urlArray[2];
				if(in_array($actions, $urlArray)){
					$action = $urlArray[3];	
				}else{
					$action = "show";
				}
			}
		}
	}else{
		$controller = ucwords(ROOT_TO."Controller");
		$_controller = strtolower(ROOT_TO);
	}
	$params = array_pop($urlArray);
	
	if (!isset($action)){
		$action = "index";
	}
	$controller = new $controller($_controller,$action);	
	if ((int)method_exists($controller, $action)) {
		if(!isset($id)){
			call_user_func_array(array($controller,$action),array($params));
		}else{
			call_user_func_array(array($controller,$action),array($id, $params));
		}
	} else {
		/* Error Generation Code Here */
	}
	
	
}

spl_autoload_register('application_autoload');

function application_autoload($className) {
	
	// $className for controllers are initialized as (in the case of a Posts controller):
	// PostsController
	// so we need to split the specified on, using explode, at 'controller'
	// and lookup the appropriate filename
	
		$classNameArray = explode("controller", strtolower($className));
		$className = $classNameArray[0];
		
		if (file_exists(ROOT . DS . 'controllers' . DS . strtolower($className) . '_controller.php')) {
			require_once(ROOT . DS . 'vendor' . DS . 'framework' . DS . 'controller.php');
			require_once(ROOT . DS . 'vendor' . DS . 'framework' . DS . 'view.php');
			require_once(ROOT . DS . 'controllers' . DS . 'application_controller.php');
			require_once(ROOT . DS . 'controllers' . DS . strtolower($className) . '_controller.php');
		}
	
}



setReporting();
removeMagicQuotes();
unregisterGlobals();
callHook();


?>