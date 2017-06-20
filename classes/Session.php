<?php

class Session {

    public static function get($key) {

        if(!array_key_exists($key, $_SESSION)) {
            return null;
        }

        return $_SESSION[$key];

    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function append($key, $value) {

        if(self::exists($key))
            array_push($_SESSION[$key], $value);

    }

    public static function remove($key) {
        unset($key);
    }

    public static function exists($key) {
        return array_key_exists($key, $_SESSION);
    }

}