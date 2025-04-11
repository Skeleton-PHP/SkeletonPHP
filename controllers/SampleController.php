<?php
namespace SkeletonPHP\Controllers;

use SkeletonPHP\Core\Container;

class SampleController {
    protected $container;

    public function __construct(Container $container) {
         $this->container = $container;
    }

    public function index() {
         // Retrieve the SampleModel instance from the container
         $model = $this->container->get('SampleModel');
         $data  = $model->sample_query();

         // Retrieve the HomeView instance and render the data
         $view = $this->container->get('HomeView');
         return $view->render($data);
    }
}
?>