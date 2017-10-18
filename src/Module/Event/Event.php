<?php
declare(strict_types = 1);

namespace Project\Module\Event;

use Project\Module\GenericValueObject\DatetimeInterface;
use Project\Module\GenericValueObject\Id;
use Project\Module\GenericValueObject\Link;
use Project\Module\GenericValueObject\Name;

class Event
{
    /** @var  Id $eventId */
    protected $eventId;

    /** @var  Name $name */
    protected $name;

    /** @var  Link $facebookLink */
    protected $facebookLink;

    /** @var  DatetimeInterface */
    protected $date;

    /**
     * Event constructor.
     * @param Id                $eventId
     * @param Name              $name
     * @param DatetimeInterface $date
     */
    public function __construct(Id $eventId, Name $name, DatetimeInterface $date)
    {
        $this->eventId = $eventId;
        $this->name = $name;
        $this->date = $date;
    }

    /**
     * @return Id
     */
    public function getEventId(): Id
    {
        return $this->eventId;
    }

    /**
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @return Link
     */
    public function getFacebookLink(): ?Link
    {
        return $this->facebookLink;
    }

    /**
     * @param Link $facebookLink
     */
    public function setFacebookLink(Link $facebookLink)
    {
        $this->facebookLink = $facebookLink;
    }

    /**
     * @return DatetimeInterface
     */
    public function getDate(): DatetimeInterface
    {
        return $this->date;
    }
}