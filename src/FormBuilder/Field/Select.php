<?php

namespace App\FormBuilder\Field;

final class Select implements FieldInterface
{

    /**
     * @var array
     */
    private array $attr = [];

    /**
     * @var array
     */
    private array $option = [];

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
        return $this->start() . implode('', $this->option) . $this->end();
    }


    /**
     * @return $this
     */
    public function required(): self
    {
        $this->required = true;
        return $this;
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
        return sprintf('<select %s %s>', implode(' ', $attributes), $this->required ? 'required' : '');
    }


    /**
     * @return string
     */
    private function end(): string
    {
        return '</select>';
    }


    /**
     * @param array $optionAttr
     * @param string $text
     * @return $this
     */
    public function addOption(array $optionAttr = [], string $text = ''): self
    {
        $attributes = [];
        foreach ($optionAttr as $key => $value) {
            $attributes[] = sprintf('%s=%s', $key, $value);
        }
        $this->option[] = sprintf('<option %s>%s</option>', implode(' ', $attributes), $text);
        return $this;
    }


}