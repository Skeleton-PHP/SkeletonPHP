<?php
require_once __DIR__ . "/../vendor/autoload.php"; // Adjust path if not using Composer

use SkeletonPHP\Core\Container;
use SkeletonPHP\Controllers\ResumeController;
use SkeletonPHP\Models\SampleModel;
use SkeletonPHP\Views\HomeView;

// Create the dependency container
$container = new Container();

// Register the SampleModel instance
$container->set('SampleModel', function($c) {
    return new SampleModel();
});

// Register the HomeView instance
$container->set('HomeView', function($c) {
    return new HomeView();
});

// Initialize the ResumeController with the container and call the index method
$controller = new ResumeController($container);
$controller->index();
?>