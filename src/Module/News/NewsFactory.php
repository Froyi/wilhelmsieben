<?php
declare(strict_types = 1);

namespace Project\Module\News;

use Project\Module\GenericValueObject\Date;
use Project\Module\GenericValueObject\Id;
use Project\Module\GenericValueObject\Link;
use Project\Module\GenericValueObject\Text;
use Project\Module\GenericValueObject\Title;

class NewsFactory
{
    public function getNewsFromObject($object): News
    {
        $newsId = Id::fromString($object->newsId);
        $title = Title::fromString($object->title);
        $image = $object->image;
        $text = Text::fromString($object->text);
        $facebookLink = Link::fromString($object->facebookLink);
        $newsDate = Date::fromValue($object->newsDate);

        $news = new News($newsId, $title, $text, $newsDate);
        $news->setImage($image);
        $news->setFacebookLink($facebookLink);

        return $news;
    }
}