<?php
declare(strict_types = 1);

namespace Project\Module\Event;

use Project\Module\Database\Database;

class EventRepository
{
    const TABLE = 'news';

    const ORDERBY = 'eventDate';

    const ORDERKIND = 'ASC';

    /** @var  Database $database */
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getAllEvents(int $limit = null): array
    {
        return $this->database->fetchAllOrderBy(self::TABLE, self::ORDERBY, self::ORDERKIND);
    }
}