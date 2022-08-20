<?php

class Paginator
{

    public $currentPage;
    public $perPage;
    public $totalCount;

    public function __construct($page = 1, $perPage = 20, $totalCount = 0)
    {
        $this->currentPage = (int) $page;
        $this->perPage = (int) $perPage;
        $this->totalCount = isset($totalCount->numevents) ? (int) $totalCount->numevents : 0;
    }

    public function offset()
    {
        return $this->perPage * ($this->currentPage - 1);
    }

    public function totalPages()
    {
        return ceil($this->totalCount / $this->perPage);
    }

    public function next()
    {
        $next = $this->currentPage + 1;
        return ($next <= $this->totalPages()) ? $next : false;
    }

    public function previous()
    {
        $prev = $this->currentPage - 1;
        return ($prev > 0) ? $prev : false;
    }
}
