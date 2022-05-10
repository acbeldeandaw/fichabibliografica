<?php

class Usuario {
    private $id;
    private $email;
    private $contrasena;
    private $nombre;
    private $apellidos;
    
    function __construct() {
    }
    
    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setContrasena($contrasena): void {
        $this->contrasena = $contrasena;
    }

    function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos): void {
        $this->apellidos = $apellidos;
    }
    
}
