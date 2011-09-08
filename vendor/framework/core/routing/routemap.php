<?php
	class RouteMap {

		public $routes;
		public $root;
		public function __construct(){
			$this->routes = array();
			$this->get_routes();
			
		}
		
		private function get_routes(){
			$routes = array();
			if(file_exists(ROUTES)){
				require_once(ROUTES);
			}
			foreach($routes as $route){
				$route = new Route($route);
				$this->routes[] = $route;
				if($route->type == "root"){
					$this->root[] = $route;
				}
			}
			
		}
		
		
		
		private function create($piece){
			
		}
		

	}

?>