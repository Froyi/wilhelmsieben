<?php
declare(strict_types=1);

namespace Project\Module\News;

use Project\Module\Event\Event;
use Project\Module\GenericValueObject\DateInterface;
use Project\Module\GenericValueObject\Id;
use Project\Module\GenericValueObject\Image;
use Project\Module\GenericValueObject\Link;
use Project\Module\GenericValueObject\Text;
use Project\Module\GenericValueObject\Title;

class News
{
    /** @var Id $newsId */
    protected $newsId;

    /** @var Title $title */
    protected $title;

    /** @var  Image $image */
    protected $image;

    /** @var  Text $text */
    protected $text;

    /** @var Link $facebookLink */
    protected $facebookLink;

    /** @var  DateInterface $date */
    protected $date;

    /** @var  Event $event */
    protected $event;

    public function __construct(Id $id, Title $title, Text $text, DateInterface $date)
    {
        $this->newsId = $id;
        $this->title = $title;
        $this->date = $date;
        $this->text = $text;
    }

    /**
     * @return DateInterface
     */
    public function getDate(): DateInterface
    {
        return $this->date;
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
    public function setFacebookLink(Link $facebookLink): void
    {
        $this->facebookLink = $facebookLink;
    }

    /**
     * @return Image
     */
    public function getImage(): ?Image
    {
        return $this->image;
    }

    /**
     * @param Image $image
     */
    public function setImage(Image $image): void
    {
        $this->image = $image;
    }

    /**
     * @return Id
     */
    public function getNewsId(): Id
    {
        return $this->newsId;
    }

    /**
     * @return Title
     */
    public function getTitle(): Title
    {
        return $this->title;
    }

    /**
     * @return Text
     */
    public function getText(): Text
    {
        return $this->text;
    }

    /**
     * @return Event
     */
    public function getEvent(): Event
    {
        return $this->event;
    }

    /**
     * @param Event $event
     */
    public function setEvent(Event $event)
    {
        $this->event = $event;
    }

    /**
     * @return bool
     */
    public function hasEvent(): bool
    {
        return ($this->event !== null);
    }
}