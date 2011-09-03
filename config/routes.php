<?php
	// This file is loaded by framework/config/route.php
	// Route::get_routes();
	// $this points to the Route class.
	// You'll need to set the location of this file inside your application's config folder
	// in the config.php file.
	// ROUTES
	
	/*
		Do not put put params inside the "url" key, it is for the path only,
		the params hash will take care of it.
		
		All parameters will be passed to the controller via the params hash array,
		and will be accessible by their keys.
		
		Demo Usage:
		
		// Set the Default Route:
		Route::root_to(array("url" => "/", "controller" => "CamelCaseName", "action" => "actionname", "params" => array("title" => "index")));
		
		e.g. $this->root_to(array("url" => "/", "controller" => "Posts", "action" => "index"));
		
		// Set a static url: 		
		Route::static_url(array("url" => "/path/name/", "controller" => "CamelCase", "action" => "name", "params" => array("id" => 6)));
		
		Remember, static urls are only that, unchanging URLS, their content is dynamically generated.
		
		e.g. $this->static_url(array("url" => "/login", "controller" => "UserSessions", "action" => "new"));
		
		// Route a resource: 
		Route::resource("ControllerName");
		
		This will automatically setup the following paths and actions:
		
		index:
			/controller/
		show:
			/controller/$id/show
			/controller/$id
		edit:
			/controller/$id/edit
		new:
			/controller/new
		
		e.g. $this->resource("Posts")
		
		// Route a nested resource:
		
		$this->nested_resource(array("parent" => "ParentControllerName", 		// Parent resource (this is mostly used for creating the path)
							   "resource" => "ChildControllerName", 			// Resource you're trying to setup
							   "allow_unnested_path" => true, 					// default true, sets up routes outside of the parent e.g. /categories/posts/ && /posts/
							   "controller_override" => "",						// override default controller -- omit if not needed
							   "action_override" => array(						// override restful actions -- omit if not needed
									"index" => "viewall",
									"show" => "view",
									"edit" => "change",
									"update" => "make_changes",
									"destroy" => "delete",
									"new" => "new_post"
								),					
							   "parent_params" => array("title" => ""), 	// key w/ empty value
							   "params" => array()));							// child paramaters
		
		This will automatically setup the following paths and actions:
		
		index:
			/child/
			/parent/$title/child/
		show:
			/child/:id
			/parent/:title/child/:id
		edit:
			child/:id/edit
			/parent/:title/child/:id/edit
		new:
			/child/new
			/parent/:title/child/new
		
		note: create, update, and edit are coming soon, but I need to decide how to parse the form methods
	*/
	
	$this->root_to(array("url" => "/", "controller" => "Posts", "action" => "index"));
	  
	
	$this->static_url(array("url" => "/login", "controller" => "UserSessions", "action" => "new"));
	$this->static_url(array("url" => "/logout", "controller" => "UserSessions", "action" => "destroy"));
	
	$this->static_url(array("url" => "/about", "controller" => "Pages", "action" => "show", "params" => array("id" => 6)));
	$this->resource("Categories");
	$this->nested_resource(array("parent" => "Categories", "resource" => "Posts", "parent_params" => array("category_id" => ""), "params" => array()));
	
	  

?>
