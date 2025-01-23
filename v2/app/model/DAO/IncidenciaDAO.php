<?php

require '../app/core/DatabaseSingleton.php';
// require '';


class IncidenciaDAO{

    private $db;
    
    public function __construct(){

        $this->db = DatabaseSingleton::getInstance();
    }

    // METODOS PARA OPERACIONES CRUD //

    public function obtenerIncidencias(){
        //conexion con la base de datos
        $connection = $this->db->getConnection();
        //consulta a realizar
        $query = "select * from incidencias join trabajadores on incidencias.idTrabajador = trabajadores.idTrabajador;";
        // metemos la consulta en el valor query de la conexion
        $statement = $connection->query($query);
        //realizamos la consulta y se guarda como array asociativo en la variable
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        // devolvemos array con todas las incidencias
        return $result;
        //print_r($result);

    }
    public function obtenerIncidenciaPorId($id){

        //conexion con la base de datos
        $connection = $this->db->getConnection();
        //consulta a realizar
        $query = "select * from incidencias join trabajadores on incidencias.idTrabajador = trabajadores.idTrabajador where idIncidencia = ".$id.";";
        // metemos la consulta en el valor query de la conexion
        $statement = $connection->query($query);
        //realizamos la consulta y se guarda como array asociativo en la variable
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;

    }
    public function crearIncidencia(){}
    public function actualizarIncidencia(){}
    public function borrarIncidencia(){}

}

?>