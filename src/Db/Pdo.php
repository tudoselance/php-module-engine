<?php
namespace Component\Db;

class Pdo
{
    protected $config;

    public function __construct( $config )
    {
        $this->config = $config;
    }
    
    public function instance()
    {
        return new \PDO( $this->config->dsn, $this->config->username, $this->config->password, [
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
        ]);
    }
}