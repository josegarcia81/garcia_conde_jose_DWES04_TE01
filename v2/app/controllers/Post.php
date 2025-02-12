<?php


require '../app/model/DAO/IncidenciaDao.php';

class Post{

    public array $dbData = [];

    function _construct(){
        
    }

//// FUNCION QUE DEVUELVE TODAS LAS INCIDENCIAS ////
    function getAll(){
        try{
            $incidenciaDAO = new incidenciaDAO();
            $incidencias = $incidenciaDAO->obtenerIncidencias();

            if(!$incidencias === false){
                // Devolver la respuesta con los datos de la base de datos
                header('Content-Type: application/json');
                http_response_code(200);
                echo json_encode([
                    "status" => "success",
                    "code" => 200,
                    "time" => date('c'), // Fecha y hora en formato ISO-8601
                    "message" => "Base de datos con todas las incidencias",
                    "data" => $incidencias
                ]);
            }
        }catch(PDOException $e){
            error_log("Error al cargar la BD: " . $e->getMessage());
            header('Content-Type: application/json');
                http_response_code(500);
                echo json_encode([
                    "status" => "error",
                    "code" => 500,
                    "time" => date('c'), // Fecha y hora en formato ISO-8601
                    "message" => "Error al conectar con la BD",
                    "data" => ""
                ]);
                return;
        }
    }

//// FUNCION QUE DEVUELVE UNA INCIDENCIA BUSCADA POR ID ////
    function getById($id){
        try{
            $incidenciaDAO = new incidenciaDAO();
            $incidenciaId = $incidenciaDAO->obtenerIncidenciaPorId($id);
            
            // Comprobar resultado
            if(!$incidenciaId === false){
                
                header('Content-Type: application/json');
                http_response_code(200);
                echo json_encode([
                    "status" => "success",
                    "code" => 200,
                    "time" => date('c'), // Fecha y hora en formato ISO-8601
                    "message" => "Incidencia Encontrada",
                    "data" => $incidenciaId
                ]);
                return;
            } else {    

                // Envio de error 406 ni no se encuentra //
                header('Content-Type: application/json');
                http_response_code(406);
                echo json_encode([
                    "status" => "Not Found",
                    "code" => 406,
                    "time" => date('c'), // Fecha y hora en formato ISO-8601
                    "message" => "Incidencia no encontrada en la Base de Datos",
                    "data" => $id
                ]);
                return;

            }
        }catch(PDOException $e){
            error_log("Error al cargar la BD: " . $e->getMessage());
            header('Content-Type: application/json');
                http_response_code(500);
                echo json_encode([
                    "status" => "error",
                    "code" => 500,
                    "time" => date('c'), // Fecha y hora en formato ISO-8601
                    "message" => "Error al conectar con la BD",
                    "data" => ""
                ]);
                return;
        }

    }

//// FUNCION QUE CREA UNA INCIDENCIA ////
    function createIncidencia($data){
        try{
            $incidenciaDAO = new incidenciaDAO();
            $incidenciaNew = $incidenciaDAO->crearIncidencia($data);

            // Comprobar resultado
            if(!$incidenciaNew === false){
                // datos de respuesta
                header('Content-Type: application/json');
                http_response_code(201);
                echo json_encode([
                    "status" => "success",
                    "code" => 201,
                    "time" => date('c'), // Fecha y hora en formato ISO-8601
                    "message" => "Datos con la incidencia CREADA",
                    "data" => $data
                ]);
                return;            
            } else {

                header('Content-Type: application/json');
                http_response_code(500);
                echo json_encode([
                    "status" => "error",
                    "code" => 500,
                    "time" => date('c'), // Fecha y hora en formato ISO-8601
                    "message" => "Error al crear incidencia en la DB",
                    "data" => ""
                ]);
                return;
                
            }    
        }catch(PDOException $e){
            error_log("Error al cargar la BD: " . $e->getMessage());
            header('Content-Type: application/json');
                http_response_code(500);
                echo json_encode([
                    "status" => "error",
                    "code" => 500,
                    "time" => date('c'), // Fecha y hora en formato ISO-8601
                    "message" => "Error al conectar con la BD",
                    "data" => ""
                ]);
                return;
        }
    }

//// FUNCION QUE ACTUALIZA UNA INCIDENCIA ////
    function updateIncidencia($id, $data){
        try{
            $incidenciaDAO = new incidenciaDAO();
            $incidenciaUpd = $incidenciaDAO->actualizarIncidencia($id, $data);

            // Comprobar resultado
            if(!$incidenciaUpd === false){

                header('Content-Type: application/json');
                http_response_code(201);
                echo json_encode([
                    "status" => "success",
                    "code" => 201,
                    "time" => date('c'), // Fecha y hora en formato ISO-8601
                    "message" => "Datos con la incidencia MODIFICADA",
                    "data" => $data
                ]);
                return;
            } else {
            
                header('Content-Type: application/json');
                http_response_code(406);
                echo json_encode([
                    "status" => "Not Found",
                    "code" => 406,
                    "time" => date('c'), // Fecha y hora en formato ISO-8601
                    "message" => "Ninguna incidencia que actualizar, no encontrada o ya actualizada en la Base de Datos",
                    "data" => $id
                ]);
                return;
            }
        }catch(PDOException $e){
            error_log("Error al cargar la BD: " . $e->getMessage());
            header('Content-Type: application/json');
                http_response_code(500);
                echo json_encode([
                    "status" => "error",
                    "code" => 500,
                    "time" => date('c'), // Fecha y hora en formato ISO-8601
                    "message" => "Error al conectar con la BD",
                    "data" => ""
                ]);
                return;
        }
    }

//// FUNCION QUE BORRA UNA INCIDENCIA ////
    function deleteIncidencia($id){
        try{
            $incidenciaDAO = new incidenciaDAO();
            $incidenciaDel = $incidenciaDAO->borrarIncidencia($id);
            
            // Comprobar resultado
            if(!$incidenciaDel === false){
                
                header('Content-Type: application/json');
                http_response_code(200);
                echo json_encode([
                    "status" => "success",
                    "code" => 204,
                    "time" => date('c'), // Fecha y hora en formato ISO-8601
                    "message" => "Incidencia ELIMINADA",
                    "data" => $id
                ]);
                
                return;
            } else {
                header('Content-Type: application/json');
                http_response_code(406);
                echo json_encode([
                    "status" => "Not Found",
                    "code" => 406,
                    "time" => date('c'), // Fecha y hora en formato ISO-8601
                    "message" => "Incidencia no encontrada en la Base de Datos",
                    "data" => $id
                ]);
                return;
            }
        }catch(PDOException $e){
            error_log("Error al cargar la BD: " . $e->getMessage());
            header('Content-Type: application/json');
                http_response_code(500);
                echo json_encode([
                    "status" => "error",
                    "code" => 500,
                    "time" => date('c'), // Fecha y hora en formato ISO-8601
                    "message" => "Error al conectar con la BD",
                    "data" => ""
                ]);
                return;
        }
    }
}