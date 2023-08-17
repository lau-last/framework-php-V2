<?php

namespace App\QueryBuilder\Query;

final class Insert implements QueryInterface
{

    /**
     * @var string
     */
    private string $table;

    /**
     * @var array
     */
    private array $insert = [];


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
        return 'INSERT INTO ' . $this->table
            . '(' . implode(',', $this->insert) . ') VALUES (' . implode(',', $this->insert) . ')';
    }


    /**
     * @param string ...$insert
     * @return $this
     */
    public function insert(string ...$insert): self
    {
        foreach ($insert as $item) {
            $this->insert[] = $item;
        }
        return $this;
    }


}