<?php
class Framework {
		
	private $route;
	private $dispatch;
	private $secure;
	static $url;
	static $get;
	static $post;
	static $cookie;
	
	public function __construct($url, $get, $post, $cookie){
		$this->url = $url;
		$secure = new Security($this->url, $get, $post, $cookie);
		$this->get = $secure->get;
		$this->post = $secure->post;
		$this->cookie = $secure->cookie;
	}
	
	function start(){
		
		$routes = new Route($this->url);

	}
	
}

spl_autoload_register('application_autoload');

function application_autoload($className) {
		require_once(FRAMEWORK_CONFIG. strtolower($className).".php");
		return false;
}

$framework = new Framework($url, $get, $post, $cookie);
$framework->start();


?>