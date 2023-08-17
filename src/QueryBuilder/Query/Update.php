<?php

namespace App\QueryBuilder\Query;

final class Update implements QueryInterface
{

    /**
     * @var string
     */
    private string $table;

    /**
     * @var array
     */
    private array $set = [];

    /**
     * @var array
     */
    private array $where = [];


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
        return 'UPDATE ' . $this->table . ' SET ' . implode(',',$this->set) . ($this->where !== [] ? ' WHERE ' . implode(' AND ', $this->where) : '');
    }


    /**
     * @param string ...$set
     * @return $this
     */
    public function set(string ...$set): self
    {
        foreach ($set as $item) {
            $this->set[] = $item;
        }
        return $this;
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


}