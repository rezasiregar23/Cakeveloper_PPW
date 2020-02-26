<?php

namespace web;

class Session
{
    public static function start()
    {
        if (!self::status()) {
            session_start();
        }
        return(self::status());
    }

    public static function status()
    {
        return(session_status() === PHP_SESSION_ACTIVE);
    }

    public static function set(String $key, $value)
    {
        if (self::start()) {
            $_SESSION[$key] = $value;
            return (true);
        }
        return (false);
    }

    public static function get(String $key, $remove=false)
    {
        $value=false;
        if (self::has($key)) {
            $value = $_SESSION[$key];
            if ($remove) {
                unset($_SESSION[$key]);
            }
        }
        return ($value);
    }

    public static function has(String $key)
    {
        return (self::start() && isset($_SESSION[$key]));
    }

    public static function remove(String $key){
        if(self::has($key)){
            unset($_SESSION[$key]);
        }
    }
}
