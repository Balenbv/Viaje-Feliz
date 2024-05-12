<?php

class PasajeroVIP extends Pasajero
{
    private $numeroViajeFrecuente;
    private $cantidadMillas;

    public function __construct($nombre, $apellido, $numeroDocumento, $numeroTelefono, $numeroAsiento, $numeroTicket, $numeroViajeFrecuente, $cantidadMillas)
    {
        parent::__construct($nombre, $apellido, $numeroDocumento, $numeroTelefono, $numeroAsiento, $numeroTicket);
        $this->numeroViajeFrecuente = $numeroViajeFrecuente;
        $this->cantidadMillas = $cantidadMillas;
    }

    public function getNombre()
    {
       return parent::getNombre();
    }

    public function getApellido()
    {
        return parent::getApellido();
    }

    public function getNumeroDocumento()
    {
        return parent::getNumeroDocumento();
    }

    public function getNumeroTelefono()
    {
        return parent::getNumeroTelefono();
    }

    public function getNumeroAsiento()
    {
        return parent::getNumeroAsiento();
    }

    public function getNumeroTicket()
    {
        return parent::getNumeroTicket();
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
        parent::setNumeroAsiento($newNumeroAsiento);
    }

    public function setNumeroTicket($newNumeroTicket)
    {
        parent::setNumeroTicket($newNumeroTicket);
    }
    
    public function getNumeroViajeFrecuente()
    {
        return $this->numeroViajeFrecuente;
    }

    public function getCantidadMillas()
    {
        return $this->cantidadMillas;
    }

    public function setNumeroViajeFrecuente($newNumeroViajeFrecuente)
    {
        $this->numeroViajeFrecuente = $newNumeroViajeFrecuente;
    }

    public function setCantidadMillas($newCantidadMillas)
    {
        $this->cantidadMillas = $newCantidadMillas;
    }

    public function darPorcentajeIncremento()
    {
        $importeIncremento = 35;
        if ($this->getCantidadMillas() > 300) {
            $importeIncremento = 30;
        }
        return $importeIncremento;
    }

    public function __toString()
    {
        return parent::__toString() .
        "Numero de viaje frecuente: {$this->getNumeroViajeFrecuente()}\n".
        "Cantidad de millas: {$this->getCantidadMillas()}\n----------------------------------";
    }
}