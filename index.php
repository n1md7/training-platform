<?php
ob_start();
// header( "Set-Cookie: name=value; httpOnly" );
// Start Session
session_start();


// Include Config
require('config.php');

error_reporting(E_ALL);
ini_set('display_errors', DEBUG ? 'On' : 'Off');

$classes = array('functions', 'progress', 'Messages', 'Bootstrap', 'Controller', 'Model');
foreach ($classes as $file):
	require("classes/$file.php");
endforeach;

$files = array(
				'users',
				'home',
				'xss',
				'path_traversal',
				'brute_force',
				'sql_injection'
			);

foreach ($files as $file):
	require("controllers/$file.php");	
	require("models/$file.php");	
endforeach;



$controller = (new Bootstrap($_GET))->createController();
if($controller):
	$controller->executeAction();
endif;
