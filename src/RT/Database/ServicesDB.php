<?php

namespace RT\Database;

class ServicesDB
{
    private $config;

    public function __construct()
    {
        $this->config = require_once("config.php");
    }

    public function conexao()
    {
        try{
            if(!isset($this->config['db'])){
                throw new \InvalidArgumentException("Configuração do bando de dados não existe!");
            }
            $host = (isset($this->config['db']['host'])) ? $this->config['db']['host'] : null;
            $dbname = (isset($this->config['db']['dbname'])) ? $this->config['db']['dbname'] : null;
            $user = (isset($this->config['db']['user'])) ? $this->config['db']['user'] : null;
            $pass = (isset($this->config['db']['pass'])) ? $this->config['db']['pass'] : null;
            return new \PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
        }catch (\PDOException $e){
            echo $e->getMessage()."\n";
            echo $e->getTraceAsString()."\n";
        }
    }
}
