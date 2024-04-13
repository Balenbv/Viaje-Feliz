<?php

include_once 'classViaje.php';
include_once 'classPasajero.php';
include_once 'classResponsableV.php';

$objPersona1 = new Pasajero('pedro', 'morales', '981723', 981263);
$objPersona2 = new Pasajero('Ana', 'García', '12345678', 289374);
$objPersona3 = new Pasajero('Juan', 'Pérez', '87654321', 9817364);
$objPersona4 = new Pasajero('María', 'López', '23456789', 91864);
$objPersona5 = new Pasajero('Luis', 'Fernández', '45678901', 92874);
$objPersona6 = new Pasajero('Laura', 'Gómez', '67890123', 9186);
$objPersona7 = new Pasajero('Carlos', 'Martínez', '89012345', 1928367);
$objPersona8 = new Pasajero('Marta', 'Díaz', '10123456', 1923678);
$objPersona9 = new Pasajero('Roberto', 'Rodríguez', '12545678', 9286743);
$objPersona10 = new Pasajero('Sandra', 'Sánchez', '34567890', 182736);

$coleccionPasajeros = [
    $objPersona1,
    $objPersona2,
    $objPersona3,
    $objPersona4,
    $objPersona5,
    $objPersona6,
    $objPersona7,
    $objPersona8,
    $objPersona9,
    $objPersona10
];

$objResponsable = new ResponsableV('1312', '88', 'valentin', 'bustos villar');
$ObjViaje = new Viaje($objResponsable, '787', 'chubut', 150, $coleccionPasajeros);
$i = 0;
do {
    echo "*****************************\nEliga una opcion:\n";
    echo "1) Opciones Pasajero/s.\n2) Modificar al responsable.\n3) Opciones vuelo.\n4) Ver datos vuelo.\n5) Salir.\n";
    echo "*****************************\nEliga una opcion:\n";
    $opcionPrimerMenu = trim(fgets(STDIN));

    switch ($opcionPrimerMenu) {

        case 1:
            echo "  1) Modificar un pasajero.\n  2) Agregar un pasajero.\n";
            $opcionSegundoMenu = trim(fgets(STDIN));
            if ($opcionSegundoMenu == 1) {
                echo "\nIngrese el dni del pasajero a modificar: ";
                $dni = trim(fgets(STDIN));
                if ($ObjViaje->encontrarPosicionPasajero($dni) != -1) {
                    echo "Se encontro el pasajero :).\n";
                    echo "ingrese el nuevo nombre: ";
                    $nuevoNombre = trim(fgets(STDIN));
                    echo "\nSu nuevo apellido";
                    $nuevoApellido = trim(fgets(STDIN));
                    echo "\nSu nuevo numero de telefono";
                    $nuevoNumeroTelefono = trim(fgets(STDIN));
                    $ObjViaje->modificarPasajero($dni, $nuevoNombre, $nuevoApellido, $nuevoNumeroTelefono);
                    echo "\nSe cambiaron los datos exitosamente :D";
                } else {
                    echo 'no hay pasajero con ese dni';
                }
            } else if ($opcionSegundoMenu == 2) {
            } else {
                echo "\n/////////////////////\nOpcion invalida\n/////////////////////\n";
            }
            break;

        case 2:;
            break;

        case 3:
            echo "  1) Modificar el codigo del viaje.\n  2) Modificar destino de viaje.\n";
            break;

        case 4:;
            break;
    }
} while ($opcionPrimerMenu != 5);
