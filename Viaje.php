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

    public function crearPasajero($nombre, $apellido, $dni, $numeroTelefono, $numAsiento, $numTicket, $numViajeFrecuente, $numMillas, $requiereRuedas, $requiereAsistenciaEspecial, $requiereComidaEspecial)
    {
        if ($this->encontrarPosicionPasajero($dni) == -1) {
            if ($numMillas != null) {
                $objpersonaAux = new PasajeroVIP($nombre, $apellido, $dni, $numeroTelefono, $numAsiento, $numTicket, $numViajeFrecuente, $numMillas);
                $arrayPasajerosAux = $this->getPasajeros();
                array_push($arrayPasajerosAux, $objpersonaAux);
                $this->setPasasejeros($arrayPasajerosAux);
            } else if ($requiereRuedas != null) {
                $objpersonaAux = new PasajeroEspecial($nombre, $apellido, $dni, $numeroTelefono, $numAsiento, $numTicket, $requiereRuedas, $requiereAsistenciaEspecial, $requiereComidaEspecial);
                $arrayPasajerosAux = $this->getPasajeros();
                array_push($arrayPasajerosAux, $objpersonaAux);
                $this->setPasasejeros($arrayPasajerosAux);
            } else {
                $objpersonaAux = new Pasajero($nombre, $apellido, $dni, $numeroTelefono, $numAsiento, $numTicket);
                $arrayPasajerosAux = $this->getPasajeros();
                array_push($arrayPasajerosAux, $objpersonaAux);
                $this->setPasasejeros($arrayPasajerosAux);
            }
        }
        return ($this->encontrarPosicionPasajero($dni) != -1);
    }

    public function modificarPasajero($numeroDniPasajero, $newNombre, $newApellido, $newNuevoTelefono)
    {
        if ($this->encontrarPosicionPasajero($numeroDniPasajero) != -1) {
            $pasajeroParaModificar = $this->getPasajeros()[$this->encontrarPosicionPasajero($numeroDniPasajero)];
            $pasajeroParaModificar->setNombre($newNombre);
            $pasajeroParaModificar->setApellido($newApellido);
            $pasajeroParaModificar->setNumeroTelefono($newNuevoTelefono);
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
            if ($pasajeroIndividual instanceof PasajeroVIP) {
                $texto .= "pasajero " . $i . ":\nTipo: Vip" . $pasajeroIndividual . "\n";
            } else if ($pasajeroIndividual instanceof PasajeroEspecial) {
                $texto .= "pasajero " . $i . ":\nTipo: Especial" . $pasajeroIndividual . "\n";
            } else {
                $texto .= "pasajero " . $i . ":\nTipo: Comun" . $pasajeroIndividual."----------------\n";
            }
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
