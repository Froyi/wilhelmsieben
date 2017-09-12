<?php
declare(strict_types = 1);

namespace Project\Module\News;

use Project\Module\Database\Database;

class NewsRepository
{
    const TABLE = 'news';

    const ORDERBY = 'newsDate';

    const ORDERKIND = 'DESC';

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
        return $this->database->fetchAllOrderBy(self::TABLE, self::ORDERBY, self::ORDERKIND);
    }
}