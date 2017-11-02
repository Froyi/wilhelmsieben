<?php
declare(strict_types=1);

namespace Project\Module\Album;

use Project\Module\GenericValueObject\Date;
use Project\Module\GenericValueObject\Id;
use Project\Module\GenericValueObject\Link;
use Project\Module\GenericValueObject\Title;
use Project\Module\GenericValueObject\Image as ImageSource;

class AlbumFactory
{
    public function getAlbumFromObject($object): Album
    {
        $albumId = Id::fromString($object->albumId);
        $title = Title::fromString($object->title);

        /** @var Date $albumDate */
        $albumDate = Date::fromValue($object->albumDate);

        return new Album($albumId, $title, $albumDate);

    }

    public function getImageFromObject($object): Image
    {
        $imageId = Id::fromString($object->imageId);
        $imageUrl = Link::fromString($object->imageUrl);
        $albumId = Id::fromString($object->albumId);
        $imageSource = ImageSource::fromFile($imageUrl->toString());

        $image = new Image($imageId, $imageUrl, $imageSource, $albumId);

        if (isset($object->title) && !empty($object->title)) {
            $title = Title::fromString($object->title);

            $image->setTitle($title);
        }

        return $image;
    }
}