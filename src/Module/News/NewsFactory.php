<?php
declare(strict_types=1);

namespace Project\Module\News;

use Project\Module\Event\Event;
use Project\Module\GenericValueObject\Date;
use Project\Module\GenericValueObject\Id;
use Project\Module\GenericValueObject\Image;
use Project\Module\GenericValueObject\Link;
use Project\Module\GenericValueObject\Text;
use Project\Module\GenericValueObject\Title;

class NewsFactory
{
    public function getNewsFromObject($object): News
    {
        $newsId = Id::fromString($object->newsId);
        $title = Title::fromString($object->title);
        $text = Text::fromString($object->text);
        $newsDate = Date::fromValue($object->newsDate);

        $news = new News($newsId, $title, $text, $newsDate);

        if (isset($object->image) && !empty($object->image)) {
            $image = Image::fromFile($object->image);

            $news->setImage($image);
        }

        if (isset($object->facebookLink) && !empty($object->facebookLink)) {
            $facebookLink = Link::fromString($object->facebookLink);

            $news->setFacebookLink($facebookLink);
        }

        return $news;
    }

    public function getNewsWithEventFromObject($object, Event $event): News
    {
        $news = $this->getNewsFromObject($object);

        $news->setEvent($event);

        return $news;
    }

    protected function isObjectValid($object): bool
    {
        if (!isset($object->newsId) || empty($object->newsId)) {
            return false;
        }

        return true;
    }
}