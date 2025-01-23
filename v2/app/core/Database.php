<?php

ini_set('display_errors','On');

class Database{

    private $config = [];

    public static function connect(){

        $db = new PDO('mysql:host=localhost;dbname=incidencias;charset=utf8','root','');
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $incidencias = $db->query('SELECT * FROM incidencias');
        $incidencias = $incidencias->fetchAll(PDO::FETCH_ASSOC);

        return $incidencias;

    }

    public static function loadConfig(){

        $json_file = file_get_contents('../../config/db-conf.json');
        $config = json_decode($json_file,true);


    }

}





?>

