<?php

namespace SkeletonPHP;

require_once __DIR__ . './vendor/autoload.php';

$router = new \Bramus\Router\Router();


$router->get('/', function() {
    echo 'Home Page Contents';
});
$router->get('/about', function() {
    echo 'About Page Contents';
});
$router->run();
?>
