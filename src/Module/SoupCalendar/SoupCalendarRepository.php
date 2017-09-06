<?php
declare(strict_types = 1);

namespace Project\Module\SoupCalendar;

use Project\Module\Database\Database;
use Project\Module\GenericValueObject\Date;

class SoupCalendarRepository
{
    const TABLE = 'soupCalendar';

    const ORDERBY = 'soupDate';

    const ORDERKIND = 'ASC';

    /** @var  Database $database */
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getAllSoupCalendarEntries(): array
    {
        $soupCalendarEntries = [];

        $soupCalendarDb = $this->database->fetchAllOrderBy(self::TABLE, self::ORDERBY, self::ORDERKIND);

        foreach ($soupCalendarDb as $soupCalendarEntry) {
            /** @var Soup $soup */
            $soup = Soup::fromString($soupCalendarEntry->soup);
            
            /** @var Date $soupDate */
            $soupDate = Date::fromValue($soupCalendarEntry->soupDate);

            $soupCalendarEntries[] = SoupCalendarEntry::generateSoupCalendarEntry($soup, $soupDate);
        }

        return $soupCalendarEntries;
    }
}