<?php

namespace App\Session;

final class Session
{
    /**
     * @return void
     */
    private static function start(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            \session_start();
        }
    }


    /**
     * @param $key
     * @return string|null
     */
    public static function get($key): ?string
    {
        self::start();
        if (isset($_SESSION[$key]) === true) {
            return $_SESSION[$key];
        }

        return null;
    }


    /**
     * @param $key
     * @param $value
     * @return void
     */
    public static function set($key, $value): void
    {
        self::start();
        $_SESSION[$key] = $value;
    }


    /**
     * @param $key
     * @return void
     */
    public static function delete($key): void
    {
        self::start();
        unset($_SESSION[$key]);
    }


    /**
     * @return void
     */
    public static function destroy(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            \session_destroy();
        }
    }
}