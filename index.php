<?php

namespace SkeletonPHP;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/';
$router = new \Bramus\Router\Router();


$router->get('/', function() {
<<<<<<< HEAD

    echo 'Home Page Contents';
=======
    include_once ('');
>>>>>>> 96edd88b223cdaf12413a02ce4f94b6796593ce8
});
$router->get('/about', function() {
    echo 'About Page Contents';
});
$router->run();
?>
