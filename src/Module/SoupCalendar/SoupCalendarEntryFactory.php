<?php
declare(strict_types=1);

namespace Project\Module\SoupCalendar;

use Project\Module\GenericValueObject\Date;

class SoupCalendarEntryFactory
{
    /**
     * @param $object
     * @return SoupCalendarEntry
     */
    public function getSoupCalendarEntryFromObject($object): SoupCalendarEntry
    {
        $soup = Soup::fromString($object->soup);
        $soupDate = Date::fromValue($object->soupDate);

        return SoupCalendarEntry::generateSoupCalendarEntry($soup, $soupDate);
    }
}