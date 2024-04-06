<?php

include_once 'classViaje.php';
include_once 'classPasajero.php';
include_once 'classResponsable.php';

$objPersona1 = new Pasajero('pedro', 'morales', '981723');
$objPersona2 = new Pasajero('Ana', 'García', '12345678');
$objPersona3 = new Pasajero('Juan', 'Pérez', '87654321');
$objPersona4 = new Pasajero('María', 'López', '23456789');
$objPersona5 = new Pasajero('Luis', 'Fernández', '45678901');
$objPersona6 = new Pasajero('Laura', 'Gómez', '67890123');
$objPersona7 = new Pasajero('Carlos', 'Martínez', '89012345');
$objPersona8 = new Pasajero('Marta', 'Díaz', '10123456');
$objPersona9 = new Pasajero('Roberto', 'Rodríguez', '12345678');
$objPersona10 = new Pasajero('Sandra', 'Sánchez', '34567890');

$coleccionPasajeros =[$objPersona1,
$objPersona2,
$objPersona3,
$objPersona4,
$objPersona5,
$objPersona6,
$objPersona7,
$objPersona8,
$objPersona9,
$objPersona10];

$objResponsable = new ResponsableV('1312', '88','valentin','bustos villar');

$ObjViaje = new Viaje($objResponsable, '787', 'chubut', 150, $coleccionPasajeros);

echo $ObjViaje;

