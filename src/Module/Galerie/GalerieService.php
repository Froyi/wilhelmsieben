<?php
declare(strict_types=1);

namespace Project\Module\Galerie;

use Project\Module\Database\Database;

class GalerieService
{
    /** @var  GalerieFactory $galerieFactory */
    protected $galerieFactory;

    /** @var  GalerieRepository $galerieRepository */
    protected $galerieRepository;

    public function __construct(Database $database)
    {
        $this->galerieFactory = new GalerieFactory();
        $this->galerieRepository = new GalerieRepository($database);
    }

    public function getAllGaleriesWithImags(): array
    {
        $galeries = [];

        $galeryResult = $this->galerieRepository->getAllGaleries();

        if (count($galeryResult) === 0) {
            return $galeries;
        }

        foreach ($galeryResult as $galery) {
            /** @var Album $album */
            $album = $this->galerieFactory->getAlbumFromObject($galery);

            $albumImages = $this->galerieRepository->getImagesForAlbum($album->getAlbumId());

            if (count($albumImages) > 0) {
                foreach ($albumImages as $albumImage) {
                    /** @var Image $image */
                    $image = $this->galerieFactory->getImageFromObject($albumImage);

                    $album->addImageToImageList($image);
                }
            }

            $galeries[$album->getAlbumId()->toString()] = $album;
        }

        return $galeries;
    }

}