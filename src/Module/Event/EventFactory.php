<?php
declare(strict_types=1);

namespace Project\Module\Event;

use Project\Module\GenericValueObject\Date;
use Project\Module\GenericValueObject\Name;
use Project\Module\News\NewsRepository;

class EventFactory
{
    /** @var  NewsRepository $newsRepository */
    protected $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function getEventFromObject($object): Event
    {
        $name = Name::fromString($object->name);
        $date = Date::fromValue($object->date);

        $event = new Event($name, $date);

        return $event;
    }
}