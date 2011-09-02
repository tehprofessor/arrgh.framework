<?php
class Arrgh {
		
	private $route;
	private $dispatch;
	private $secure;
	public $logger;
	public $url;
	public $get;
	public $post;
	public $cookie;
	
	public function __construct($url, $get, $post, $cookie){
		$this->logger = new Logger();
		$this->url = $url;
		$this->get = $get;
		$this->post = $post;
		$this->cookie = $cookie;
	}
	
	function start(){
		$routes = new Route($this->url);
	//	$dispatch = new Dispatch($routes->create());
		
	}
	
}

?>