<?php
declare (strict_types=1);

namespace Project\Module\Album;

use Project\Module\Database\Database;
use Project\Module\GenericValueObject\Id;
use Project\Module\GenericValueObject\Image as ValueImage;
use Project\Utilities\Tools;

/**
 * Class AlbumService
 * @package Project\Module\Album
 */
class AlbumService
{
    /** @var  AlbumFactory $albumFactory */
    protected $albumFactory;

    /** @var  AlbumRepository $albumRepository */
    protected $albumRepository;

    /**
     * AlbumService constructor.
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->albumFactory = new AlbumFactory();
        $this->albumRepository = new AlbumRepository($database);
    }

    /**
     * @return array
     */
    public function getAllAlbumsWithImages(): array
    {
        $albums = [];

        $albumResult = $this->albumRepository->getAllAlbums();

        if (count($albumResult) === 0) {
            return $albums;
        }

        foreach ($albumResult as $album) {
            /** @var Album $album */
            $album = $this->albumFactory->getAlbumFromObject($album);

            $albumImages = $this->albumRepository->getImagesForAlbum($album->getAlbumId());

            $album = $this->addAlbumImagesToAlbum($album, $albumImages);

            $albums[$album->getAlbumId()->toString()] = $album;
        }

        return $albums;
    }

    /**
     * @param $albumId
     * @return null|Album
     */
    public function getAlbumWithImagesByAlbumId($albumId): ?Album
    {
        if ($albumId instanceof Id === false) {
            $albumId = Id::fromString($albumId);
        }

        $album = $this->albumRepository->getAlbumByAlbumId($albumId);

        if (empty($album)) {
            return null;
        }

        $album = $this->albumFactory->getAlbumFromObject($album);

        $albumImages = $this->albumRepository->getImagesForAlbum($album->getAlbumId());

        $album = $this->addAlbumImagesToAlbum($album, $albumImages);

        return $album;
    }

    /**
     * @param array $parameter
     * @return Album
     */
    public function getAlbumByParameter(array $parameter): Album
    {
        $objectParameter = (object)$parameter;

        if (!isset($objectParameter->albumId) || (isset($objectParameter->albumId) && empty($objectParameter->albumId))) {
            $objectParameter->albumId = Id::generateId()->toString();
        }

        $album = $this->albumFactory->getAlbumFromObject($objectParameter);

        if (!empty($objectParameter->image)) {
            $album = $this->addAlbumImagesToAlbum($album, $objectParameter->image);
        }

        /** adding new image to album */
        if (Tools::getFile('imageNew') !== false) {
            $albumImage = $this->createAlbumImage(Tools::getFile('imageNew'), Tools::getValue('imageNewTitle'), $album->getAlbumId());

            $album->addImageToImageList($albumImage);
        }

        return $album;
    }

    /**
     * @param Album $album
     * @return bool
     */
    public function saveAlbum(Album $album): bool
    {
        if ($this->albumRepository->saveAlbum($album) === true) {
            foreach ($album->getImageList() as $image) {
                $this->albumRepository->saveImage($image);
            }

            return true;
        }

        return false;
    }

    /**
     * @param Album $album
     * @return bool
     */
    public function deleteAlbumWithImages(Album $album): bool
    {
        $imageList = $album->getImageList();

        foreach ($imageList as $image) {
            $this->albumRepository->deleteImage($image);
        }

        return $this->albumRepository->deleteAlbum($album);
    }

    public function deleteAlbumImagesByParameter(array $parameter): bool
    {
        if (!empty($parameter['image-delete'])) {
            foreach ($parameter['image-delete'] as $imageId => $status) {
            }
        }
    }

    /**
     * @param Album $album
     * @param       $albumImages
     * @return Album
     */
    protected function addAlbumImagesToAlbum(Album $album, array $albumImages): Album
    {
        if (count($albumImages) > 0) {
            foreach ($albumImages as $albumImage) {
                $albumImage = (object)$albumImage;

                /** @var Image $image */
                $image = $this->albumFactory->getImageFromObject($albumImage);

                $album->addImageToImageList($image);
            }
        }

        return $album;
    }

    /**
     * @param array $file
     * @param       $imageNewTitle
     * @param Id    $albumId
     * @return null|Image
     */
    protected function createAlbumImage(array $file, $imageNewTitle, Id $albumId): ?Image
    {
        $newImage = ValueImage::fromUploadWithSave($file, ValueImage::PATH_ALBUM);

        $title = '';
        if ($imageNewTitle !== false) {
            $title = $imageNewTitle;
        }

        return $this->albumFactory->createNewImage($newImage, $title, $albumId);
    }
}