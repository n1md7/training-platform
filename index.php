<?php
// Start Session
ob_start();
// header( "Set-Cookie: name=value; httpOnly" );
session_start();


// Include Config
require('config.php');

require('classes/hashmypassword.php');

require('classes/Messages.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');
require('classes/Bmodel.php');

require('controllers/users.php');
require('controllers/home.php');

require('controllers/xss.php');
require('controllers/path_traversal.php');
require('controllers/brute_force.php');


require('models/user.php');
require('models/home.php');

require('models/xss.php');
require('models/path_traversal.php');
require('models/brute_force.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller):
	$controller->executeAction();
endif;
