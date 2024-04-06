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

    public function setPasasejeros($newColeccion)
    {
        $this->ColeccionObjspasajerosInt = $newColeccion;
    }

    public function cantidadActualPasajeros()
    {
        return count($this->getPasajeros());
    }

    public function encontrarPosicionPasajero($dniParaRastrear)
    {
        $existePasajero = 0;
        $seEncontro = false;
        for ($i = 0; $i < $this->cantidadActualPasajeros() && $seEncontro != true; $i++) {
            if ($this->getPasajeros()[$i]->getNumeroDocumento() == $dniParaRastrear) {
                $existePasajero = $i;
                $seEncontro = true;
            }
        }
        return $existePasajero;
    }

    public function modificarPasajero($numeroDniPasajero, $newNombre, $newApellido, $newNuevoTelefono)
    {
        if ($this->encontrarPosicionPasajero($numeroDniPasajero) != 0) {
            $this->getPasajeros()[$this->encontrarPosicionPasajero($numeroDniPasajero)]->setNombre($newNombre);
            $this->getPasajeros()[$this->encontrarPosicionPasajero($numeroDniPasajero)]->setApellido($newApellido);
            $this->getPasajeros()[$this->encontrarPosicionPasajero($numeroDniPasajero)]->setNumeroTelefono($newNuevoTelefono);
        } else {
            echo 'no hay pasajero con ese dni';
        }
        return $this->getPasajeros()[$this->encontrarPosicionPasajero($numeroDniPasajero)];
    }

    public function mostrarPasajeros()
    {
        $texto = "";
        foreach ($this->getPasajeros() as $pasajeroIndividual) {
            $texto .= " " . $pasajeroIndividual . "\n";
        }

        return $texto;
    }

    public function __toString()
    {
        return " responsable del viaje :{$this->getResponsableV()} 
codigo del destino: {$this->getDestino()}
destino: {$this->getDestino()}
cantidad Maxima de pasajeros: {$this->getCantidadMaximaPasajeros()}
pasajeros: {$this->mostrarPasajeros()}";
    }
}
