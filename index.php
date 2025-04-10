<?php
namespace SkeletonPHP;

use SkeletonPHP\view\Home;
use SkeletonPHP\view\ResumeView;
use SkeletonPHP\view\About;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/controller.php';

$router = new \Bramus\Router\Router();

// Instantiate the Home view and define its route
$homeView = new Home();
$router->get('/', function() use ($homeView) {
    echo $homeView->render();
});

// Optionally, instantiate the About view and define its route
$aboutView = new About();
$router->get('/about', function() use ($aboutView) {
    echo $aboutView->render();
});

$router->run();
?>