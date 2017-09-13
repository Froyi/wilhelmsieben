<?php
declare(strict_types=1);

namespace Project\Module\GenericValueObject;

/**
 * @todo CHECK for getValue function
 *
 * Class ValueObjectService
 * @package Project\Module\GenericValueObject
 */
class ValueObjectService
{
    public function getIdFromString(string $id): Id
    {
        return Id::fromString($id);
    }
}