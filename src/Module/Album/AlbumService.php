<?php
declare(strict_types=1);

namespace Project\Module\Album;

use Project\Module\Database\Database;
use Project\Module\GenericValueObject\Id;

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

    public function getAlbumByParams(array $parameter): Album
    {
        $objectParameter = (object)$parameter;

        if (!isset($objectParameter->albumId) || (isset($objectParameter->albumId) && empty($objectParameter->albumId))) {
            $objectParameter->albumId = Id::generateId()->toString();
        }

        return $this->albumFactory->getAlbumFromObject($objectParameter);
    }

    public function saveAlbum(Album $album): bool
    {
        return $this->albumRepository->saveAlbum($album);
    }

    /**
     * @param Album $album
     * @param $albumImages
     * @return Album
     */
    protected function addAlbumImagesToAlbum(Album $album, array $albumImages): Album
    {
        if (count($albumImages) > 0) {
            foreach ($albumImages as $albumImage) {
                /** @var Image $image */
                $image = $this->albumFactory->getImageFromObject($albumImage);

                $album->addImageToImageList($image);
            }
        }

        return $album;
    }
}