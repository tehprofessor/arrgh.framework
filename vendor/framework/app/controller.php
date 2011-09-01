<?php

class Controller extends Framework {
	
	protected $action;
	protected $view;
	protected $layout;

	function __construct($_controller,$_action, $_layout = "default" ){
		$this->action = $_action;
		$this->controller = $_controller;
		$this->layout = $_layout;
		$this->view = new View($_controller,$_action,$_layout);
	}

	function __destruct() {
		$this->view->build();
	}
	
}

?>