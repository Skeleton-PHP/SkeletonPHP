<?php
namespace SkeletonPHP\Core;

/**
 * HTTP Request abstraction wrapping PHP superglobals.
 */
class Request
{
    /** @var array */
    protected $server;
    /** @var array */
    protected $headers;
    /** @var array */
    protected $queryParams;
    /** @var array */
    protected $bodyParams;
    /** @var array */
    protected $cookies;
    /** @var array */
    protected $files;
    /** @var string */
    protected $rawBody;

    public function __construct(array $server = [], array $headers = [], array $queryParams = [], array $bodyParams = [], array $cookies = [], array $files = [], $rawBody = '')
    {
        $this->server      = $server;
        $this->headers     = $headers;
        $this->queryParams = $queryParams;
        $this->bodyParams  = $bodyParams;
        $this->cookies     = $cookies;
        $this->files       = $files;
        $this->rawBody     = $rawBody;
    }

    public static function fromGlobals()
    {
        $headers = [];
        // Build headers from $_SERVER
        foreach ($_SERVER as $key => $value) {
            if (strpos($key, 'HTTP_') === 0) {
                $name = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($key, 5)))));
                $headers[$name] = $value;
            }
        }
        if (!isset($headers['Content-Type']) && isset($_SERVER['CONTENT_TYPE'])) {
            $headers['Content-Type'] = $_SERVER['CONTENT_TYPE'];
        }
        if (!isset($headers['Content-Length']) && isset($_SERVER['CONTENT_LENGTH'])) {
            $headers['Content-Length'] = $_SERVER['CONTENT_LENGTH'];
        }

        $rawBody = file_get_contents('php://input');

        return new self(
            $_SERVER,
            $headers,
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES,
            $rawBody
        );
    }

    public function getMethod()
    {
        return strtoupper(isset($this->server['REQUEST_METHOD']) ? $this->server['REQUEST_METHOD'] : 'GET');
    }

    public function getUri()
    {
        return isset($this->server['REQUEST_URI']) ? $this->server['REQUEST_URI'] : '/';
    }

    public function getPath()
    {
        $uri = $this->getUri();
        $qPos = strpos($uri, '?');
        return $qPos === false ? $uri : substr($uri, 0, $qPos);
    }

    public function query($key = null, $default = null)
    {
        if ($key === null) {
            return $this->queryParams;
        }
        return array_key_exists($key, $this->queryParams) ? $this->queryParams[$key] : $default;
    }

    public function post($key = null, $default = null)
    {
        if ($key === null) {
            return $this->bodyParams;
        }
        return array_key_exists($key, $this->bodyParams) ? $this->bodyParams[$key] : $default;
    }

    public function input($key = null, $default = null)
    {
        $data = $this->bodyParams + $this->queryParams;
        if ($key === null) {
            return $data;
        }
        return array_key_exists($key, $data) ? $data[$key] : $default;
    }

    public function cookie($key = null, $default = null)
    {
        if ($key === null) {
            return $this->cookies;
        }
        return array_key_exists($key, $this->cookies) ? $this->cookies[$key] : $default;
    }

    public function file($key = null)
    {
        if ($key === null) {
            return $this->files;
        }
        return isset($this->files[$key]) ? $this->files[$key] : null;
    }

    public function header($name, $default = null)
    {
        $normalized = str_replace(' ', '-', ucwords(strtolower(str_replace('-', ' ', $name))));
        return array_key_exists($normalized, $this->headers) ? $this->headers[$normalized] : $default;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getRawBody()
    {
        return $this->rawBody;
    }

    public function json($assoc = true)
    {
        $contentType = $this->header('Content-Type', '');
        if (stripos($contentType, 'application/json') === false) {
            return null;
        }
        $decoded = json_decode($this->rawBody, $assoc);
        return (json_last_error() === JSON_ERROR_NONE) ? $decoded : null;
    }

    public function acceptsJson()
    {
        $accept = $this->header('Accept', '');
        return stripos($accept, 'application/json') !== false;
    }

    public function ip()
    {
        if (!empty($this->server['HTTP_CLIENT_IP'])) {
            return $this->server['HTTP_CLIENT_IP'];
        }
        if (!empty($this->server['HTTP_X_FORWARDED_FOR'])) {
            $parts = explode(',', $this->server['HTTP_X_FORWARDED_FOR']);
            return trim($parts[0]);
        }
        return isset($this->server['REMOTE_ADDR']) ? $this->server['REMOTE_ADDR'] : null;
    }
}
