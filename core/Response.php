<?php
namespace SkeletonPHP\Core;

class Response
{
    protected $statusCode = 200;
    protected $headers = [];
    protected $body = '';

    public function status(int $code): self
    {
        $this->statusCode = $code;
        return $this;
    }

    public function header(string $name, string $value): self
    {
        $this->headers[$name] = $value;
        return $this;
    }

    public function headers(array $headers): self
    {
        foreach ($headers as $k => $v) {
            $this->headers[$k] = $v;
        }
        return $this;
    }

    public function write(string $content): self
    {
        $this->body .= $content;
        return $this;
    }

    public function json($data, int $status = 200): self
    {
        $this->status($status);
        $this->header('Content-Type', 'application/json; charset=utf-8');
        $this->body = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return $this;
    }

    public function send(): void
    {
        if (!headers_sent()) {
            http_response_code($this->statusCode);
            foreach ($this->headers as $k => $v) {
                header($k . ': ' . $v);
            }
        }
        echo $this->body;
    }

    public static function html(string $content, int $status = 200, array $headers = []): self
    {
        $resp = new self();
        $resp->status($status);
        $resp->header('Content-Type', 'text/html; charset=utf-8');
        $resp->headers($headers);
        $resp->write($content);
        return $resp;
    }
}
