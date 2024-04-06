<?php

class Pasajero
{
    private $nombreInt;
    private $apellidoInt;
    private $numeroDocInt;

    public function __construct($nombreExt, $apellidoExt, $numeroDocExt)
    {
        $this->nombreInt = $nombreExt;
        $this->apellidoInt = $apellidoExt;
        $this->numeroDocInt = $numeroDocExt;
    }

    public function getNombre()
    {
        return $this->nombreInt;
    }

    public function getApellido()
    {
        return $this->apellidoInt;
    }

    public function getNumeroDocumento()
    {
        return $this->numeroDocInt;
    }

    public function setNombre($newNombre)
    {
        $this->nombreInt = $newNombre;
    }

    public function setApellido($newApellido)
    {
        $this->apellidoInt = $newApellido;
    }

    public function setNumeroDocumento($newNumeroDocumento)
    {
        $this->numeroDocInt = $newNumeroDocumento;
    }

    public function __toString()
    {
        return "{$this->getNombre()}";
    }
}
