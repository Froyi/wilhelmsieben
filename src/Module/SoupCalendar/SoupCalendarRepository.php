<?php
declare(strict_types = 1);

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
        return $this->database->fetchAllOrderBy(self::TABLE, self::ORDERBY, self::ORDERKIND);
    }

    /**
     * @return array
     */
    public function getDailySoup(): array
    {
        return $this->database->fetchByStringParameter(self::TABLE, 'soupDate', Date::fromValue('now')->toString());
    }
}