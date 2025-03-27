<?php

namespace app\models;

use PDO;
use PDOException;

abstract class Model {

    public function connect() {
        $dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
        try {
            return new PDO($dsn, DBUSER, DBPASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode());
        }
    }

    public function fetchAll($query) {
        $connectedPDO = $this->connect();
        $statementObject = $connectedPDO->query($query);
        return $statementObject->fetchAll();
    }
}

class Post extends Model {

    protected $table = 'posts';

    public function getPosts() {
        $query = "SELECT * FROM " . $this->table;
        return $this->fetchAll($query);
    }
}
