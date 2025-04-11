<?php
namespace SkeletonPHP;

use SkeletonPHP\Core\Container;
use SkeletonPHP\Controllers\SampleController;
use SkeletonPHP\Models\SampleModel;
// Make sure to include the SampleView class definition – adjust the path as needed.
use SkeletonPHP\Views\SampleView;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/core/Container.php';


// Create container and register dependencies using resolver closures
$container = new Container();

$container->set('SampleModel', function($c) {
    return new SampleModel();
});

// Register SampleView dependency
$container->set('SampleView', function($c) {
    return new SampleView();
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