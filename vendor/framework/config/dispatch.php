<?php
	class Dispatch  {
		
		public static $controller;
		public static $action;
		public static $params;
		
		
		function __construct($args){
			$this->controller = $args['controller'];
			$this->action = $args['action'];
			$this->params = $args['params'];
			$controller = new $controller($action, $params);
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