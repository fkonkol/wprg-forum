<?php

class App
{
    private static array $bindings = [];

    public static function bind(string $key, callable $resolve)
    {
        static::$bindings[$key] = $resolve;
    }

    public static function resolve(string $key)
    {
        if (!array_key_exists($key, static::$bindings)) {
            throw new Exception("Missing resolver function for key: '{$key}'");
        }

        $resolver = static::$bindings[$key];

        return $resolver();
    }
}
