<?php

class Session
{
    public static function flash(string $key, $data)
    {
        $_SESSION['_flash'][$key] = $data;
    }

    public static function unflash()
    {
        unset($_SESSION['_flash']);
    }

    public static function user(): ?User
    {
        return isset($_SESSION['user']) ? new User($_SESSION['user']) : null;
    }
}
