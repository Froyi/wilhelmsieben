<?php
declare(strict_types = 1);

namespace Project\Module\Event;

use Project\Module\Database\Database;

class EventService
{
    const EVENT_MAX_ENTRIES = 3;

    /** @var  EventRepository $eventRepository */
    protected $eventRepository;

    /** @var  EventFactory $eventFactory */
    protected $eventFactory;

    public function __construct(Database $database)
    {
        $this->eventRepository = new EventRepository($database);
        $this->eventFactory = new EventFactory();
    }

    public function getUpcommingEvents(): array
    {
        $resultEvents = $this->eventRepository->getAllEvents(self::EVENT_MAX_ENTRIES);
    }
}