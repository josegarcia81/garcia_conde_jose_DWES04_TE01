<?php

class Instalacion {
    
    private int $idInstalacion;
    private string $nombreInstalacion;
    private string $zona;
    private string $descripcionIns;

    // Constructor
    public function __construct(int $idInstalacion, string $nombreInstalacion, string $zona, string $descripcionIns) {
        $this->idInstalacion = $idInstalacion;
        $this->nombreInstalacion = $nombreInstalacion;
        $this->zona = $zona;
        $this->descripcionIns = $descripcionIns;
    }

    // Getters
    public function getIdInstalacion(): int {
        return $this->idInstalacion;
    }

    public function getNombreInstalacion(): string {
        return $this->nombreInstalacion;
    }

    public function getZona(): string {
        return $this->zona;
    }

    public function getDescripcionIns(): string {
        return $this->descripcionIns;
    }

    // Setters
    public function setNombreInstalacion(string $nombreInstalacion): void {
        $this->nombreInstalacion = $nombreInstalacion;
    }

    public function setZona(string $zona): void {
        $this->zona = $zona;
    }

    public function setDescripcionIns(string $descripcionIns): void {
        $this->descripcionIns = $descripcionIns;
    }
}
?>
