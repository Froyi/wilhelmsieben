<?php
declare(strict_types=1);

namespace Project\Module\Album;

use Project\Module\GenericValueObject\Id;
use Project\Module\GenericValueObject\Link;
use Project\Module\GenericValueObject\Image as ImageSource;
use Project\Module\GenericValueObject\Title;

class Image
{
    /** @var Id $imageId */
    protected $imageId;

    /** @var Link $imageUrl */
    protected $imageUrl;

    /** @var  ImageSource $image */
    protected $image;

    /** @var  $title */
    protected $title;

    /** @var  Id $albumId */
    protected $albumId;

    public function __construct(Id $imageId, Link $imageUrl, ImageSource $image, Id $albumId)
    {
        $this->imageId = $imageId;
        $this->imageUrl = $imageUrl;
        $this->albumId = $albumId;
        $this->image = $image;
    }

    /**
     * @return Id
     */
    public function getImageId(): Id
    {
        return $this->imageId;
    }

    /**
     * @return Link
     */
    public function getImageUrl(): Link
    {
        return $this->imageUrl;
    }

    /**
     * @param Link $imageUrl
     */
    public function setImageUrl(Link $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * @return mixed
     */
    public function getTitle(): ?Title
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
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
     * @return ImageSource
     */
    public function getImage(): ImageSource
    {
        return $this->image;
    }


}