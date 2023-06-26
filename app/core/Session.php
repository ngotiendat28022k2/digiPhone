<?php

class Session
{
    public static function init()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set($key, $val)
    {
        self::init();
        $_SESSION[$key] = $val;
    }

    public static function get($key)
    {
        self::init();
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function destroy()
    {
        self::init();
        session_destroy();
    }

    public static function unset($key)
    {
        self::init();
        unset($_SESSION[$key]);
    }

    public static function checkSession()
    {
        self::init();
        if (!self::get('islogin')) {
            self::destroy();
            header("Location: " . BASE_URL . "/login");
            exit;
        }
    }

    public static function checkClient()
    {
        self::init();
        if (self::get('islogin') && self::get('role') === 0) {
            self::destroy();
            header("Location: " . BASE_URL . "/home");
            exit;
        }
    }
}
