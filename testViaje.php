<?php

include_once 'classViaje.php';
include_once 'classPasajero.php';
include_once 'classResponsableV.php';

$objPersona1 = new Pasajero('pedro', 'morales', '981723', 981263);
$objPersona2 = new Pasajero('Ana', 'García', '12345678',289374);
$objPersona3 = new Pasajero('Juan', 'Pérez', '87654321',9817364);
$objPersona4 = new Pasajero('María', 'López', '23456789',91864);
$objPersona5 = new Pasajero('Luis', 'Fernández', '45678901',92874);
$objPersona6 = new Pasajero('Laura', 'Gómez', '67890123',9186);
$objPersona7 = new Pasajero('Carlos', 'Martínez', '89012345',1928367);
$objPersona8 = new Pasajero('Marta', 'Díaz', '10123456',1923678);
$objPersona9 = new Pasajero('Roberto', 'Rodríguez', '12545678',9286743);
$objPersona10 = new Pasajero('Sandra', 'Sánchez', '34567890',182736);

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

echo $ObjViaje->modificarPasajero(89012345,'juan','morales',119736);
