<?php

class Viaje
{
    private $objResponsableVInt;
    private $codigoViajeInt;
    private $destinoInt;
    private $cantidadMaximaPasajerosInt;
    private $ColeccionObjspasajerosInt;

    public function __construct($objResponsableVExt, $codigoViajeExt, $destinoExt, $cantidadMaximaPasajerosExt, $pasajerosExt)
    {
        $this->objResponsableVInt = $objResponsableVExt;
        $this->codigoViajeInt = $codigoViajeExt;
        $this->destinoInt = $destinoExt;
        $this->cantidadMaximaPasajerosInt = $cantidadMaximaPasajerosExt;
        $this->ColeccionObjspasajerosInt = $pasajerosExt;
    }

    public function getResponsableV()
    {
        return $this->objResponsableVInt;
    }

    public function getCodigoViaje()
    {
        return $this->codigoViajeInt;
    }

    public function getDestino()
    {
        return $this->destinoInt;
    }

    public function getCantidadMaximaPasajeros()
    {
        return $this->cantidadMaximaPasajerosInt;
    }

    public function getPasajeros()
    {
        return $this->ColeccionObjspasajerosInt;
    }

    public function setResponsableV($newObjResponsable)
    {
        $this->objResponsableVInt = $newObjResponsable;
    }

    public function setCodigoViaje($newCodigoViaje)
    {
        $this->codigoViajeInt = $newCodigoViaje;
    }

    public function setDestino($newDestino)
    {
        $this->destinoInt = $newDestino;
    }

    public function setCantidadMaximaPasajeros($newCantidadMaxima)
    {
        $this->cantidadMaximaPasajerosInt = $newCantidadMaxima;
    }
}
