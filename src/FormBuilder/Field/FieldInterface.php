<?php

namespace App\FormBuilder\Field;

interface FieldInterface
{

    public function __construct();


    /**
     * @return string
     */
    public function __toString(): string;


    /**
     * @return $this
     */
    public function required(): self;


}