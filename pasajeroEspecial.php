<?php

class PasajeroEspecial extends Pasajero
{
    private $requiereRuedas;
    private $requiereAsistencia;
    private $requiereComidaEspecial;

    public function __construct($nombre, $apellido, $numeroDocumento, $numeroTelefono, $numeroAsiento, $numeroTicket, $requiereRuedas, $requiereAsistencia, $requiereComidaEspecial)
    {
        parent::__construct($nombre, $apellido, $numeroDocumento, $numeroTelefono, $numeroAsiento, $numeroTicket);
        $this->requiereRuedas = $requiereRuedas;
        $this->requiereAsistencia = $requiereAsistencia;
        $this->requiereComidaEspecial = $requiereComidaEspecial;
    }

    public function getRequiereRuedas()
    {
        return $this->requiereRuedas;
    }

    public function getRequiereAsistencia()
    {
        return $this->requiereAsistencia;
    }

    public function getRequiereComidaEspecial()
    {
        return $this->requiereComidaEspecial;
    }

    public function setRequiereRuedas($newRequiereRuedas)
    {
        $this->requiereRuedas = $newRequiereRuedas;
    }

    public function setRequiereAsistencia($newRequiereAsistencia)
    {
        $this->requiereAsistencia = $newRequiereAsistencia;
    }

    public function setRequiereComidaEspecial($newRequiereComidaEspecial)
    {
        $this->requiereComidaEspecial = $newRequiereComidaEspecial;
    }

    public function darPorcentajeIncremento()
    {
        $importeIncremento = 15;
        if ($this->getRequiereRuedas() && $this->getRequiereAsistencia() && $this->getRequiereComidaEspecial()) {
            $importeIncremento = 30;
        }
        return $importeIncremento;
    }



    public function __toString()
    {
        return parent::__toString() .
            "Requiere ruedas: {$this->getRequiereRuedas()}\n" .
            "Requiere asistencia: {$this->getRequiereAsistencia()}\n" .
            "Requiere comida especial: {$this->getRequiereComidaEspecial()}\n----------------\n";
    }
}
