<?php

namespace App\QueryBuilder\Query;

interface QueryInterface
{

    /**
     * @param string $table
     */
    public function __construct(string $table);


    /**
     * @return string
     */
    public function __toString(): string;


}
