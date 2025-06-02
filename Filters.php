<?php

class Filters
{
    private string $category;
    private int $page;
    private int $limit;

    public function __construct(array $params = [])
    {
        $this->category = $params['category'] ?? '';
        $this->page = isset($params['page']) && is_numeric($params['page']) ? (int) $params['page'] : 1;
        $this->limit = 5;
    }

    public function category()
    {
        return $this->category;
    }

    public function page()
    {
        return $this->page;
    }

    public function limit()
    {
        return $this->limit;
    }

    public function offset()
    {
        return ($this->page - 1) * $this->limit;
    }
}
