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

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getAllSoupCalendarEntries(int $limit = null): array
    {
        $soupCalendarEntries = [];

        $soupCalendarDb = $this->database->fetchAllOrderBy(self::TABLE, self::ORDERBY, self::ORDERKIND);

        foreach ($soupCalendarDb as $soupCalendarEntry) {
            /** @var Soup $soup */
            $soup = Soup::fromString($soupCalendarEntry->soup);
            
            /** @var Date $soupDate */
            $soupDate = Date::fromValue($soupCalendarEntry->soupDate);

            if ($limit === null || ($limit !== null && $limit > count($soupCalendarEntries))) {
                $soupCalendarEntries[] = SoupCalendarEntry::generateSoupCalendarEntry($soup, $soupDate);
            }
        }

        return $soupCalendarEntries;
    }

    /**
     * @todo Hier kann die Erstellung eines SoupCalendarEntry in eine Factory ausgelagert werden
     * @return array
     */
    public function getDailySoup(): array
    {
        $soupCalendarDb = $this->database->fetchByStringParameter(self::TABLE, 'soupDate', Date::fromValue('now')->toString());

        $soupCalendarEntries = [];

        if ($soupCalendarDb === false) {
            return $soupCalendarEntries;
        }

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