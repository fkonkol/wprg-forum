<?php

class Metadata
{
    private int $currentPage;
    private int $limit;
    private int $totalRecords;

    public function __construct(int $currentPage, int $limit, int $totalRecords)
    {
        $this->currentPage = $currentPage;
        $this->limit = $limit;
        $this->totalRecords = $totalRecords;
    }

    public function hasPreviousPage()
    {
        return $this->currentPage > 1;
    }

    public function hasNextPage()
    {
        return $this->currentPage != $this->totalPages();
    }


    public function currentPage()
    {
        return $this->currentPage;
    }

    public function limit()
    {
        return $this->limit;
    }

    public function totalRecords()
    {
        return $this->totalRecords;
    }

    public function totalPages()
    {
        return ceil($this->totalRecords / $this->limit);
    }
}
