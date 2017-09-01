<?php
declare(strict_types = 1);

namespace Project\Module\News;


use Project\Module\Database\Database;
use Project\Module\GenericValueObject\Id;
use Project\Module\GenericValueObject\Title;

class NewsRepository
{
    const TABLE = 'news';

    const ORDERBY = 'newsDate';

    const ORDERKIND = 'DESC';

    /** @var  Database $database */
    protected $database;

    /** @var  NewsFactory $newsFactory */
    protected $newsFactory;

    public function __construct(NewsFactory $newsFactory, Database $database)
    {
        $this->database = $database;
        $this->newsFactory = $newsFactory;
    }

    public function getAllNews(): array
    {
        $news = [];

        $newsResult = $this->database->fetchAllOrderBy(self::TABLE, self::ORDERBY, self::ORDERKIND);

        if (count($newsResult) === 0) {
            return $news;
        }

        foreach ($newsResult as $singleNews) {
            $news[] = $this->newsFactory->getNewsFromObject($singleNews);
        }

        return $news;
    }
}