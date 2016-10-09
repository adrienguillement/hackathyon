<?php

namespace Kernel;

class Connection
{
    public $_pdo;
    const HOST='149.202.160.203' ;
    const DB_NAME='enedis';
    const USER='enedis';
    const PW='pwsio';

    public function __construct()
    {
        $this->_pdo=new \PDO('mysql:host='.self::HOST.';dbname='.self::DB_NAME, self::USER, self::PW);
    }

    /**
     *
     * @param $request
     * @return array
     */
    public function request($request)
    {
        $q = $this->_pdo->query($request);
        return $q->fetchAll(\PDO::FETCH_NUM);
    }

    private function getQuery($table)
    {
        return $this->_pdo->query('select * from '.$table);
    }

    public function getAll($table)
    {
        return $this->getQuery($table)->fetchAll(\PDO::FETCH_NUM);
    }

    public function get($table)
    {
        return $this->getQuery($table)->fetch(\PDO::FETCH_NUM);
    }
    public function exec($request)
    {
        $this->_pdo->exec($request);
    }
}
