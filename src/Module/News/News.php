<?php
declare(strict_types=1);

namespace Project\Module\News;

use Project\Module\Event\Event;
use Project\Module\GenericValueObject\DateInterface;
use Project\Module\GenericValueObject\Id;
use Project\Module\GenericValueObject\Link;
use Project\Module\GenericValueObject\Text;
use Project\Module\GenericValueObject\Title;

class News
{
    const NEWS_IMAGE_ROOT_PATH = 'data/img/news/';

    /** @var Id $newsId */
    protected $newsId;

    /** @var Title $title */
    protected $title;

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
    public function getFacebookLink(): Link
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
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = self::NEWS_IMAGE_ROOT_PATH . $image;
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
}