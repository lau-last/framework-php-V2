<?php

namespace App\Render;

final class PHPRender
{

    /**
     * @param string $view
     * @param array|null $data
     * @return void
     */
    public function render(string $view, ?array $data = []): void
    {
        ob_start();
        extract($data);
        require $view . '.php';
        ob_get_clean();
    }


    /**
     * @param $uri
     * @return void
     */
    public function redirect($uri): void
    {
        header("Location: $uri");
    }


}