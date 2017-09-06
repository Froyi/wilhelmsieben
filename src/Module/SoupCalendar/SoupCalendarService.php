<?php
declare(strict_types = 1);

namespace Project\Module\SoupCalendar;

use Project\Module\Database\Database;

class SoupCalendarService
{
    const SOUP_VIEW_ENTRIES = 2;

    /** @var  SoupCalendarRepository $soupCalendarRepository */
    protected $soupCalendarRepository;

    /**
     * SoupCalendarService constructor.
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->soupCalendarRepository = new SoupCalendarRepository($database);
    }


    /**
     * @todo prüfe, ob die Funktion überhaupt notwendig ist
     * @return array
     */
    public function getAllSoupCalendarEntriesByDate(): array
    {
        return $this->soupCalendarRepository->getAllSoupCalendarEntries(self::SOUP_VIEW_ENTRIES);
    }

    /**
     * @return array
     */
    public function getDailySoup(): array
    {
        return $this->soupCalendarRepository->getDailySoup();
    }
}