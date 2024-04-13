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
        $i = 0;
        $existePasajero = -1;
        $seEncontro = false;
        while ($seEncontro != true && $i < $this->cantidadActualPasajeros()) {
            if ($this->getPasajeros()[$i]->getNumeroDocumento() == $dniParaRastrear) {
                $seEncontro = true;
                $existePasajero = $i;
            } else {
                $i++;
            }
        }
        return $existePasajero;
    }

    public function crearPasajero($nombre, $apellido, $dni, $numeroTelefono)
    {
        if ($this->encontrarPosicionPasajero($dni) == -1) {
            $objpersonaAux = new Pasajero($nombre, $apellido, $dni, $numeroTelefono);
            $arrayPasajerosAux = $this->getPasajeros();
            array_push($arrayPasajerosAux, $objpersonaAux);
            $this->setPasasejeros($arrayPasajerosAux);
        }
    }

    public function modificarPasajero($numeroDniPasajero, $newNombre, $newApellido, $newNuevoTelefono)
    {
        if ($this->encontrarPosicionPasajero($numeroDniPasajero) != -1) {
            $this->getPasajeros()[$this->encontrarPosicionPasajero($numeroDniPasajero)]->setNombre($newNombre);
            $this->getPasajeros()[$this->encontrarPosicionPasajero($numeroDniPasajero)]->setApellido($newApellido);
            $this->getPasajeros()[$this->encontrarPosicionPasajero($numeroDniPasajero)]->setNumeroTelefono($newNuevoTelefono);
        }
    }

    public function cambiarResponsable($numeroLicencia, $numEmpleado, $nombre, $apellido)
    {
        echo $this->getResponsableV();
        if ($this->getResponsableV()->getNumeroLicencia() == $numeroLicencia) {
            $this->getResponsableV()->setNombre($nombre);
            $this->getResponsableV()->setApellido($apellido);
            $this->getResponsableV()->setNumeroEmpleado($numEmpleado);
        }
        echo $this->getResponsableV();
        return ($this->getResponsableV()->getNumeroLicencia() == $numeroLicencia);
    }

    public function mostrarPasajeros()
    {
        $texto = "";
        $i = 1;
        foreach ($this->getPasajeros() as $pasajeroIndividual) {
            $texto .= "pasajero " . $i . ": " . $pasajeroIndividual . "\n";
            $i++;
        }

        return $texto;
    }

    public function __toString()
    {
        return "
{$this->getResponsableV()}
********************************
Datos del viaje:
codigo del destino: {$this->getCodigoViaje()}
destino: {$this->getDestino()}
cantidad Maxima de pasajeros: {$this->getCantidadMaximaPasajeros()}
********************************
{$this->mostrarPasajeros()}";
    }
}
