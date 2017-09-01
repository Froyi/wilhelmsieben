<?php
declare(strict_types=1);

namespace Project\Module\News;

use Project\Module\GenericValueObject\Id;
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

    protected $facebookLink;

    protected $date;

    public function __construct(Id $id, Title $title, Text $text, $date)
    {
        $this->newsId = $id;
        $this->title = $title;
        $this->date = $date;
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getFacebookLink()
    {
        return $this->facebookLink;
    }

    /**
     * @param mixed $facebookLink
     */
    public function setFacebookLink($facebookLink)
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
    public function setImage($image)
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
}