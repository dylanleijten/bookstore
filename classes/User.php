<?php

class User {

    private $db;

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

}