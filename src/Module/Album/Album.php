<?php
declare(strict_types=1);

namespace Project\Module\Album;

use Project\Module\GenericValueObject\Date;
use Project\Module\GenericValueObject\Id;
use Project\Module\GenericValueObject\Title;

/**
 * Class Album
 * @package Project\Module\Album
 */
class Album
{
    /** @var Id $albumId */
    protected $albumId;

    /** @var Title $title */
    protected $title;

    /** @var Date $albumDate */
    protected $albumDate;

    /** @var array $imageList */
    protected $imageList = [];


    /**
     * Album constructor.
     * @param Id $albumId
     * @param Title $title
     * @param Date $albumDate
     */
    public function __construct(Id $albumId, Title $title, Date $albumDate)
    {
        $this->albumId = $albumId;
        $this->title = $title;
        $this->albumDate = $albumDate;
    }

    /**
     * @return Title
     */
    public function getTitle(): Title
    {
        return $this->title;
    }

    /**
     * @param Title $title
     */
    public function setTitle(Title $title): void
    {
        $this->title = $title;
    }

    /**
     * @return Id
     */
    public function getAlbumId(): Id
    {
        return $this->albumId;
    }

    /**
     * @return Date
     */
    public function getAlbumDate(): Date
    {
        return $this->albumDate;
    }

    /**
     * @param Date $albumDate
     */
    public function setAlbumDate(Date $albumDate): void
    {
        $this->albumDate = $albumDate;
    }

    /**
     * @param Image $image
     */
    public function addImageToImageList(Image $image): void
    {
        $this->imageList[$image->getImageId()->toString()] = $image;
    }

    /**
     * @param Id $imageId
     * @return bool
     */
    public function removeImageFromImageList(Id $imageId): bool
    {
        if (isset($this->imageList[$imageId->toString()])) {
            unset($this->imageList[$imageId->toString()]);

            return true;
        }

        return false;
    }

    /**
     * @return array
     */
    public function getImageList(): array
    {
        return $this->imageList;
    }

    /**
     *
     */
    public function removeAllImagesFromList(): void
    {
        $this->imageList = [];
    }

    /**
     * @return int
     */
    public function getAmountOfImagesInAlbum(): int
    {
        return count($this->imageList);
    }

    /**
     * @param Id $imageId
     * @return null|Image
     */
    public function getImageFromImageListById(Id $imageId): ?Image
    {
        if (isset($this->imageList[$imageId->toString()])) {
            return $this->imageList[$imageId->toString()];
        }

        return null;
    }

    /**
     * @return Image
     */
    public function getAlbumPreviewImage(): Image
    {
        $randomImage = array_rand($this->imageList);

        return $this->imageList[$randomImage];
    }
}