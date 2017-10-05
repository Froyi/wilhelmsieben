<?php

namespace Project\Module\Database;

/**
 * Class Query
 *
 * TYPE | TABLE |
 *
 * @package Project\Module\Database
 */
class Query
{
    const SELECT = 'SELECT ';
    const UPDATE = 'UPDATE ';
    const DELETE = 'DELETE ';

    /** @var  string $queryString */
    protected $queryString;

    /** @var string $table */
    protected $table;

    /** @var  string $type */
    protected $type;
    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function addType(string $type): void
    {
        $this->type = $type;
    }





















    public function fetchAll(string $table): array
    {
        $sql = $this->connection->query('SELECT * FROM ' . $table);

        return $sql->fetchAll(\PDO::FETCH_OBJ);
    }

    public function fetchAllOrderBy(string $table, string $orderBy, string $orderKind = 'ASC'): array
    {
        $sql = $this->connection->query('SELECT * FROM ' . $table . ' ORDER BY ' . $orderBy . ' ' . $orderKind);

        return $sql->fetchAll(\PDO::FETCH_OBJ);
    }

    public function fetchLimitedOrderBy(string $table, string $orderBy, string $orderKind = 'ASC', int $limit = 1): array
    {
        $sql = $this->connection->query('SELECT * FROM ' . $table . ' ORDER BY ' . $orderBy . ' ' . $orderKind . ' LIMIT ' . $limit);

        return $sql->fetchAll(\PDO::FETCH_OBJ);
    }

    public function fetchByDateParameterFuture(string $table, string $dateName, string $dateValue, string $orderBy, string $orderKind = 'ASC', int $limit = 1)
    {
        $sql = $this->connection->query('SELECT * FROM ' . $table . ' WHERE ' . $dateName . ' > "' . $dateValue . '" ORDER BY ' . $orderBy . ' ' . $orderKind . ' LIMIT ' . $limit);

        return $sql->fetchAll(\PDO::FETCH_OBJ);
    }


    public function fetchById(string $table, string $idName, string $idValue)
    {
        $sql = $this->connection->query('SELECT * FROM ' . $table . ' WHERE ' . $idName . ' = "' . $idValue . '"');

        return $sql->fetch(\PDO::FETCH_OBJ);
    }

    public function fetchByStringParameter(string $table, $parameter, $value)
    {
        $sql = $this->connection->query('SELECT * FROM ' . $table . ' WHERE ' . $parameter. ' = "' . $value . '"');

        $result = $sql->fetchAll(\PDO::FETCH_OBJ);

        return $result;
    }
}