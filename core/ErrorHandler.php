<?php
namespace SkeletonPHP\Core;

use Throwable;

class ErrorHandler
{
    protected $debug;

    public function __construct(bool $debug = false)
    {
        $this->debug = $debug;
    }

    public function register(): void
    {
        set_error_handler([$this, 'handlePhpError']);
        set_exception_handler([$this, 'handleException']);
    }

    public function handlePhpError(int $severity, string $message, string $file, int $line): bool
    {
        // Convert PHP errors to Exceptions
        throw new \ErrorException($message, 0, $severity, $file, $line);
    }

    public function handleException(Throwable $e): void
    {
        $request = class_exists(Request::class) ? Request::fromGlobals() : null;
        $acceptsJson = $request ? $request->acceptsJson() : false;

        $status = ($e instanceof \ErrorException) ? 500 : 500;

        if ($acceptsJson) {
            $payload = [
                'error' => true,
                'message' => $this->debug ? $e->getMessage() : 'Internal Server Error',
                'code' => $e->getCode(),
            ];
            if ($this->debug) {
                $payload['file'] = $e->getFile();
                $payload['line'] = $e->getLine();
                $payload['trace'] = explode("\n", $e->getTraceAsString());
            }
            (new Response())->json($payload, $status)->send();
            return;
        }

        $title = 'Application Error';
        $body = '<h1>' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '</h1>';
        if ($this->debug) {
            $body .= '<p><strong>Message:</strong> ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
            $body .= '<p><strong>File:</strong> ' . htmlspecialchars($e->getFile(), ENT_QUOTES, 'UTF-8') . ':' . $e->getLine() . '</p>';
            $body .= '<pre style="white-space:pre-wrap;">' . htmlspecialchars($e->getTraceAsString(), ENT_QUOTES, 'UTF-8') . '</pre>';
        } else {
            $body .= '<p>Internal Server Error.</p>';
        }
        Response::html($body, $status)->send();
    }
}
