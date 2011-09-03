<?php
	class Route {
	
		public $path;
		public $controller;
		public $action;
		public $controller_array;
		public $action_array;
		public $routes;
		public $route_params;
		public $config = array();
		public $params = array();
		
		public function __construct($p){
			$this->routes = array();
			$this->route_params = array();
			$this->path = $p;
			$this->get_routes();
			$this->find_and_set_route();
		}
		
		// create default route
		
		public function root_to($components){
			$components = $this->verify_route($components);
			$this->routes['root'] = $components;
		}
		
		// create static routes
		
		public function static_url($components){
			$components = $this->verify_route($components);
			$this->routes['static_urls'][] = $components;
			
		}
		
		// create resource
		
		public function resource($controller){
			$restful = array("index","show","create","edit","destroy","update");
			// lowercase controller name for paths, etc.
			$_controller = strtolower($controller);
			foreach ($restful as $action){
				$route = array("url" => $_controller.DS.$action.DS,"controller" => $controller, "action" => $action, "params" => array("id" => ""));
				$this->routes['resources'][] = $route;
			}			
			$this->routes['resources'][] = array("url" => $_controller.DS, "controller" => $_controller, "action" => "index", "params" => array()) ;
		}
		
		public function nested_resource($args){
			if(!isset($args['allow_unnested_path'])){
				$args['allow_unnested_path'] = true;
			}
			// setup vars
			// $_controller is lowercase
			
			$controller = "";
			$_controller = "";
			$parent = array();
			$compound_url = "";
			// Check actions for override option and set them
			
			if(isset($args['action_override'])){
				$restful = explode(",", implode(",", $a['action_override']));
			}else{
				$restful = array("index","show","create","edit","destroy","update");
			}
			
			// Check for controller override and set it
			
			if(isset($args['controller_override'])){
				$controller = $args['controller_override'];
				$_controller = strtolower($controller);
			}else{
				$controller = $args['resource'];
				$_controller = strtolower($controller);
			}
			
			$parent['name'] = $args['parent'];
			$parent['lower'] = strtolower($parent['name']);
			
			if(isset($args['parent_params'])){
				$parent['params'] = $args['parent_params'];
				$compound_url = "/".$parent['lower']."/".key($parent['params'])."/".$_controller."/";
			}else{
				$compound_url = "/".$parent['lower']."/".$controller."/";
			}
			
			foreach ($restful as $action){
				$route = array("url" => $compound_url.$action.DS, "controller" => $controller, "action" => $action, "parent_params" => $parent['params'], "params" => $args['params']);
				$this->routes['nested_resource'][] = $route;
			}
			
			$this->routes['nested_resource'][] = array("url" => $compound_url, "controller" => $_controller, "action" => $restful[0], "parent_params" => $parent['params'], "params" => $args['params']);
			
			if($args['allow_unnested_path'] === true){
				$this->resource($controller);
			}
			
		}
		
		private function get_routes(){
			if(file_exists(ROUTES)){
				require_once(ROUTES);
			}
			
			foreach($this->routes as $route){
				echo print_r($route);
				echo "<br><br>";
			}
			
		}
		
		protected function verify_route($components){
			if (!array_key_exists('controller', $components)){
				echo '<p>No controller was specified in the route, please check: '.ROUTES.'</p>';
				break;
			}else if(!array_key_exists('action', $components)){
				print '<p>No action was specified in the route, please check: '.ROUTES.'</p>';
				break;
			}else if(!array_key_exists('params', $components)){
				// Default params to blank, makes handling 'em easier
				// and provides more standard parameters for the Dispatcher
				$components['params'] = array();
			}
			return $components;
		}
		
		protected function find_and_set_route(){
				$_path = $this->path;
				if (strlen($_path) <= 1){
					// if request is for root
					$this->controller = $this->routes['root']['controller'];
					$this->action = $this->routes['root']['action'];
					$this->params = $this->routes['root']['params'];
				}else{
					// if url is specified by a static_url
					foreach ($this->routes['static_urls'] as $route => $pieces){
					// if the incoming url matches, the route, set and go...
					// note: subtract one off the end of the url, incase the trailing slash is too much
						if(($_path == $pieces['url']) || (substr($_path, 0, -1) == $pieces['url'])){
							$this->controller = $pieces['controller'];
							$this->action = $pieces['action'];
							$this->params = $pieces['params'];								
						}
					}
					if(strlen($this->controller) <= 0){
						$_url = $_path;
						$_urlArray = explode("/", $_url);
						array_unshift($e)
						if(count($_urlArray) <= 4){
							 if(is_numeric($_urlArray[1])){
								
							}else{
								
							}
						}else if(){
							
						}
					}
				}
				
				
		}
		
		private function create($piece){
			
		}
		
		// Severly deprecated...?
		
		static function load_controller_filenames() {
			$setup_controller_directory = opendir(CONTROLLERS);
			$controller_names = array();
			
			while (false !== ($controller_filename = readdir($setup_controller_directory))) {
				if (preg_match("/controller.php/", $controller_filename)){
					
					// take filename and turn it into an array
					// pop off the final item in the array which contains
					// _controller.php
					
					$nameArray = explode("_", $controller_filename);
					array_pop($nameArray);
					
					// implode, upcase, explode by space, and finally implode new camel cased name
					
					$controllerName = implode(explode(" ", ucwords(implode(" ", $nameArray))));
					$controllerNameArray = array("file" => $controller_filename, "controller" => $controllerName);
					array_push($this->controllers, $controllerNameArray);
					
				}
    	
			}
			closedir($setup_controller_directory);
		}

	}

?>