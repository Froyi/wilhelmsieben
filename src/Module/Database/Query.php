<?php

namespace Project\Module\Database;

/**
 * Class Query
 *
 * TYPE | TABLE | WHERE | ORDER | LIMIT
 *
 * @package Project\Module\Database
 */
class Query
{
    const SELECT = 'SELECT ';
    const UPDATE = 'UPDATE ';
    const DELETE = 'DELETE ';
    const FROM = 'FROM ';
    const WHERE = 'WHERE ';
    const AND = 'AND ';
    const OR = 'OR ';
    const LIMIT = 'LIMIT ';
    const ORDERBY = 'ORDER BY ';
    const ASC = 'ASC';
    const DESC = 'DESC';

    /** @var array $tableArray */
    protected $tableArray = [];

    /** @var  string $type */
    protected $type;

    /** @var array $entityArray */
    protected $entityArray = [];

    /** @var  string $where */
    protected $where;

    /** @var  string $orderBy */
    protected $orderBy;

    /** @var  string $limit */
    protected $limit;

    /**
     * Query constructor.
     * @param string $table
     */
    public function __construct(string $table)
    {
        $this->addTable($table);
    }

    public function addType(string $type): void
    {
        $this->type = $type;
    }

    public function addEntityToType(string $entity): void
    {
        $this->entityArray[] = $entity;
    }

    public function addTable(string $table): void
    {
        $this->tableArray[] = $table;
    }

    public function where(string $entity, string $operator, $value): void
    {
        if (is_string($value) === true) {
            $value = '\'' . $value . '\'';
        }

        $this->where .= self::WHERE . $entity . ' ' . $operator . ' ' . $value . ' ';
    }

    public function andWhere(string $entity, string $operator, $value): void
    {
        if (is_string($value) === true) {
            $value = '`' . $value . '`';
        }

        $this->where .= self:: AND . $entity . ' ' . $operator . ' ' . $value . ' ';
    }

    public function orWhere(string $entity, string $operator, $value): void
    {
        if (is_string($value) === true) {
            $value = '`' . $value . '`';
        }

        $this->where .= self:: OR . $entity . ' ' . $operator . ' ' . $value . ' ';
    }

    public function limit(int $limit): void
    {
        $this->limit = self::LIMIT . $limit;
    }

    public function orderBy(string $entity, string $order): void
    {
        $this->orderBy = self::ORDERBY . ' ' . $entity . ' ' . $order . ' ';
    }

    public function getQuery(): string
    {
        $queryString = '';

        switch ($this->type) {
            case self::SELECT:
                $queryString .= self::SELECT . $this->getEntities();
                $queryString .= self::FROM . $this->getTables();
                $queryString .= $this->where;
                $queryString .= $this->orderBy;
                $queryString .= $this->limit;
        }

        return $queryString;
    }

    protected function getEntities(): string
    {
        $entities = '* ';

        if (empty($this->entityArray)) {
            return $entities;
        }

        return implode(',', $this->entityArray) . ' ';
    }

    protected function getTables(): string
    {
        if (empty($this->tableArray)) {
            throw new \RuntimeException('Es wurde keine Tabelle angegeben!');
        }

        return implode(',', $this->tableArray) . ' ';
    }
}