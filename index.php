<?php
namespace SkeletonPHP;

use SkeletonPHP\Core\Container;
use SkeletonPHP\Controllers\SampleController;
use SkeletonPHP\Models\SampleModel;
use SkeletonPHP\Views\HomeView;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/core/Container.php';

// Create container and register dependencies using resolver closures
$container = new Container();
$container->set('SampleModel', function($c) {
    return new SampleModel();
});
$container->set('HomeView', function($c) {
    return new HomeView();
});

// Instantiate the SampleController with the container
$sampleController = new SampleController($container);

$router = new \Bramus\Router\Router();

// Define the route to use the controller's index method
$router->get('/', function() use ($sampleController) {
    echo $sampleController->index();
});

$router->run();
?>
