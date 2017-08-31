<?php
declare(strict_types=1);

namespace Project\Module\Soup;

use Project\Module\GenericValueObject\Description;
use Project\Module\GenericValueObject\Id;
use Project\Module\GenericValueObject\Name;

class Soup
{
    /** @var Id $soupId */
    protected $soupId;

    /** @var Name $name */
    protected $name;

    /** @var Description $description */
    protected $description;

    /**
     * Soup constructor.
     * @param Id $id
     * @param Name $name
     */
    public function __construct(Id $id, Name $name)
    {
        $this->soupId = $id;
        $this->name = $name;
    }

    /**
     * @return Id
     */
    public function getSoupId(): Id
    {
        return $this->soupId;
    }

    /**
     * @param Id $soupId
     */
    protected function setSoupId(Id $soupId)
    {
        $this->soupId = $soupId;
    }

    /**
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @param Name $name
     */
    protected function setName(Name $name)
    {
        $this->name = $name;
    }

    /**
     * @return Description
     */
    public function getDescription(): Description
    {
        return $this->description;
    }

    /**
     * @param Description $description
     */
    public function setDescription(Description $description)
    {
        $this->description = $description;
    }
}