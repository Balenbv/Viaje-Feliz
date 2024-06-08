<?php


class Persona
{
    private $nombre;
    private $apellido;
    private $numeroDocumento;
    private $numeroTelefono;

    public function __construct($nombre, $apellido, $numeroDocumento, $numeroTelefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numeroDocumento = $numeroDocumento;
        $this->numeroTelefono = $numeroTelefono;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    public function getNumeroTelefono()
    {
        return $this->numeroTelefono;
    }

    public function setNombre($newNombre)
    {
        $this->nombre = $newNombre;
    }

    public function setApellido($newApellido)
    {
        $this->apellido = $newApellido;
    }

    public function setNumeroDocumento($newNumeroDocumento)
    {
        $this->numeroDocumento = $newNumeroDocumento;
    }

    public function setNumeroTelefono($newNumeroTelefono)
    {
        $this->numeroTelefono = $newNumeroTelefono;
    }

    public function __toString()
    {
        return " 
Nombre: {$this->getNombre()}
Apellido: {$this->getApellido()}
Numero de Telefono: {$this->getNumeroTelefono()}
Numero DNI: {$this->getNumeroDocumento()}\n";
    }
}
