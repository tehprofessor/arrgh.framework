<?php

	class Route {
		
		public $type = null;
		public $url = null;
		public $controller = null;
		public $action = null;
		public $params = null;
		// Resource var
		public $resource = null;
		// Nested resource vars
		public $parent_controller = null;
		public $parent_params = null;
		public $allow_unnested_path = true;
		public $controller_override = null;
		public $action_override = null;
		
	   	public function __construct($params) {
			foreach ($params as $key => $value){
				$this->$key = $value;
			}
			
		}
		
	}

?>