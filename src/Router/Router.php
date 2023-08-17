<?php

namespace App\Router;

use App\Attribute\Route;
use ReflectionClass;
use ReflectionException;

final class Router
{

    /**
     * @var array
     */
    private array $routes = [];


    /**
     * @param array $controllers
     * @return array
     * @throws ReflectionException
     */
    public function createControllerCache(array $controllers): array
    {
        $routerCacheText = [];
        foreach ($controllers as $controller) {
            $reflexionClass = new ReflectionClass($controller);
            foreach ($reflexionClass->getMethods() as $method) {
                $methodAttribute = $method->getAttributes();
                foreach ($methodAttribute as $attr) {
                    if ($attr->getName() !== Route::class) {
                        continue;
                    }
                    /** @var Route $attrInst */
                    $attrInst = $attr->newInstance();
                    $class = $reflexionClass->getName();
                    $method = $method->getName();
                    $attrArg = $attr->getArguments();
                    $routerCacheText[] = "\t" . "\"" . $attrArg['path'] . "\" => function(){ \n \t\t(new " . $class . ")->" . $method . "(); \n }, \n";
                    $closure = function () use ($class, $method) {
                        return (new $class())->$method();
                    };
                    $this->routes[$attrInst->getPath()] = $closure;
                }
            }
        }
        return $routerCacheText;
    }


    /**
     * @param array $controllers
     * @return void
     * @throws ReflectionException
     */
    public function createCacheFile(array $controllers): void
    {

        if (!file_exists(dirname(__DIR__, 2) . "/var")) {
            mkdir(dirname(__DIR__, 2) . "/var");
        }
        if (!file_exists(dirname(__DIR__, 2) . "/var/routerCache.php")) {
            fopen(dirname(__DIR__, 2) . "/var/routerCache.php", 'w+');
        }
        $file = fopen(dirname(__DIR__, 2) . "/var/routerCache.php", 'w+');
        $text = $this->createControllerCache($controllers);
        $start = "<?php \n return [ \n";
        $end = "];";
        fwrite($file, $start);
        fwrite($file, implode(' ', $text));
        fwrite($file, $end);
    }


    public function match(string $path): ?\Closure
    {
        if (isset($this->routes[$path])) {
            return $this->routes[$path];
        }

        return null;
    }


    /**
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }


}
