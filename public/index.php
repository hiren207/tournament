<?php

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
// Set App Constant
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

// load application config 
require APP . 'config/config.php';

//include helper
require APP . 'libs/helper.php';

// load application class
require APP . 'core/application.php';
require APP . 'core/controller.php';

$app = new Application();
