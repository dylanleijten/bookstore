<?php

class DB {

    private $db;
    private $query;
    static $static_db;

    private function __construct($conf)
    {
        try {
            $this->db = new \PDO('mysql:host='.$conf['host'].';dbname='.$conf['db'], $conf['user'], $conf['pass']);
        } catch(Exception $e) {
            die("Could not connect to the database.");
        }
    }

    public static function query($query)
    {
        if (!isset(self::$static_db))
            self::$static_db = new DB(Config::get('database'));

        self::$static_db->query = self::$static_db->db->prepare($query);

        return self::$static_db;
    }

    public function fetchAll()
    {
        $this->exec();

        return $this->query->fetchAll(PDO::FETCH_OBJ);
    }

    public function fetch()
    {
        $this->exec();

        return $this->query->fetch(PDO::FETCH_OBJ);
    }

    public function exec()
    {
        return $this->query->execute();
    }

    public function bind()
    {
        $values = func_get_args();

        foreach($values as $key => $value) {
            $this->query->bindValue($key + 1, $value, PDO::PARAM_STR);
        }

        return $this;
    }

}