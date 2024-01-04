<?php

require_once __DIR__ . '/../app/bootstrap.php';

$router = new Router($_GET['url']);

require_once __DIR__ . '/../routes/api.php';

try {
    $router->run();
} catch (Exception $e) {
    echo $e->getMessage();
}
