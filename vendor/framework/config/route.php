<?php
	class Route {
	
		public $path;
		public $controller;
		public $action;
		public $routes;
		public $config = array();
		public $params = array();
		
		public function __construct($p){
			$this->routes = array();
			$this->path = $p;
			$this->get_routes();
			$this->build_route();
		}
		
		public function root_to($components){			
			$this->routes['root'] = $components;
		}
		
		public function static_url($components){
			$this->routes['static_url'] = $components;
		}
		
		public function resource($controller){
			$restful = array("index","show","edit","destroy","update");
			
			foreach ($restful as $action){
				$route = array("url" => $controller.DS.$action.DS,"controller" => $controller, "action" => $action);
				$this->routes['resource'] = $route;
			}			
		}
		
		private function get_routes(){
			if(file_exists(ROUTES)){
				require_once(ROUTES);
			}
			
		}
		
		public function build_route(){
				if (strlen($this->path) <= 1){
					$this->controller = $this->routes['root']['controller'];
					$this->action = $this->routes['root']['action'];					
				}else{
					$urlArray = explode("/", $this->path);					
					if(array_key_exists(ucwords($urlArray[1]), $this->routes)){
						echo "shit";
					}
				}
				
		}
		
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