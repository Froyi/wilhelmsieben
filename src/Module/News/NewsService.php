<?php
declare(strict_types = 1);

namespace Project\Module\News;

use Project\Module\Database\Database;

class NewsService
{
    /** @var  NewsFactory $newsFactory */
    protected $newsFactory;

    /** @var  NewsRepository $newsRepository */
    protected $newsRepository;

    public function __construct(Database $database)
    {
        $this->newsFactory = new NewsFactory();
        $this->newsRepository = new NewsRepository($this->newsFactory, $database);
    }

    public function getAllNewsOrderByDate(): array
    {
        return $this->newsRepository->getAllNews();
    }
}