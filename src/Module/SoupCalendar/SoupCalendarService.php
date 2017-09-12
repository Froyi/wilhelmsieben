<?php
declare(strict_types = 1);

namespace Project\Module\SoupCalendar;

use Project\Module\Database\Database;

class SoupCalendarService
{
    const SOUP_VIEW_ENTRIES = 2;

    /** @var  SoupCalendarRepository $soupCalendarRepository */
    protected $soupCalendarRepository;

    /** @var SoupCalendarEntryFactory $soupCalendarEntryFactory */
    protected $soupCalendarEntryFactory;

    /**
     * SoupCalendarService constructor.
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->soupCalendarRepository = new SoupCalendarRepository($database);
        $this->soupCalendarEntryFactory = new SoupCalendarEntryFactory();
    }

    /**
     * @return array
     */
    public function getAllSoupCalendarEntriesByDate(): array
    {
        return $this->handleResponse($this->soupCalendarRepository->getAllSoupCalendarEntries());
    }

    /**
     * @return array
     */
    public function getDailySoup(): array
    {
        return $this->handleResponse($this->soupCalendarRepository->getDailySoup());
    }

    /**
     * @param $response
     * @return array
     */
    protected function handleResponse($response): array
    {
        $soupCalendarEntries = [];

        if ($response === false) {
            return $soupCalendarEntries;
        }

        foreach ($response as $soupCalendarEntry) {
            $soupCalendarEntries[] = $this->soupCalendarEntryFactory->getSoupCalendarEntryFromObject($soupCalendarEntry);
        }

        return $soupCalendarEntries;
    }
}