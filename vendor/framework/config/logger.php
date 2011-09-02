<?php
	class Logger {
		
		function __construct(){
			$this->setReporting();
		}
		
		private function setReporting() {
		if (DEVELOPMENT_ENVIRONMENT == true) {
			error_reporting(E_ALL | E_STRICT);
			ini_set('display_errors','On');
		} else {
			error_reporting(E_ALL | E_STRICT);
			ini_set('display_errors','Off');
			ini_set('log_errors', 'On');
			ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
		}
		
		}
	}
?>