<?php

namespace App\Attribute;

#[\Attribute(\Attribute::TARGET_METHOD)]
final class Route
{

    /**
     * @var string
     */
    private string $path;


    /**
     * @var string
     */
    private string $method;


    /**
     * @param string $path
     * @param string $method
     */
    public function __construct(string $path, string $method = 'get')
    {
        $this->path = $path;
        $this->method = $method;
    }


    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }


    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }


}