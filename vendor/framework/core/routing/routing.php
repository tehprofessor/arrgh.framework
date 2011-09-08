<?php
	
	class Routing {
		private $url;
		private $flag_root = false;
		private $controller_array;
		private $request_method;
		private $final_route;
		private $resource_map = array();
		private $root;
		
		public function __construct($url, $request_method){
			
			$route_map = new RouteMap();
			$this->request_method = $request_method;
			$this->route_map = $route_map->routes;
			$this->root = $route_map->root;
			$this->controller_array = array();
			$this->dissectURL($url);
			$this->create_controller_array();
			$this->match_route();
			
		}
		
		function create_controller_array(){
			foreach($this->route_map as $route){
				$this->controller_array[] = $route->controller;
				
			}
			$this->controller_array = array_unique($this->controller_array);
			
		}
		
		function dissectURL($url){
			
			// standardize string format for conversion to array,
			// this should help precision when counting and
			// guessing where/what is a parameter in the URL.

			// Check for beginning forward slash
			

			if(!preg_match("/^\//",$url)){
				$url = "/".$url;
			}

			// Check for ending slash, and if there isn't one,
			// make sure we ARE NOT appending one to the parameters
			$params = "";
			$urlSansParams = "";
			
			if(preg_match("/\?/", $url)){
				$paramStart = strpos($url, "?");
				$urlStrLength = strlen($url);
				$urlSansParams = substr($url, 0, $paramStart);
				$params = substr($url, $paramStart, $urlStrLength);
			}else{
				$urlSansParams = $url;
			}
			
			if( (preg_match("/\/$/", $urlSansParams) == 0) ){
				$urlSansParams = $urlSansParams."/";
			}
			$_urlArray = explode("/", $urlSansParams);
			array_shift($_urlArray);
			array_pop($_urlArray);		
			$urlLength = count($_urlArray);
			
			// Create URL object
			$u = new Url;
			
			// Setup url object
			
			$u->size = $urlLength;
			$u->params = $params;
			$u->components = $_urlArray;
			$u->original = $url;
			$u->originalSansParams = $urlSansParams;
			if ($u->size == 0){
				$this->flag_root = true;
			}
			// Set routing->url to URL object
			$this->url = $u;

		}
		
		protected function match_route(){
			if($this->flag_root == false){
				
				$path = $this->url;
				$routes = $this->route_map;
				$_urlArray = $this->url->components;
				
				foreach ($routes as $route){
					$type = $route->type;
					
					if ($type == "static"){
						
						if ($this->check_static($route, $path)){
							$this->route = $route;
							goto end;	
						}
						
					}else if ($type == "resource"){
						
						if ($this->check_and_build_resource($route, $path)){							
							goto end;
						}
						
					}else if($type == "nested_resource"){
						if($this->check_and_build_nested_resource($route, $route->parent, $path)){
							
							goto end;
						}
						
					}else if($type != "root"){
						echo "Undefined route type:".$type." please check ".ROUTES;
					}
				}
				
			}else if($this->flag_root == true){
				$this->route = $this->root;
			}
			
			
		end:
		return;
				
				
		}
		
		protected function check_static($route, $urlObj){
			if($route->url == $urlObj->original){
				return true;
			}
		}
		
		protected function check_and_build_resource($route, $urlObj){
			$this->resource_map = $this->build_resource($route->resource, $urlObj);
			$found = $this->check_resource($this->resource_map, $urlObj);
			return $found; 
		}
		
		protected function check_resource($resource_map, $urlObj){
			foreach ($resource_map as $route){
				if($route['url'] == $urlObj->originalSansParams){
					$this->route = $route;
					return true;
				}else{
					return false;
				}
			}
		}
		
		/* 
			create_resource_route:
			Will fail outside of Routing::build_resource();
			Expecting the variable (array) $resource_map to be available;
		*/
		
		protected function create_resource_route($controller, $action, $last_component){
			if($action == "index"){
				$resource_url = "/".$controller."/";
			}else if (($action == "edit") || ($action == "show")){
				$id = $last_component;
				$resource_url = "/".$controller."/".$id."/".$action."/";
			}else if(($action == "create")){
				$resource_url = "/".$controller."/".$action."/";
			}else{ 
				
				$resource_url = "/".$controller."/".$last_component."/";
			}

			$this->resource_map[] = array("controller" => $controller, "action" => $action, "params" => array("id" => $last_component), "url" => $resource_url);
			
			
		}
		
		protected function build_resource($resource, $urlObj){
			
			// $last_component of URL array
			
			$last_component = end($urlObj->components);
			
			/* 	$last_component_pos
			
			 	remove two from the last component count
			 	one is because array indexes start from zero,
			 	another is because that's probably gonna be the
			 	position of our object_id.
			*/
			
			$last_component_pos = (count($urlObj->components) - 2);
			$GET_actions = array("index", "show", "new", "edit");
			$POST_action = "create";
			$DEL_action = "destroy";
			$request_method = $this->request_method;
			$controller = $resource;
			$resource_url = "";

			if($request_method == "GET"){
				
				// e.g. /controller/23/
				if(is_numeric($last_component)){
					$this->create_resource_route($controller, "show", $last_component);
				// e.g /controller/
				}else if($last_component == $controller){
					$this->create_resource_route($controller, "index", $last_component);				
				}else if(($last_component == "show") || ($last_component == "edit")){
					$id = $urlObj->components[$last_component_pos];
					if(is_numeric($id)){
						$this->create_resource_route($controller, "show", $id);
						$this->create_resource_route($controller, "edit", $id);
					}else{
						echo "The object_id is either null or not an integer.";
					}
				
				}else if($last_component == "index"){
				 	echo "'index' is not a valid object_id. Please remove the word 'index' from the URL to view the controller index.";
				
				}else if($last_component == "new"){
					$this->create_resource_route($controller, "new", $last_component);

				}else{
				 	echo "There is a problem with the route, the GET method must be used with a controller (show/edit actions) and have a specified object_id";
				 	echo "<br/><br/>";
				 	echo "Resource: ".$resource."<br/>";
				 	echo "Incorrect Parameter: ".$last_component;
				}
				
				
			}elseif($request_method == "PUT"){
				if(is_numeric($last_component)){
					$this->create_resource_route($controller, "update", $last_component);
					
				}else{
					echo "There is a problem with the route, the PUT method must be used with a controller, have a specified object_id";
					echo "<br/><br/>";
					echo "Resource: ".$resource."<br/>";
					echo "Incorrect Parameter: ".$last_component;
				}
			}elseif($request_method == "POST"){
				if(!is_numeric($last_component)){
					$this->create_resource_route($controller, "create", $last_component);

				}else{
					echo "There is a problem with the route, the POST method (create action) does not accept a URL <b>WITH</b> an object_id.";
					echo "<br/><br/>";
					echo "Resource: ".$resource."<br/>";
					echo "Incorrect Parameter: ".$last_component;
				}
			}elseif($request_method == "DELETE"){
				if(is_numeric($last_component)){
					$this->create_resource_route($controller, "destroy", $last_component);
				}else{
					echo "There is a problem with the route, the DELETE method (destroy action) does not accept a URL <b>WITHOUT</b> an object_id.";
					echo "<br/><br/>";
					echo "Resource: ".$resource."<br/>";
					echo "Incorrect Parameter: ".$last_component;
				}
			}else{
				echo "The request method is unknown. Please check it [the request method] and try again.";
				
			}
			
			return $this->resource_map;
			
		}
		
		
		protected function check_and_build_nested_resource($route, $parent, $urlObj){
			$this->resource_map = $this->build_nested_resource($route->resource, $parent, $urlObj);
			$found = $this->check_nested_resource($this->resource_map, $urlObj);
			return $found; 
		}
		
		protected function check_nested_resource($resource_map, $urlObj){
			foreach ($resource_map as $route){
				if($route['url'] == $urlObj->originalSansParams){
					$this->route = $route;
					return true;
				}else{
					return false;
				}
			}
		}
		
		/* 
			create_resource_route:
			Will fail outside of Routing::build_resource();
			Expecting the variable (array) $resource_map to be available;
		*/
		
		protected function create_nested_resource_route($controller, $action, $last_component, $parent, $first_component){
			
			if($action == "index"){
				$resource_url = "/".$parent."/".$first_component."/".$controller."/";
				echo $resource_url;
			}else if (($action == "edit") || ($action == "show")){
				$id = $last_component;
				$resource_url = "/".$controller."/".$id."/".$action."/";
			}else if(($action == "create")){
				$resource_url = "/".$controller."/".$action."/";
			}else{ 
				$resource_url = "/".$controller."/".$last_component."/";
			}

			$this->resource_map[] = array("parent" => $parent, "controller" => $controller, "action" => $action, "params" => array("id" => $last_component, "parent_id" => $first_component), "url" => $resource_url);
			
			
		}
		
		protected function build_nested_resource($resource, $parent, $urlObj){
			
			// $last_component && $first_component of URL array
			
			$first_component = $urlObj->components[1];
			$last_component = end($urlObj->components);
			
			/* 	$last_component_pos
			
			 	remove two from the last component count
			 	one is because array indexes start from zero,
			 	another is because that's probably gonna be the
			 	position of our object_id.
			*/
			
			$last_component_pos = (count($urlObj->components) - 2);
			$first_component_pos = 1;
			$GET_actions = array("index", "show", "new", "edit");
			$POST_action = "create";
			$DEL_action = "destroy";
			$request_method = $this->request_method;
			$parent = $parent;
			$controller = $resource;
			$resource_url = "";

			if($request_method == "GET"){
				// e.g. /controller/23/controller
				if(is_numeric($first_component)){
					$this->create_nested_resource_route($controller, "index", $last_component, $parent, $first_component);
				// e.g /controller/
				}else if($last_component == $controller){
					
					$this->create_nested_resource_route($controller, "index", $last_component, $parent, $first_component);				
				}else if(($last_component == "show") || ($last_component == "edit")){
					$id = $urlObj->components[$last_component_pos];
					if(is_numeric($id)){
						$this->create_nested_resource_route($controller, "show", $id, $parent, $first_component);
						$this->create_nested_resource_route($controller, "edit", $id, $parent, $first_component);
					}else{
						echo "The object_id is either null or not an integer.";
					}
				
				}else if($last_component == "index"){
				 	echo "'index' is not a valid object_id. Please remove the word 'index' from the URL to view the controller index.";
				
				}else if($last_component == "new"){
					$this->create_nested_resource_route($controller, "new", $last_component, $parent, $first_component);

				}else{
				 	echo "There is a problem with the route, the GET method must be used with a controller (show/edit actions) and have a specified object_id";
				 	echo "<br/><br/>";
				 	echo "Resource: ".$resource."<br/>";
				 	echo "Incorrect Parameter: ".$last_component;
				}
				
				
			}elseif($request_method == "PUT"){
				if(is_numeric($last_component)){
					$this->create_nested_resource_route($controller, "update", $last_component, $parent, $first_component);
					
				}else{
					echo "There is a problem with the route, the PUT method must be used with a controller, have a specified object_id";
					echo "<br/><br/>";
					echo "Resource: ".$resource."<br/>";
					echo "Incorrect Parameter: ".$last_component;
				}
			}elseif($request_method == "POST"){
				if(!is_numeric($last_component)){
					$this->create_nested_resource_route($controller, "create", $last_component, $parent, $first_component);

				}else{
					echo "There is a problem with the route, the POST method (create action) does not accept a URL <b>WITH</b> an object_id.";
					echo "<br/><br/>";
					echo "Resource: ".$resource."<br/>";
					echo "Incorrect Parameter: ".$last_component;
				}
			}elseif($request_method == "DELETE"){
				if(is_numeric($last_component)){
					$this->create_nested_resource_route($controller, "destroy", $last_component, $parent, $first_component);
				}else{
					echo "There is a problem with the route, the DELETE method (destroy action) does not accept a URL <b>WITHOUT</b> an object_id.";
					echo "<br/><br/>";
					echo "Resource: ".$resource."<br/>";
					echo "Incorrect Parameter: ".$last_component;
				}
			}else{
				echo "The request method is unknown. Please check it [the request method] and try again.";
				
			}
			
			return $this->resource_map;
			
		}
		
	}

?>