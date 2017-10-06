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
        $query->orderBy(self::ORDERBY, self::ORDERKIND);

        return $this->database->fetchAll($query);
    }

    public function getNewsByNewsId(Id $newsId)
    {
        $query = $this->database->getNewSelectQuery(self::TABLE);
        $query->where('newsId', '=', $newsId->toString());

        return $this->database->fetch($query);
    }

    public function saveNews(News $news)
    {

        /*$parameter = $news->extract();
        if (!empty($this->getNewsByNewsId($news->getNewsId()))) {
            $identifier = [self::IDENTIFIER => $news->getNewsId()];

            // $this->database->update(self::TABLE, $identifier, $parameter);
        }*/
    }
}