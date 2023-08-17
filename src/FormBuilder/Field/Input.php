<?php

namespace App\FormBuilder\Field;

final class Input implements FieldInterface
{


    /**
     * @var array
     */
    private array $attr = [];

    /**
     * @var true
     */
    private bool $required = false;


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
        $attributes = [];
        foreach ($this->attr as $key => $value) {
            $attributes[] = sprintf('%s=%s', $key, $value);
        }
        return sprintf('<input %s %s >', implode(' ', $attributes), $this->required ? 'required' : '');
    }


    public function required(): self
    {
        $this->required = true;
        return $this;
    }


}