<?php

namespace Core;

use PDO;

class Database
{
    public $connection;
    protected $statement;

    public function __construct($username= 'root', $password='')
    {
        $config = require base_path('config.php');
        $dsn = "mysql:" . http_build_query($config['database'], '', ';');
        $this->connection = new PDO($dsn, $username, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    /**
     * Execute a query with optional parameters.
     *
     * @param string $query
     * @param array $params
     * @return $this
     */
    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    public function get()
    {
        return $this->statement->fetch();
    }
    public function find()
    {
        return $this->statement->fetch();
    }
    public function findOrFail()
    {
        $result = $this->find();

        if(!$result){
            die();
        }
        return $result;
    }


    public function fetchColumn()
    {
        return $this->statement->fetchColumn();
    }

    public function quote($value): string
    {
        return $this->connection->quote($value);
    }

    public function findAll()
    {
        return $this->statement->fetchAll();
    }

    public function rowCount(){
        return $this->statement->rowCount();
}

    

}

?>