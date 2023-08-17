<?php

namespace App\QueryBuilder\Query;

final class Select implements QueryInterface
{


    /**
     * @var array
     */
    private array $select = [];

    /**
     * @var string
     */
    private string $table;

    /**
     * @var array
     */
    private array $where = [];

    /**
     * @var array
     */
    private array $join = [];

    /**
     * @var string|null
     */
    private ?string $order = null;


    /**
     * @param string $table
     */
    public function __construct(string $table)
    {
        $this->table = $table;
    }


    /**
     * @return string
     */
    public function __toString(): string
    {
        return 'SELECT ' . implode(',', $this->select)
            . ' FROM ' . $this->table
            . ($this->join !== [] ? ' INNER JOIN ' . implode(',', $this->join) : '')
            . ($this->where !== [] ? ' WHERE ' . implode('AND ', $this->where) : '')
            . ($this->order !== null ? ' ORDER BY ' . $this->order : '');
    }


    /**
     * @param string ...$where
     * @return $this
     */
    public function where(string ...$where): self
    {
        foreach ($where as $item) {
            $this->where[] = $item;
        }
        return $this;
    }


    /**
     * @param string ...$join
     * @return $this
     */
    public function join(string ...$join): self
    {
        foreach ($join as $item) {
            $this->join[] = $item;
        }
        return $this;
    }


    /**
     * @param string $order
     * @return $this
     */
    public function order(string $order): self
    {
        $this->order = $order;
        return $this;
    }


}