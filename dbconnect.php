<?php

Class DbConnect
{
    public $errInfo = [];

    private $handler;
    private $dsn;
    private $user;
    private $pass;


    public function __construct($config)
    {
        $this->dsn = 'mysql:host=' . $config['srv'] . ';dbname=' . $config['db'] . ';charset=utf8';
        $this->user = $config['user'];
        $this->pass = $config['pass'];
    }


    private function connector()
    {
        if (!$this->handler) {
            $this->handler = new \PDO($this->dsn, $this->user, $this->pass);
            $this->handler->query("set names 'utf8'");

            if (!$this->handler) {
                error_log('not connect');
            }
        }

        return $this->handler;
    }


    function getList($query, $params = [])
    {
        $stmt = $this
                    ->connector()
                    ->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    function insertData($query, $params = [])
    {
        $stmt = $this
                    ->connector()
                    ->prepare($query);

        if ($stmt->execute($params)) {

            return $this
                        ->connector()
                        ->lastInsertId();
        } else {
            $this->errInfo = $stmt->errorInfo();

            return -1;
        }
    }
}
