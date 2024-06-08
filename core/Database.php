<?php

namespace core;
use PDO;

class Database
{
    public $conn;
    public $statement;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsa = "mysql:" . http_build_query($config, '', ';');
        $this->conn = new PDO($dsa, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->conn->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function all()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if(! $result)
        {
            abort(Responses::NOTFOUND);
        }

        return $result;
    }
}