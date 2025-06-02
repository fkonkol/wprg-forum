<?php

class User
{
    private $id;
    private $name;

    public function __construct(array $params)
    {
        $this->id = $params['id'];
        $this->name = $params['name'];
    }

    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }
}
