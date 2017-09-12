<?php
declare(strict_types=1);

namespace Project\Module\Event;

use Project\Module\GenericValueObject\Datetime;
use Project\Module\GenericValueObject\Id;
use Project\Module\GenericValueObject\Link;
use Project\Module\GenericValueObject\Name;

class EventFactory
{
    /**
     * @param $object
     * @return Event
     */
    public function getEventFromObject($object): Event
    {
        $eventId = Id::fromString($object->eventId);
        $name = Name::fromString($object->name);
        $eventDate = Datetime::fromValue($object->eventDate);

        $event = new Event($eventId, $name, $eventDate);

        if (isset($object->facebookLink) && !empty($object->facebookLink)) {
            $facebookLink = Link::fromString($object->facebookLink);

            $event->setFacebookLink($facebookLink);
        }

        if (isset($object->newsId) && !empty($object->newsId)) {
            $newsId = Id::fromString($object->newsId);

            $event->setNewsId($newsId);
        }

        return $event;
    }
}