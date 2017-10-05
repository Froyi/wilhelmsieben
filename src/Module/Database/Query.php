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
    const WHERE = 'WHERE ';
    const AND = 'AND ';
    const OR = 'OR ';
    const LIMIT = 'LIMIT ';
    const ORDERBY = 'ORDER BY ';
    const ASC = 'ASC';
    const DESC = 'DESC';

    /** @var  string $queryString */
    protected $queryString;

    /** @var array $tableArray */
    protected $tableArray = [];

    /** @var  string $type */
    protected $type;

    /** @var array $entityArray */
    protected $entityArray = [];

    /** @var  string $where */
    protected $where;

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
            $value = '`' . $value . '`';
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
        $this->limit = $limit;
    }

    public function orderBy(string $entity, string $order): void
    {
        $this->orderBy = self::ORDERBY . ' ' . $entity . ' ' . $order;
    }

}