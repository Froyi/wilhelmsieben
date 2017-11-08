<?php
declare(strict_types=1);

namespace Project\Module\Event;

use Project\Module\Database\Database;
use Project\Module\Database\Query;
use Project\Module\GenericValueObject\Datetime;
use Project\Module\GenericValueObject\Id;

class EventRepository
{
    const TABLE = 'event';

    const ORDERBY = 'eventDate';

    const ORDERKIND = 'ASC';

    const ORDERKIND_NEWEST = 'DESC';

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

    public function getAllEvents()
    {
        $query = $this->database->getNewSelectQuery(self::TABLE);
        $query->orderBy(self::ORDERBY, Query::DESC);

        return $this->database->fetchAll($query);
    }

    public function getEventByEventId(Id $eventId)
    {
        $query = $this->database->getNewSelectQuery(self::TABLE);
        $query->where(self::EVENT_ID_NAME, '=', $eventId->toString());

        return $this->database->fetch($query);
    }

    public function saveEvent(Event $event): bool
    {
        if (!empty($this->getEventByEventId($event->getEventId()))) {
            $query = $this->database->getNewUpdateQuery(self::TABLE);
            $query->set('eventId', $event->getEventId()->toString());
            $query->set('name', $event->getName()->getName());
            $query->set('eventDate', $event->getDate()->toString());


            if ($event->getFacebookLink() !== null) {
                $query->set('facebookLink', $event->getFacebookLink()->toString());
            } else {
                $query->set('facebookLink');
            }

            $query->where('eventId', '=', $event->getEventId()->toString());

            return $this->database->execute($query);
        }

        $query = $this->database->getNewInsertQuery(self::TABLE);
        $query->insert('eventId', $event->getEventId()->toString());
        $query->insert('name', $event->getName()->getName());
        $query->insert('eventDate', $event->getDate()->toString());


        if ($event->getFacebookLink() !== null) {
            $query->insert('facebookLink', $event->getFacebookLink()->toString());
        }

        return $this->database->execute($query);
    }

    public function deleteEvent(Event $event): bool
    {
        $query = $this->database->getNewDeleteQuery(self::TABLE);
        $query->where('eventId', '=', $event->getEventId()->toString());

        return $this->database->execute($query);
    }
}