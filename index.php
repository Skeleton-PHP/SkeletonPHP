<?php

declare(strict_types=1);

use Bramus\Router\Router;
use SkeletonPHP\Config\Config;
use SkeletonPHP\Controllers\SampleController;
use SkeletonPHP\Core\Container;
use SkeletonPHP\Core\ErrorHandler;
use SkeletonPHP\Models\SampleModel;
use SkeletonPHP\Views\SampleView;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/core/Container.php';
require_once __DIR__ . '/core/ErrorHandler.php';
require_once __DIR__ . '/controllers/SampleController.php';
require_once __DIR__ . '/models/SampleModel.php';
require_once __DIR__ . '/views/SampleView.php';

$debug = filter_var($_ENV['APP_DEBUG'] ?? $_SERVER['APP_DEBUG'] ?? true, FILTER_VALIDATE_BOOLEAN);
(new ErrorHandler((bool) $debug))->register();

$configPath = __DIR__ . '/config.json';
if (!is_file($configPath)) {
    $configPath = __DIR__ . '/example.config.json';
}

$appConfig = Config::fromFile($configPath);
$container = new Container();
$container->singleton('SampleModel', static fn () => new SampleModel());
$container->singleton('SampleView', static fn () => new SampleView());

$sampleController = new SampleController($container);
$router = new Router();

$router->get('/', static function () use ($sampleController) {
    echo $sampleController->index();
});

$router->set404(static function () {
    http_response_code(404);
    echo '<h1>404 - Not Found</h1>';
});

$router->run();