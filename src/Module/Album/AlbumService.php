<?php
declare(strict_types=1);

namespace Project\Module\Album;

use Project\Module\Database\Database;
use Project\Module\GenericValueObject\Id;

class AlbumService
{
    /** @var  AlbumFactory $albumFactory */
    protected $albumFactory;

    /** @var  AlbumRepository $albumRepository */
    protected $albumRepository;

    public function __construct(Database $database)
    {
        $this->albumFactory = new AlbumFactory();
        $this->albumRepository = new AlbumRepository($database);
    }

    public function getAllAlbumsWithImags(): array
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

            if (count($albumImages) > 0) {
                foreach ($albumImages as $albumImage) {
                    /** @var Image $image */
                    $image = $this->albumFactory->getImageFromObject($albumImage);

                    $album->addImageToImageList($image);
                }
            }

            $albums[$album->getAlbumId()->toString()] = $album;
        }

        return $albums;
    }

    public function getAlbumByAlbumId(Id $albumId): ?Album
    {
        return null;
    }

}