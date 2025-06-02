<?php

class Session
{
    public static function user(): ?User
    {
        return isset($_SESSION['user']) ? new User($_SESSION['user']) : null;
    }
}
