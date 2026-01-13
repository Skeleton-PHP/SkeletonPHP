<?php
namespace SkeletonPHP;

use SkeletonPHP\Core\Container;
use SkeletonPHP\Controllers\SampleController;
use SkeletonPHP\Models\SampleModel;
use SkeletonPHP\Views\SampleView;
use SkeletonPHP\Core\ErrorHandler;
use Dotenv\Exception;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/core/Container.php';





$debug = filter_var($_ENV['APP_DEBUG'] ?? $_SERVER['APP_DEBUG'] ?? true, FILTER_VALIDATE_BOOLEAN);
$handler = new ErrorHandler($debug);
$handler->register();





// Create container and register dependencies using resolver closures
$container = new Container();
$sampleController = new SampleController($container);
$router = new \Bramus\Router\Router();
$container->set('SampleModel', function($c) {
    return new SampleModel();
});
$container->set('SampleView', function($c) {
    return new SampleView();
});
$router->get('/', function() use ($sampleController) {
    echo $sampleController->index();
});








$router->set404(function () {
    header('HTTP/1.1 404 Not Found');
    echo '404 - Not Found';
});

$router->run();
?>