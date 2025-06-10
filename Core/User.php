<?php

class User
{
    private $id;
    private $name;
    private $avatarUrl;

    public function __construct(array $params)
    {
        $this->id = $params['id'];
        $this->name = $params['name'];
        $this->avatarUrl = $params['avatar_url'];
    }

    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function avatarUrl()
    {
        return $this->avatarUrl;
    }
}
