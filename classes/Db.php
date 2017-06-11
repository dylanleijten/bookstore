<?php

class Db {

    public function __construct($host, $dbname, $username, $password)
    {
        try {
            return new \PDO('mysql:host='.$host.';dbname='.$dbname, $username, $password);
        } catch(Exception $e) {
            die("Could not connect to the database.");
        }
    }

}