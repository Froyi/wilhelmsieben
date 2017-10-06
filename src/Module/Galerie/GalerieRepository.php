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

    const ALBUM_ID = 'albumId';

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
        $query = $this->database->getNewSelectQuery(self::ALBUM_TABLE);
        $query->orderBy(self::ALBUM_ORDERBY, self::ALBUM_ORDERKIND);

        return $this->database->fetchAll($query);
    }

    public function getImagesForAlbum(Id $albumId): array
    {
        $query = $this->database->getNewSelectQuery(self::IMAGE_TABLE);
        $query->where(self::ALBUM_ID, '=', $albumId->toString());
        $query->orderBy(self::IMAGE_ORDERBY, self::IMAGE_ORDERKIND);

        return $this->database->fetchAll($query);
    }
}