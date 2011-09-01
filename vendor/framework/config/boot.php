<?php

	/* 
		Models are being included in the boot sequence because
		I'm not sure how exactly to handle 'em just 'em
	*/

	require_once (FRAMEWORK_ROOT.DS."app".DS."model.php");

	// Boot Framework

	require_once (FRAMEWORK_ROOT.DS.'framework.php');
	
	
	// $framework = new Framework();
	// $framework.__destruct();
		
?>