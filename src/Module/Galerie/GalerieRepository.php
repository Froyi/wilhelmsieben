<?php
declare(strict_types=1);

namespace Project\Module\Galerie;

use Project\Module\Database\Database;
use Project\Module\GenericValueObject\Id;

class GalerieRepository
{
    const ALBUM_TABLE = 'album';

    const IMAGE_TABLE = 'image';

    const ALBUM_ORDERBY = 'albumDate';

    const IMAGE_ORDERBY = 'imageId';

    const ALBUM_ORDERKIND = 'DESC';

    const IMAGE_ORDERKIND = 'ASC';

    /** @var  Database $database */
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getAllGaleries(): array
    {
        return $this->database->fetchAllOrderBy(self::ALBUM_TABLE, self::ALBUM_ORDERBY, self::ALBUM_ORDERKIND);
    }

    public function getImagesForAlbum(Id $albumId): array
    {
        return $this->database->fetchByStringParameter(self::IMAGE_TABLE, 'albumId', $albumId->toString());
    }
}