<?php

require '../app/core/DatabaseSingleton.php';
require __DIR__.'../../DTO/IncidenciaDTO.php';


class IncidenciaDAO {

    private $db;
    
    public function __construct(){

        $this->db = DatabaseSingleton::getInstance();
    }

    // METODOS PARA OPERACIONES CRUD //
//// Funcion que gestiona la obtencion de todas las incidencias de la BD ////
    public function obtenerIncidencias(){
        //conexion con la base de datos
        $connection = $this->db->getConnection();

        //consulta a realizar
        $query = "select * from incidencias";
        
        // metemos la consulta en el valor query de la conexion
        $statement = $connection->query($query);
        
        //realizamos la consulta y se guarda como array asociativo en la variable
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        // contamos filas actualizadas
        $count = $statement->rowCount();

        // control para ver si se ha encontrado alguna fila
        if($count > 0){
            // devolvemos array mapeado a objetos DTO con todas las incidencias
            return $this->mapToDTO($result);
        } else {
            return false;
        }
    }
//// Funcion que gestiona la obtencion de una incidencia en la BD ////
    public function obtenerIncidenciaPorId($id){
        //conexion con la base de datos
        $connection = $this->db->getConnection();
        
        try {

            //consulta a realizar
            $query = "SELECT * FROM incidencias 
                        JOIN trabajadores ON incidencias.idTrabajador = trabajadores.idTrabajador 
                        WHERE idIncidencia = :idIncidencia;";
            
            // metemos la consulta en el valor query de la conexion
            $statement = $connection->prepare($query);

            // asignar valores de manera segura
            $statement->bindParam(":idIncidencia", $id, PDO::PARAM_INT);

            // ejecutar consulta
            $statement->execute();

            // realizamos la consulta y se guarda como array asociativo en la variable
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            // contamos filas actualizadas
            $count = $statement->rowCount();

            // control para ver si se ha encontrado alguna fila
            if($count > 0){
                // devolvemos array mapeado a objetos DTO con todas las incidencias que tengan esa id
                return $this->mapToDTO($result);
            } else {
                return false;
            }

        } catch (PDOException $e){
            // control de errores
            error_log("Error en obtenerIncidenciaPoIncidencia: " . $e->getMessage());
            return false;
        }
    }
//// Funcion que gestiona la creacion de una incidencia en la BD ////
    public function crearIncidencia($data){

        // conexion con la base de datos
        $connection = $this->db->getConnection();

        try {
            // Preparar la consulta
            $query = "INSERT INTO incidencias (idIncidencia, idTrabajador, idInstalacion, hora, descripcion) 
                      VALUES (:idIncidencia, :idTrabajador, :idInstalacion, :hora, :descripcion)";
    
            // Preparar la declaración
            $statement = $connection->prepare($query);
    
            // Asignar valores de manera segura
            $statement->bindParam(":idIncidencia", $data["idIncidencia"], PDO::PARAM_INT);
            $statement->bindParam(":idTrabajador", $data["idTrabajador"], PDO::PARAM_INT);
            $statement->bindParam(":idInstalacion", $data["idInstalacion"], PDO::PARAM_INT);
            $statement->bindParam(":hora", $data["hora"], PDO::PARAM_STR);
            $statement->bindParam(":descripcion", $data["descripcion"], PDO::PARAM_STR);
            
            // ejecutar consulta
            $statement->execute();

            // contamos filas afectadas
            $count = $statement->rowCount();

            // control para ver si se ha creado la fila
            if($count > 0){
                // devolvemos array mapeado a DTO con todas las incidencias que tengan esa id
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            // control de errores
            error_log("Error en crearIncidencia: " . $e->getMessage());
            return false;
        }

    }
//// Funcion que gestiona la actualizacion de una incidencia en la BD ////
    public function actualizarIncidencia($id,$data){

        //conexion con la base de datos
        $connection = $this->db->getConnection();

        try {

            //consulta a realizar
            $query = "UPDATE incidencias 
                        SET idTrabajador = :idTrabajador, idInstalacion = :idInstalacion, hora = :hora, descripcion = :descripcion 
                        WHERE idIncidencia = :idIncidencia;";

            // metemos la consulta en el valor query de la conexion
            $statement = $connection->prepare($query);

            // Asignar valores de manera segura
            $statement->bindParam(":idIncidencia", $id, PDO::PARAM_INT);
            $statement->bindParam(":idTrabajador", $data["idTrabajador"], PDO::PARAM_INT);
            $statement->bindParam(":idInstalacion", $data["idInstalacion"], PDO::PARAM_INT);
            $statement->bindParam(":hora", $data["hora"], PDO::PARAM_STR);
            $statement->bindParam(":descripcion", $data["descripcion"], PDO::PARAM_STR);

            //Ejecutar actualizacion
            $statement->execute();

            // contamos filas actualizadas
            $count = $statement->rowCount();

            // control para ver si se ha actualizado alguna fila
            if($count > 0){
                return true;
            } else {
                return false;
            }
            
        } catch (PDOException $e){
            // control de errores
            error_log("Error en actualizarIncidencia: " . $e->getMessage());
            return false;
        }
        

    }
//// Funcion que gestiona el borrado de una incidencia en la BD ////
    public function borrarIncidencia($id){
        //conexion con la base de datos
        $connection = $this->db->getConnection();

        try {
            //consulta a realizar
            $query = "DELETE FROM incidencias WHERE idIncidencia = :idIncidencia;";

            // metemos la consulta en el valor query de la conexion
            $statement = $connection->prepare($query);

            // Asignar valor de manera segura
            $statement->bindParam(":idIncidencia", $id, PDO::PARAM_INT);

            ///Ejecutar actualizacion
            $statement->execute();

            // contamos filas borradas en el caso que las hubiera
            $count = $statement->rowCount();

            // control para ver si se ha actualizado alguna fila
            if($count > 0){
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e){
            // control de errores
            error_log("Error en borrarIncidencia: " . $e->getMessage());
            return false;
        }

    }

    // mapea array y lo convierte a objetos DTO quedandonos con los datos que necesitamos enviar
    public function mapToDTO($result){

        return $resultMaped = array_map(
            function($incidencia) {
                return $incidenciaDTO = new IncidenciaDTO(
                        $incidencia['idIncidencia'],
                        $incidencia['idTrabajador'],
                        $incidencia['idInstalacion'],
                        $incidencia['hora'],
                        $incidencia['descripcion']
                );
            }, $result);
    }

}

?>