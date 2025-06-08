<?php

class Container
{
    private array $bindings = [];

    public function bind(string $key, callable $resolve)
    {
        $this->bindings[$key] = $resolve;
    }

    public function resolve(string $key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new Exception("Missing resolver function for key '{$key}'");
        }

        $resolve = $this->bindings[$key];

        return $resolve();
    }
}
