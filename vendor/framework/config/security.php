<?php
class Security {
	
	public $path;
	static $get;
	static $post;
	static $cookie;
	
	function __construct($url, $get, $post, $cookie){
		$this->removeMagicQuotes($get, $post, $cookie);
		$this->unregisterGlobals();
	}
	
	function stripSlashesDeep($value) {
	    $value = is_array($value) ? array_map(array($this, 'stripSlashesDeep'), $value) : stripslashes($value);
	    return $value;
	}
	
	private function removeMagicQuotes($_get, $_post, $_cookie) {
	if ( get_magic_quotes_gpc() ) {
		$this->get  = $this->stripSlashesDeep($_get);
		$this->post  = $this->stripSlashesDeep($_post);
		$this->cookie = $this->stripSlashesDeep($_cookie);
	}
	}

	private function unregisterGlobals() {
	    if (ini_get('register_globals')) {
	        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
	        foreach ($array as $value) {
	            foreach ($GLOBALS[$value] as $key => $var) {
	                if ($var === $GLOBALS[$key]) {
	                    unset($GLOBALS[$key]);
	                }
	            }
	        }
	    }
	}
	
	
}
?>