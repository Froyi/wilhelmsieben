<?php

namespace Project\Module\Database;

use Project\Configuration;

class Database
{
    /** @var  string $host */
    protected $host;

    /** @var  string $user */
    protected $user;

    /** @var  string $password */
    protected $password;

    /** @var  string $database */
    protected $database;

    /** @var  array $query */
    protected $query;

    /** @var \PDO $connection */
    protected $connection;

    /**
     * Database constructor.
     * @param Configuration $configuration
     */
    public function __construct(Configuration $configuration)
    {
        $databaseConfiguration = $configuration->getEntryByName('database');

        $this->host = $databaseConfiguration['host'];
        $this->user = $databaseConfiguration['user'];
        $this->password = $databaseConfiguration['password'];
        $this->database = $databaseConfiguration['database'];

        $this->connect();
    }

    /**
     *
     */
    public function connect(): void
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database;
        $this->connection = new \PDO($dsn, $this->user, $this->password);
    }

    /**
     * @param string $table
     * @return Query
     */
    public function getNewSelectQuery(string $table): Query
    {
        $query = new Query($table);
        $query->addType(Query::SELECT);

        return $query;
    }

    /**
     * @param Query $query
     * @return array
     */
    public function fetchAll(Query $query): array
    {
        $sql = $this->connection->query($query->getQuery());

        return $sql->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @param Query $query
     * @return array
     */
    public function fetch(Query $query)
    {
        $sql = $this->connection->query($query->getQuery());

        return $sql->fetch(\PDO::FETCH_OBJ);
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