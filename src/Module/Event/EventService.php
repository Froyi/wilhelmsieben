<?php
declare(strict_types = 1);

namespace Project\Module\Event;

use Project\Module\Database\Database;
use Project\Module\GenericValueObject\Id;

class EventService
{
    const EVENT_MAX_ENTRIES = 4;

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
        $events = [];

        $upcommingEvents = $this->eventRepository->getAllUpcommingEvents(self::EVENT_MAX_ENTRIES);

        foreach ($upcommingEvents as $upcommingEvent) {
            $events[] = $this->eventFactory->getEventFromObject($upcommingEvent);
        }

        return $events;
    }

    public function getEventByEventId($eventId): Event
    {
        if ($eventId instanceof Id === false) {
            $eventId = Id::fromString($eventId);
        }

        $event = $this->eventRepository->getEventByEventId($eventId);

        return $this->eventFactory->getEventFromObject($event);
    }

    public function sortEventByDateArray(array $events): array
    {
        $eventArray = [];

        /** @var Event $event */
        foreach ($events as $event) {
            $eventArray[$event->getDate()->getDate()][] = $event;
        }

        return $eventArray;
    }

    public function getAllEvents(): array
    {
        $events = [];

        $allEvents = $this->eventRepository->getAllEvents();

        foreach ($allEvents as $event) {
            $events[] = $this->eventFactory->getEventFromObject($event);
        }

        return $events;
    }
}