<?php

class IncidenciaDTO implements JsonSerializable{

    private $idIncidencia;
    private $trabajador;
    private $instalacion;
    private $hora;
    private $descripcion;

    public function __construct( $idIncidencia, $trabajador, $instalacion, $hora, $descripcion ){

        $this->$idIncidencia = $idIncidencia;
        $this->$trabajador = $trabajador;
        $this->$instalacion = $instalacion;
        $this->$hora = $hora;
        $this->$descripcion = $descripcion;

    }

    public function JsonSerializable(){

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

}

?>