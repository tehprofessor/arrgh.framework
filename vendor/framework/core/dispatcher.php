<?php
	class Dispatcher  {
		
		public $controller;
		public $action;
		public $params;
		
		
		function __construct($route){
			$controller = new $route->controller($route->action, $route->params);
			if ((int)method_exists($controller, $action)) {
				if(!isset($id)){
					call_user_func_array(array($controller,$action),array($params));
				}else{
					call_user_func_array(array($controller,$action),array($params));
				}
			} else {
				echo "Controller or Method Does not exist!";
				return false;
			}
		}
	}
?>