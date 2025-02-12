<?php

class Trabajador {

    private int $idTrabajador;
    private string $nombreTrabajador;
    private string $apellido1;
    private string $apellido2;
    private string $dni;
    private string $telefono;
    private string $direccion;
    private string $email;

    // Constructor
    public function __construct(int $idTrabajador, string $nombreTrabajador, string $apellido1, string $apellido2, string $dni, string $telefono, string $direccion, string $email) {
        $this->idTrabajador = $idTrabajador;
        $this->nombreTrabajador = $nombreTrabajador;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->dni = $dni;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->email = $email;
    }

    // Getters
    public function getIdTrabajador(): int {
        return $this->idTrabajador;
    }

    public function getNombreTrabajador(): string {
        return $this->nombreTrabajador;
    }

    public function getApellido1(): string {
        return $this->apellido1;
    }

    public function getApellido2(): string {
        return $this->apellido2;
    }

    public function getDni(): string {
        return $this->dni;
    }

    public function getTelefono(): string {
        return $this->telefono;
    }

    public function getDireccion(): string {
        return $this->direccion;
    }

    public function getEmail(): string {
        return $this->email;
    }

    // Setters
    public function setNombreTrabajador(string $nombreTrabajador): void {
        $this->nombreTrabajador = $nombreTrabajador;
    }

    public function setApellido1(string $apellido1): void {
        $this->apellido1 = $apellido1;
    }

    public function setApellido2(string $apellido2): void {
        $this->apellido2 = $apellido2;
    }

    public function setDni(string $dni): void {
        $this->dni = $dni;
    }

    public function setTelefono(string $telefono): void {
        $this->telefono = $telefono;
    }

    public function setDireccion(string $direccion): void {
        $this->direccion = $direccion;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }
}
?>
