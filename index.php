<?php
// header( "Set-Cookie: name=value; httpOnly" );
if (version_compare(PHP_VERSION, '5.4.0', '>=')):
  ob_start(null, 0, PHP_OUTPUT_HANDLER_STDFLAGS ^ PHP_OUTPUT_HANDLER_REMOVABLE);
else:
  ob_start(null, 0, false);
endif;

session_start();

require('config.php');

error_reporting(E_ALL);
ini_set('display_errors', DEBUG ? 'On' : 'Off');

foreach (['functions', 'progress', 'Messages', 'Bootstrap', 'Controller', 'Model'] as $file) 
	require("classes/$file.php");

foreach (['users','home','xss','path_traversal','brute_force','sql_injection'] as $file):
	require("controllers/$file.php");
	require("models/$file.php");	
endforeach;

$controller = (new Bootstrap($_GET))->createController();
if($controller)
	$controller->executeAction();
