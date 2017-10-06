<?php
declare(strict_types=1);

namespace Project\Module\Event;

use Project\Module\Database\Database;
use Project\Module\GenericValueObject\Datetime;
use Project\Module\GenericValueObject\Id;

class EventRepository
{
    const TABLE = 'event';

    const ORDERBY = 'eventDate';

    const ORDERKIND = 'ASC';

    const EVENT_ID_NAME = 'eventId';

    const EVENT_DATE_NAME = 'eventDate';

    /** @var  Database $database */
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getAllUpcommingEvents(int $limit = null)
    {
        $now = Datetime::fromValue('now');

        $query = $this->database->getNewSelectQuery(self::TABLE);
        $query->where(self::EVENT_DATE_NAME, '>', $now->toString());
        $query->orderBy(self::ORDERBY, self::ORDERKIND);

        if ($limit !== null) {
            $query->limit($limit);
        }

        return $this->database->fetchAll($query);
    }

    public function getEventByEventId(Id $eventId)
    {
        $query = $this->database->getNewSelectQuery(self::TABLE);
        $query->where(self::EVENT_ID_NAME, '=', $eventId->toString());

        return $this->database->fetch($query);
    }
}