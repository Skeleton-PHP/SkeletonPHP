<?php

namespace SkeletonPHP\Controllers;

class Controller
{
    public static function view(object $data = null)
    {
        include __DIR__.
            '/../Views/'.
            self::path().
            '/'.
            self::file();
    }

    private static function path() : string
    {
        return str_replace(
            'Controller.php',
            '',
            end(
                explode(
                    '/',
                    debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['file']
                )
            )
        );
    }

    private static function file() : string
    {
        return debug_backtrace(
            DEBUG_BACKTRACE_IGNORE_ARGS, 3)[2]['function'].'.php';
    }
}