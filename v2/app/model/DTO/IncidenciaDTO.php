<?php

class IncidenciaDTO implements JsonSerializable{

    private $idIncidencia;
    private $idTrabajador;
    private $idInstalacion;
    private $hora;
    private $descripcion;

    public function __construct( $idIncidencia, $idTrabajador, $idInstalacion, $hora, $descripcion ){

        $this->idIncidencia = $idIncidencia;
        $this->idTrabajador = $idTrabajador;
        $this->idInstalacion = $idInstalacion;
        $this->hora = $hora;
        $this->descripcion = $descripcion;

    }

    public function jsonSerialize(){

        return get_object_vars($this);

    }

    
    /**
     * Get the value of idIncidencia
     */
    public function getIdIncidencia()
    {
        return $this->idIncidencia;
    }

    /**
     * Get the value of trabajador
     */
    public function getTrabajador()
    {
        return $this->trabajador;
    }

    /**
     * Get the value of instalacion
     */
    public function getInstalacion()
    {
        return $this->instalacion;
    }

    /**
     * Get the value of hora
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    // // Implementación del método jsonSerialize()
    // public function jsonSerialize() {
    //     return [
    //         'idIncidencia' => $this->idIncidencia,
    //         'idTrabajador' => $this->idTrabajador,
    //         'idInstalacion' => $this->idInstalacion,
    //         'hora' => $this->hora,
    //         'descripcion' => $this->descripcion
    //     ];
    // }

}

?>