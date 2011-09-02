<?php
	  // This file is loaded by framework/config/route.php
	  // $this points to the Route class.
	  // Route::get_routes();
	  // You'll need to set the location of this file inside your application's config folder
	  // in the config.php file.
	  // ROUTES
	  
	  $this->root_to(array("url" => "/", "controller" => "Posts", "action" => "index"));
		
	
	  $this->static_url(array("url" => "/login", "controller" => "UserSessions", "action" => "new"));
	  $this->static_url(array("url" => "/logout", "controller" => "UserSessions", "action" => "destroy"));
	  
	  $this->static_url(array("url" => "/about", "controller" => "Pages", "action" => "show", "params" => array("id" => 6)));
	  $this->resource("Categories");
	  $this->nested_resource("parent" => "Categories", "resource" => "Posts", "allow_unnested_path" => true, );
	
	  

?>
