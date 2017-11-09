<?php
declare (strict_types=1);

namespace Project\Module\Album;

use Project\Module\GenericValueObject\Date;
use Project\Module\GenericValueObject\Id;
use Project\Module\GenericValueObject\Image as ImageSource;
use Project\Module\GenericValueObject\Link;
use Project\Module\GenericValueObject\Title;

/**
 * Class AlbumFactory
 * @package Project\Module\Album
 */
class AlbumFactory
{
    /**
     * @param $object
     * @return Album
     */
    public function getAlbumFromObject($object): Album
    {
        $albumId = Id::fromString($object->albumId);
        $title = Title::fromString($object->title);

        /** @var Date $albumDate */
        $albumDate = Date::fromValue($object->albumDate);

        return new Album($albumId, $title, $albumDate);
    }

    /**
     * @param $object
     * @return Image
     */
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

    /**
     * @param ImageSource $imageSource
     * @param null|string $title
     * @param Id          $albumId
     * @return null|Image
     */
    public function createNewImage(ImageSource $imageSource, ?string $title, Id $albumId): ?Image
    {
        $imageId = Id::generateId();
        $imageUrl = Link::fromString($imageSource->toString());

        $image = new Image($imageId, $imageUrl, $imageSource, $albumId);

        if (!empty($title)) {
            $title = Title::fromString($title);

            $image->setTitle($title);
        }

        return $image;
    }
}