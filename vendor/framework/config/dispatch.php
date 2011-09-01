<?php
	class Dispatch  {
		
		public $controller;
		public $action;
		public $params;
		
		
		function __construct($controller, $action = false, $params = false){
			
			if (!isset($action)){
				$action = "index";
			}
			
			$controller = new $controller($controller,$action, $param);	
			
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
	}
?>