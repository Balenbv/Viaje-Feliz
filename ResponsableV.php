<?php

class ResponsableV extends Persona
{
    private $numeroEmpleadoInt;
    private $numeroLicienciaInt;
    
    public function __construct($nombre, $apellido, $numeroDocumento, $numeroTelefono, $numeroEmpleado, $numeroLicencia)
    {
        parent::__construct($nombre, $apellido, $numeroDocumento, $numeroTelefono);
        $this->numeroEmpleadoInt = $numeroEmpleado;
        $this->numeroLicienciaInt = $numeroLicencia;
    }

    public function getNombre()
    {
        return parent::getNombre();
    }

    public function getApellido()
    {
        return parent::getApellido();
    }
    
    public function getNumeroEmpleado()
    {
        return $this->numeroEmpleadoInt;
    }

    public function getNumeroLicencia()
    {
        return $this->numeroLicienciaInt;
    }

 

    public function setNumeroEmpleado($newNumeroEmpleado)
    {
        $this->numeroEmpleadoInt = $newNumeroEmpleado;
    }

    public function setNumeroLicencia($newNumeroLicencia)
    {
        $this->numeroLicienciaInt = $newNumeroLicencia;
    }

    public function setNombre($newNombre)
    {
        parent::setNombre($newNombre);
    }

    public function setApellido($newApellido)
    {
        parent::setApellido($newApellido);
    }

    public function __toString()
    {
        return "
Datos del resposable: 
Nombre/s: {$this->getNombre()}
Apellido/s: {$this->getApellido()} 
Numero de empleado: {$this->getNumeroEmpleado()}
Numero de licencia: {$this->getNumeroLicencia()}\n";
    }
}
