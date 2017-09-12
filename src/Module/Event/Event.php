<?php
declare(strict_types = 1);

namespace Project\Module\Event;

use Project\Module\GenericValueObject\Date;
use Project\Module\GenericValueObject\DateInterface;
use Project\Module\GenericValueObject\Name;
use Project\Module\News\News;

class Event
{
    /** @var  DateInterface */
    protected $date;

    /** @var  News $news */
    protected $news;

    public function __construct(DateInterface $date)
    {
        $this->name = $name;
        $this->date = $date;
    }

    /**
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @return DateInterface
     */
    public function getDate(): DateInterface
    {
        return $this->date;
    }

    /**
     * @return News
     */
    public function getNews(): ?News
    {
        return $this->news;
    }

    /**
     * @param News $news
     */
    public function setNews(News $news)
    {
        $this->news = $news;
    }
}