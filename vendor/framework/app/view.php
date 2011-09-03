<?php

include(SMARTY_DIR . 'Smarty.class.php');

class View {
	
	protected $smarty;
	protected $variables = array();
	static $controller;
	static $action;
	static $layout;
	static $js; 
	static $images;
	static $css;

	function __construct($_controller, $_action, $_layout) {
		$this->controller = $_controller;
		$this->action = $_action;
		$this->js = JAVASCRIPTS;
		$this->images = IMAGES;
		$this->css = STYLESHEETS;
		$this->layout = ROOT.DS.'views/layouts/'.$_layout.'.tpl';
		$this->smarty = new Smarty;
	}

	/** Set Variables **/

	function set($name,$value) {
		$this->smarty->assign($name, $value);
	}

	/** Display Template **/
	function render($c='', $a=''){
		if ($c==''){
			$c=$this->controller;
		}
		if ($a==''){
			$a=$this->action;
		}
		
		$yield_str = ROOT.DS."views".DS.$c.DS.$a.".tpl";
  		$this->set('yield', $yield_str);
  	}
  
  	function build() {
		$this->set('images', $this->images);
		$this->set('css', $this->css);
		$this->set('js', $this->js);
  		$this->smarty->display($this->layout);
  	}
  
}
