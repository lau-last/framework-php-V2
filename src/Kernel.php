<?php

namespace App;

use App\Router\Router;

final class Kernel
{

    /**
     * @return void
     */
    public static function load(): void
    {
        try {
            $router = new Router();
            $router->createCacheFile(require dirname(__DIR__) . '/config/controllers.php');
        } catch (\Throwable $e) {
            echo 'Exception recue : ', $e->getMessage();
        }
    }


}