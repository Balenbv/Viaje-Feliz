<?php

class Pasajero extends Persona
{
    private $numeroAsiento;
    private $numeroTicket;

    public function __construct($nombre, $apellido, $numeroDocumento, $numeroTelefono, $numeroAsiento, $numeroTicket)
    {
        parent::__construct($nombre, $apellido, $numeroDocumento, $numeroTelefono);
        $this->numeroAsiento = $numeroAsiento;
        $this->numeroTicket = $numeroTicket;
    }

    public function getNombre(){
       return parent::getNombre();
    }

    public function getApellido(){
        return parent::getApellido();
    }

    public function getNumeroDocumento(){
        return parent::getNumeroDocumento();
    }

    public function getNumeroTelefono(){
        return parent::getNumeroTelefono();
    }

    public function getNumeroAsiento()
    {
        return $this->numeroAsiento;
    }

    public function getNumeroTicket()
    {
        return $this->numeroTicket;
    }

    public function setNombre($newNombre)
    {
        parent::setNombre($newNombre);
    }

    public function setApellido($newApellido)
    {
        parent::setApellido($newApellido);
    }

    public function setNumeroDocumento($newNumeroDocumento)
    {
        parent::setNumeroDocumento($newNumeroDocumento);
    }

    public function setNumeroTelefono($newNumeroTelefono)
    {
        parent::setNumeroTelefono($newNumeroTelefono);
    }

    public function setNumeroAsiento($newNumeroAsiento)
    {
        $this->numeroAsiento = $newNumeroAsiento;
    }

    public function setNumeroTicket($newNumeroTicket)
    {
        $this->numeroTicket = $newNumeroTicket;
    }

    public function darPorcentajeIncremento(){
        return 10;
    }

    
    public function __toString()
    {
        return parent::__toString() . "Numero de asiento: {$this->getNumeroAsiento()}\nNumero de ticket: {$this->getNumeroTicket()}\n";
    }
}
