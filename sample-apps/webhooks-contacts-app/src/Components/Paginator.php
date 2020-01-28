<?php

namespace Components;

use Exception;

class Paginator
{
    /**
     * @var string
     */
    protected $url;
    /**
     * @var int
     */
    protected $count;

    /**
     * @var int
     */
    protected $page = 1;

    /**
     * @var int
     */
    protected $perPage = 10;

    /**
     * @var int
     */
    protected $countPages;

    /**
     * @var int
     */
    protected $startPage = 1;

    /**
     * @var int
     */
    protected $endPage;

    /**
     * @var int
     */
    protected $outOnPage = 10;

    public function __construct(int $count, string $url)
    {
        $this->count = $count;
        $this->url = $url;
        $this->endPage = $this->outOnPage;
        $this->init();
    }

    public function init()
    {
        $this->countPages = intval(ceil($this->count / $this->perPage));
        if (array_key_exists('page', $_GET) && intval($_GET['page'])) {
            $this->page = intval($_GET['page']);
            if ($this->page > $this->countPages) {
                throw new Exception('Page not found.', 404);
            }
        }
        if ($this->countPages >= $this->outOnPage) {
            $count = $this->outOnPage - 1;
            $half = ceil($this->outOnPage / 2) - 1;
            $startPage = $this->page - $half;
            $endPage = $startPage + $count;
            if ($endPage > $this->countPages) {
                $this->endPage = $this->countPages;
                $this->startPage = $this->endPage - $count;
            } elseif ($startPage > 0) {
                $this->startPage = $startPage;
                $this->endPage = $endPage;
            }

            return;
        }
        if ($this->endPage > $this->countPages) {
            $this->endPage = $this->countPages;
        }
    }

    public function getPagesCount(): int
    {
        return $this->countPages;
    }

    public function getStartPage(): int
    {
        return $this->startPage;
    }

    public function getEndPage(): int
    {
        return $this->endPage;
    }

    public function getPrevPage(): int
    {
        if ($this->page > 1) {
            return $this->page - 1;
        }

        return $this->countPages;
    }

    public function getNextPage()
    {
        if ($this->page != $this->countPages) {
            return $this->page + 1;
        }

        return 1;
    }

    public function getUrl(int $page): string
    {
        return $this->url.'?page='.$page;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getFrom(): int
    {
        return ($this->page - 1) * $this->perPage;
    }

    public function getPerPage(): int
    {
        return $this->perPage;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}
