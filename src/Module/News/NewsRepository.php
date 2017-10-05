<?php
declare(strict_types = 1);

namespace Project\Module\News;

use Project\Module\Database\Database;
use Project\Module\GenericValueObject\Id;

class NewsRepository
{
    const TABLE = 'news';

    const ORDERBY = 'newsDate';

    const ORDERKIND = 'DESC';

    const IDENTIFIER = 'newsId';

    /** @var  Database $database */
    protected $database;

    /**
     * NewsRepository constructor.
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database;
    }


    /**
     * @return array
     */
    public function getAllNews(): array
    {
        $query = $this->database->getNewSelectQuery(self::TABLE);
        return $this->database->fetchAllOrderBy(self::TABLE, self::ORDERBY, self::ORDERKIND);
    }

    public function getNewsByNewsId(Id $newsId)
    {
        return $this->database->fetchById(self::TABLE, 'newsId', $newsId->toString());
    }

    public function saveNews(News $news)
    {

        $parameter = $news->extract();
        if (!empty($this->getNewsByNewsId($news->getNewsId()))) {
            $identifier = [self::IDENTIFIER => $news->getNewsId()];

            $this->database->update(self::TABLE, $identifier, $parameter);
        }
    }
}