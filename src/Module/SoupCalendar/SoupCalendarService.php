<?php
declare(strict_types = 1);

namespace Project\Module\SoupCalendar;

use Project\Module\Database\Database;

class SoupCalendarService
{
    /** @var  SoupCalendarRepository $soupCalendarRepository */
    protected $soupCalendarRepository;

    public function __construct(Database $database)
    {
        $this->soupCalendarRepository = new SoupCalendarRepository($database);
    }

    public function getAllSoupCalendarEntriesByDate(): array
    {
        return $this->soupCalendarRepository->getAllSoupCalendarEntries();
    }
}