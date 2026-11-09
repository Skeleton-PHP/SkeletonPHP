<?php

declare(strict_types=1);

namespace SkeletonPHP\Config;

use InvalidArgumentException;

final class Config
{
    /** @var array<string, mixed> */
    private array $settings;

    public function __construct(array $settings = [])
    {
        $this->settings = $settings;
    }

    public static function fromFile(string $path): self
    {
        if (!is_file($path) || !is_readable($path)) {
            return new self();
        }

        $contents = file_get_contents($path);
        if ($contents === false) {
            return new self();
        }

        $decoded = json_decode($contents, true);
        if (!is_array($decoded)) {
            return new self();
        }

        return new self($decoded);
    }

    public function get(string $key, mixed $default = null): mixed
    {
        $segments = explode('.', $key);
        $value = $this->settings;

        foreach ($segments as $segment) {
            if (!is_array($value) || !array_key_exists($segment, $value)) {
                return $default;
            }

            $value = $value[$segment];
        }

        return $value ?? $default;
    }

    public function getString(string $key, string $default = ''): string
    {
        $value = $this->get($key, $default);
        return is_scalar($value) ? (string) $value : $default;
    }

    public function getBool(string $key, bool $default = false): bool
    {
        $value = $this->get($key, $default);

        if (is_bool($value)) {
            return $value;
        }

        if (is_int($value) || is_float($value)) {
            return (bool) $value;
        }

        if (is_string($value)) {
            $normalized = strtolower(trim($value));
            if (in_array($normalized, ['1', 'true', 'yes', 'on'], true)) {
                return true;
            }

            if (in_array($normalized, ['0', 'false', 'no', 'off'], true)) {
                return false;
            }
        }

        return $default;
    }

    public function database(): array
    {
        return [
            'host' => $this->getString('Database.host', '127.0.0.1'),
            'username' => $this->getString('Database.username', 'root'),
            'password' => $this->getString('Database.password', ''),
            'database' => $this->getString('Database.database_name', 'skeletonphp'),
            'table' => $this->getString('Database.table_name', ''),
        ];
    }

    public function app(): array
    {
        return [
            'debug' => $this->getBool('Settings.debug_mode', false),
            'recovery_email' => $this->getString('Account.recovery_email', ''),
        ];
    }
}
