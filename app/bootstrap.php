<?php

// Load Config
require_once __DIR__ . '/config/config.php';

// Load Helpers
require_once __DIR__ . '/helpers/debug.php';
require_once __DIR__ . '/helpers/url_helper.php';
require_once __DIR__ . '/helpers/session_helper.php';
require_once __DIR__ . '/helpers/security.php';

// Autoload classes
spl_autoload_register(function($className){
    require_once __DIR__ . '/classes/' . $className . '.php';
});
