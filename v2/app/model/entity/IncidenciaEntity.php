<?php

class Incidencia{

    private int $idIncidencia;
    private int $idTrabajador;
    private int $idInstalacion;
    private string $hora;
    private string $descripcion;
    
    // Constructor
    public function __construct(int $idIncidencia, int $idTrabajador,  int $idInstalacion, string $hora, string $descripcion){
        $this->idIncidencia = $idIncidencia;
        $this->idTrabajador = $idTrabajador;
        $this->idInstalacion = $idInstalacion;
        $this->hora = $hora;
        $this->descripcion = $descripcion;
    }
    // Getter y Setter para id
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    // Getter y Setter para trabajador
    public function getTrabajador(): int
    {
        return $this->trabajador;
    }

    public function setTrabajador(string $trabajador): void
    {
        $this->trabajador = $trabajador;
    }

    // Getter y Setter para hora
    public function getHora(): string
    {
        return $this->hora;
    }

    public function setHora(string $hora): void
    {
        $this->hora = $hora;
    }

    // Getter y Setter para instalacion
    public function getInstalacion(): string
    {
        return $this->instalacion;
    }

    public function setInstalacion(string $instalacion): void
    {
        $this->instalacion = $instalacion;
    }

    // Getter y Setter para descripcion
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

}
?>