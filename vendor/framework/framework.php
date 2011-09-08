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
	
	public function __construct($url, $get, $post, $cookie, $request_method){
		$this->logger = new Logger();
		$this->url = $url;
		$this->get = $get;
		$this->post = $post;
		$this->cookie = $cookie;
		$this->request_method = $request_method;
	}
	
	function start(){
			$routing = new Routing($this->url, $this->request_method);
		/*	Don't dispatch just yet
			$route = $routing->route;
			if(isset($route)){
				$dispatcher = new Dispatcher($route);
			}
			
		*/
	}
	
}

?>