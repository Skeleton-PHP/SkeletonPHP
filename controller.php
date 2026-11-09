<?php

declare(strict_types=1);

namespace SkeletonPHP\Controllers;

abstract class Controller
{
    protected function renderView(string $view, array $data = []): string
    {
        extract($data, EXTR_SKIP);
        ob_start();
        include __DIR__ . '/views/' . $view . '.php';

        return (string) ob_get_clean();
    }
}
