<?php

class Category
{
    private int $id;
    private string $slug;
    private string $name;

    public function __construct(array $params)
    {
        $this->id = $params['id'];
        $this->slug = $params['slug'];
        $this->name = $params['name'];
    }

    public function id()
    {
        return $this->id;
    }

    public function slug()
    {
        return $this->slug;
    }

    public function name()
    {
        return $this->name;
    }
}
