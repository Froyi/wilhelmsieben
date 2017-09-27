<?php
declare(strict_types = 1);

namespace Project\Module\User;

use Project\Module\Database\Database;
use Project\Module\GenericValueObject\Email;
use Project\Module\GenericValueObject\Id;

class UserRepository
{
    const TABLE = 'user';

    const ORDERBY = 'userId';

    const ORDERKIND = 'ASC';

    /** @var  Database $database */
    protected $database;

    /**
     * UserRepository constructor.
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getUserByEmail(Email $email)
    {
        return $this->database->fetchByStringParameter(self::TABLE, 'email', $email->getEmail());
    }

    public function getUserByUserId(Id $userId)
    {
        return $this->database->fetchById(self::TABLE, self::ORDERBY, $userId->toString());
    }
}