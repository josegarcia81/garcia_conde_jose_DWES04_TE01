<?php
ini_set('display_errors','On');
//require '../../config/db-conf.json';

class DatabaseSingleton{
    
    // atributos
    private static $instance;
    private $connection;
    private $config;
    

    private function __construct(){

        $this->loadConfig();
        $this->connection = new PDO(
            "mysql:host={$this->config['host']};dbname={$this->config['db_name']}",
            $this->config['user'],
            $this->config['password']
        );
    }

    private function loadConfig(){
        $conf_dir = __DIR__ . '/../../config/db-conf.json';
        // echo __DIR__;
        // echo $conf_dir;
        $json_file = file_get_contents($conf_dir);
        $this->config = json_decode($json_file,true);
    }

    public static function getInstance(){

        if(!self::$instance){
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection(){

        return $this->connection;
    }

}

?>