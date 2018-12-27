<?php

namespace App;

use App\Exceptions\UnknownClassException;
use Throwable;

class App
{
    public static $router;
    public static $db;
    public static $kernel;
    public static $user;

    public static function init()
    {
        spl_autoload_register(['static','loadClass']);
        static::bootstrap();
        set_exception_handler(['App\App','handleException']);
    }

    public static function bootstrap()
    {
        static::$router = new Router();
        static::$kernel = new Kernel();
        static::$db = new Db();
        static::$user = new User();
    }

    /**
     * @param $className
     * @throws UnknownClassException
     */
    public static function loadClass($className)
    {
        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);

        $classPath = ROOT_PATH . DIRECTORY_SEPARATOR . $className . '.php';
        if(file_exists($classPath)) {
            require_once $classPath;
        } else {
            throw new UnknownClassException('Cant load class: ' . $classPath);
        }
    }

    public function handleException(Throwable $e)
    {
        if($e instanceof \App\Exceptions\InvalidRouteException) {
            echo static::$kernel->launchAction('Error', 'error404', [$e]);
        } else {
            echo static::$kernel->launchAction('Error', 'error500', [$e]);
        }
    }
}