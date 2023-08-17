<?php

namespace App\FormBuilder;

use App\FormBuilder\Field\FieldInterface;

final class FormBuilder
{

    /**
     * @var array
     */
    private array $attr = [];

    /**
     * @var array
     */
    private array $field = [];


    /**
     * @param array $attr
     */
    public function __construct(array $attr = [])
    {
        $this->attr = $attr;
    }


    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->start() . implode($this->field) . $this->end();
    }


    /**
     * @return string
     */
    private function start(): string
    {
        $attributes = [];
        foreach ($this->attr as $key => $value) {
            $attributes[] = sprintf('%s=%s', $key, $value);
        }
        return sprintf('<form %s>', implode(' ', $attributes));
    }


    /**
     * @return string
     */
    private function end(): string
    {
        return '</form>';
    }


    /**
     * @param FieldInterface $field
     * @return $this
     */
    public function add(FieldInterface $field): self
    {
        $this->field[] = $field;
        return $this;
    }


}