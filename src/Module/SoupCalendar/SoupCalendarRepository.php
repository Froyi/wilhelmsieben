<?php
declare(strict_types=1);

namespace Project\Module\SoupCalendar;

use Project\Module\Database\Database;
use Project\Module\GenericValueObject\Date;

class SoupCalendarRepository
{
    const TABLE = 'soupcalendar';

    const ORDERBY = 'soupDate';

    const ORDERKIND = 'ASC';

    /** @var  Database $database */
    protected $database;

    /**
     * SoupCalendarRepository constructor.
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    /**
     * @return array
     */
    public function getAllSoupCalendarEntries(): array
    {
        $query = $this->database->getNewSelectQuery(self::TABLE);
        $query->orderBy(self::ORDERBY, self::ORDERKIND);

        return $this->database->fetchAll($query);
    }

    /**
     * @return array
     */
    public function getDailySoup(): array
    {
        $query = $this->database->getNewSelectQuery(self::TABLE);
        $query->where('soupDate', '=', Date::fromValue('now')->toString());

        return $this->database->fetchAll($query);
    }
}