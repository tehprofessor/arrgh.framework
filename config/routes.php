<?php
		$this->root_to(array("url" => "/", "controller" => "Posts", "action" => "index"));
		
	
	  $this->static_url(array("url" => "/login", "controller" => "UserSessions", "action" => "new"));
	  $this->static_url(array("url" => "/logout", "controller" => "UserSessions", "action" => "destroy"));
	  
	  // Paramaters should be an array with key values
	  
	  $this->static_url(array("url" => "/about", "controller" => "Pages", "action" => "show", "params" => array("id" => 6)));
	  $this->resource("Posts");
	  

?>
