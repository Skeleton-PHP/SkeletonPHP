<?php
namespace SkeletonPHP\Core;

class Container {
    protected $instances = [];

    // Register a resolver callable for a name
    public function set($name, callable $resolver) {
        $this->instances[$name] = $resolver;
    }

    // Get an instance by executing its resolver
    public function get($name) {
        if (isset($this->instances[$name])) {
            return $this->instances[$name]($this);
        }
        throw new \Exception("No registered instance for " . $name);
    }
}
?>