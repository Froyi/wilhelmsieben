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

        return $this->database->fetchByDateParameterFuture(self::TABLE, self::EVENT_DATE_NAME, $now->toString(), self::ORDERBY, self::ORDERKIND, $limit);
    }

    public function getEventByEventId(Id $eventId)
    {
        return $this->database->fetchById(self::TABLE, self::EVENT_ID_NAME, $eventId->toString());
    }
}