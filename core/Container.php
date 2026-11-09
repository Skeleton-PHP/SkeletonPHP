<?php

declare(strict_types=1);

namespace SkeletonPHP\Core;

use Closure;
use InvalidArgumentException;

final class Container
{
    /** @var array<string, Closure(Container): mixed> */
    private array $bindings = [];

    /** @var array<string, mixed> */
    private array $instances = [];

    public function set(string $name, callable $resolver): void
    {
        $this->bindings[$name] = $resolver;
        unset($this->instances[$name]);
    }

    public function singleton(string $name, callable $resolver): void
    {
        $this->bindings[$name] = static function (Container $container) use ($resolver, $name) {
            if (!array_key_exists($name, $container->instances)) {
                $container->instances[$name] = $resolver($container);
            }

            return $container->instances[$name];
        };
    }

    public function has(string $name): bool
    {
        return array_key_exists($name, $this->bindings);
    }

    public function get(string $name): mixed
    {
        if (!array_key_exists($name, $this->bindings)) {
            throw new InvalidArgumentException(sprintf('No registered instance for "%s".', $name));
        }

        $resolver = $this->bindings[$name];

        if ($resolver instanceof Closure) {
            return $resolver($this);
        }

        return $resolver;
    }
}
