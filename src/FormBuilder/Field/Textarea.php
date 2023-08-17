<?php

namespace App\FormBuilder\Field;

final class Textarea implements FieldInterface
{

    /**
     * @var array
     */
    private array $attr = [];

    /**
     * @var string
     */
    private string $text = '';

    /**
     * @var true
     */
    private bool $required = false;


    /**
     * @param array $attr
     * @param string $text
     */
    public function __construct(array $attr = [], string $text = '')
    {
        $this->attr = $attr;
        $this->text = $text;
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
        return sprintf('<textarea %s %s>%s</textarea>', implode(' ', $attributes), $this->required ? 'required' : '', $this->text);
    }


    /**
     * @return $this
     */
    public function required(): self
    {
        $this->required = true;
        return $this;
    }


}