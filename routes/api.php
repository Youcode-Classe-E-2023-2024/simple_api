<?php

global $router;

$router->get('/', function() { echo "Bienvenue sur ma homepage !"; });

$router->get('/posts/:id', function($id) { echo "Voila l'article $id"; });