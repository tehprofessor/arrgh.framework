<?php

class Controller extends Arrgh {
	
	protected $action;
	protected $view;
	protected $layout;
	protected $params;

	function __construct($_action, $_params, $_layout = "default" ){
		$this->params = $_params;
		$this->action = $_action;
		$this->layout = $_layout;
		$this->view = new View($_controller,$_action,$_layout);
	}

	function __destruct() {
		$this->view->build();
	}
	
}

?>