<?php
	class Route extends Arrgh {
	
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
		
		public function root_to($components){
			$components = $this->verify_route($components);
			$this->routes['root'] = $components;
		}
		
		public function static_url($components){
			$components = $this->verify_route($components);
			$this->routes['static_urls'][] = $components;
			
		}
		
		public function resource($controller){
			$restful = array("index","show","edit","destroy","update");
			
			foreach ($restful as $action){
				$route = array("url" => $controller.DS.$action.DS,"controller" => $controller, "action" => $action, "params" => array("id" => ""));
				$this->routes['resources'][] = $route;
			}			
		}
		
		private function get_routes(){
			if(file_exists(ROUTES)){
				require_once(ROUTES);
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
			
				if (strlen($this->path) <= 1){
					// if request is for root
					$this->controller = $this->routes['root']['controller'];
					$this->action = $this->routes['root']['action'];
					$this->params = $this->routes['root']['params'];
				}else{
					// if url is specified by a static_url
					foreach ($this->routes['static_urls'] as $route => $pieces){
					
						if(($this->path == $pieces['url']) || (substr($this->path, 0, -1) == $pieces['url'])){
							$this->controller = $route['controller'];
							$this->action = $route['action'];
							$this->params = $route['params'];	
						}else{
							
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