<?php

namespace App;

class Db
{
    public $pdo;

    public function __construct()
    {
        $settings = $this->getPDOSettings();
        $this->pdo = new \PDO($settings['dsn'], $settings['user'], $settings['pass'], null);
    }

    protected function getPDOSettings() : array
    {
        $config = include ROOT_PATH . '/Config/db.php';
        $result['dsn'] = "{$config['type']}:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        $result['user'] = $config['user'];
        $result['pass'] = $config['pass'];
        return $result;
    }

    public function execute(String $query, array $params = null) : array
    {
        $stmt = null;
        if(is_null($params)){
            $stmt = $this->pdo->query($query);
        } else {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
        }

        return $stmt->fetchAll();
    }
}