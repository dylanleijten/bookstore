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

    public function fetchAll($type = PDO::FETCH_OBJ)
    {
        $this->exec();

        return $this->query->fetchAll($type);
    }

    public function fetch($type = PDO::FETCH_OBJ)
    {
        $this->exec();

        return $this->query->fetch($type);
    }

    public function exec()
    {
        return $this->query->execute();
    }

    public function count()
    {
        $this->exec();
        return $this->query->rowCount();
    }

    public static function lastInsertId()
    {
        if (!isset(self::$static_db))
            self::$static_db = new DB(Config::get('database'));

        return self::$static_db->db->lastInsertId();
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