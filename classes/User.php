<?php

/**
 * Created by IntelliJ IDEA.
 * User: Ralph
 * Date: 6/19/2017
 * Time: 8:50 PM
 */
class User {

    public $cart;

    private static $static_user;

    public static function get() {
        if(!isset(self::$static_user))
            self::$static_user = new User();

        return self::$static_user;
    }

    public function __construct() {
        $this->cart = new Cart();
    }

}