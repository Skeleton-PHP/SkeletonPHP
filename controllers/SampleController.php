<?php

declare(strict_types=1);

namespace SkeletonPHP\Controllers;

use SkeletonPHP\Core\Container;

final class SampleController
{
    public function __construct(private Container $container)
    {
    }

    public function index(): string
    {
        $model = $this->container->get('SampleModel');
        $data = $model->getProfile();

        $view = $this->container->get('SampleView');

        return $view->render($data);
    }
}
