<?php

include_once 'Persona.php';
include_once 'Pasajero.php';
include_once 'PasajeroVIP.php';
include_once 'PasajeroEspecial.php';
include_once 'ResponsableV.php';
include_once 'Viaje.php';

$objPasajero1 = new Pasajero('John', 'Doe', '12345678', '555-1234', 12, 293847);
$objPasajero2 = new Pasajero('Jane', 'Smith', '87654321', '555-5678', 34, 2984);
$objPasajero3 = new Pasajero('Mike', 'Johnson', '98765432', '555-4321', 56, 28139);
$objPasajero4 = new Pasajero('Emily', 'Williams', '23456789', '555-8765', 78, 23973);
$objPasajero5 = new Pasajero('David', 'Brown', '98765432', '555-9876', 90, 23421);
$objPasajero6 = new PasajeroVIP('Sarah', 'Davis', '34567890', '555-2345', 73, 92873, 589, 840);
$objPasajero7 = new PasajeroVIP('Michael', 'Wilson', '9876543', '555-7890', 45, 2654, 987, 2345);
$objPasajero8 = new PasajeroVIP('Jessica', 'Taylor', '56789012', '555-3456', 23, 3456, 1234, 3456);
$objPasajero9 = new PasajeroEspecial('Daniel', 'Anderson', '10987654', '555-9012', 29, 23423, true, true, true);
$objPasajero10 = new PasajeroEspecial('Sophia', 'Thomas', '45678901', '555-6789', 67, 7324, false, true, false);

$coleccionPasajeros = [$objPasajero1, $objPasajero2, $objPasajero3, $objPasajero4, $objPasajero5, $objPasajero6, $objPasajero7, $objPasajero8, $objPasajero9, $objPasajero10];

$objResponsable = new ResponsableV('Juan', 'Pérez', '87654321', 9817364, '123456', '987654');
$objViaje = new Viaje($objResponsable, '787', 'chubut', 150, $coleccionPasajeros, 1000);

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
                if ($objViaje->encontrarPosicionPasajero($dni) != -1) {
                    echo "Se encontro el pasajero :)\n";
                    echo "ingrese el nuevo nombre: ";
                    $nuevoNombre = trim(fgets(STDIN));
                    echo "Su nuevo apellido: ";
                    $nuevoApellido = trim(fgets(STDIN));
                    echo "Su nuevo numero de telefono: ";
                    $nuevoNumeroTelefono = trim(fgets(STDIN));
                    $objViaje->modificarPasajero($dni, $nuevoNombre, $nuevoApellido, $nuevoNumeroTelefono);
                    echo "Se cambiaron los datos exitosamente :D";
                } else {
                    echo "no hay pasajero con ese dni\n";
                }
            } else if ($opcionSegundoMenu == 2 && $objViaje->harPasajesDisponibles()) {

                echo "que tipo de pasajero desea crear?\n";
                echo "1) Pasajero VIP.\n2) Pasajero especial.\n3) Pasajero comun.\n";
                $opcionTercerMenu = trim(fgets(STDIN));
                if ($opcionTercerMenu == 1) {
                    echo "\nIngrese el dni del pasajero a crear: ";
                    $dni = trim(fgets(STDIN));
                    if ($objViaje->encontrarPosicionPasajero($dni) == -1) {
                        echo "ingrese el nombre: ";
                        $nuevoNombre = trim(fgets(STDIN));
                        echo "Su apellido: ";
                        $nuevoApellido = trim(fgets(STDIN));
                        echo "Su numero de telefono: ";
                        $nuevoNumeroTelefono = trim(fgets(STDIN));
                        echo 'ingrese su numero de asiento: ';
                        $numAsiento = trim(fgets(STDIN));
                        echo 'ingrese su numero de ticket: ';
                        $numTicket = trim(fgets(STDIN));
                        echo 'ingrese su numero de viaje frecuente: ';
                        $numViajeFrecuente = trim(fgets(STDIN));
                        echo 'ingrese su numero de millas acumuladas: ';
                        $numMillasAcumuladas = trim(fgets(STDIN));
                        $importe = $objViaje->venderPasaje($nuevoNombre, $nuevoApellido, $dni, $nuevoNumeroTelefono, $numAsiento, $numTicket, $numViajeFrecuente, $numMillasAcumuladas, null, null, null);
                        if ($importe != 0) {
                            echo "se creo el pasajero correctamente :D\nEl precio de su pasaje es: ". $importe."\n"; 
                        } else {
                            echo "no se pudo crear el pasajero :(\n";
                        }
                    } else {
                        echo "\nya existe un pasajero con ese dni :(\n";
                    }
                } else if ($opcionTercerMenu == 2) {
                    echo "\nIngrese el dni del pasajero a crear: ";
                    $dni = trim(fgets(STDIN));
                    if ($objViaje->encontrarPosicionPasajero($dni) == -1) {
                        echo "ingrese el nombre: ";
                        $nuevoNombre = trim(fgets(STDIN));
                        echo "Su apellido: ";
                        $nuevoApellido = trim(fgets(STDIN));
                        echo "Su numero de telefono: ";
                        $nuevoNumeroTelefono = trim(fgets(STDIN));
                        echo 'ingrese su numero de asiento: ';
                        $numAsiento = trim(fgets(STDIN));
                        echo 'ingrese su numero de ticket: ';
                        $numTicket = trim(fgets(STDIN));
                        echo 'requiere silla de ruedas? (true/false): ';
                        $requiereRuedas = trim(fgets(STDIN));
                        $requiereRuedas = ($requiereRuedas == 'true');
                        echo 'requiere asistencia especial? (true/false): ';
                        $requiereAsistenciaEspecial = trim(fgets(STDIN));
                        $requiereAsistenciaEspecial = ($requiereAsistenciaEspecial == 'true');
                        echo 'requiere comida especial? (true/false): ';
                        $requiereComidaEspecial = trim(fgets(STDIN));
                        $requiereComidaEspecial = ($requiereComidaEspecial == 'true');
                        $importe = $objViaje->venderPasaje($nuevoNombre, $nuevoApellido, $dni, $nuevoNumeroTelefono, $numAsiento, $numTicket, null, null, $requiereRuedas, $requiereAsistenciaEspecial, $requiereComidaEspecial);
                        if ($importe != 0) {
                            echo "se creo el pasajero correctamente :D\nEl precio de su pasaje es: ". $importe."\n"; 
                        } else {
                            echo "no se pudo crear el pasajero :(\n";
                        }
                    } else {
                        echo "\nya existe un pasajero con ese dni :(\n";
                    }
                } else if ($opcionTercerMenu == 3) {
                    echo "\nIngrese el dni del pasajero a crear: ";
                    $dni = trim(fgets(STDIN));
                    if ($objViaje->encontrarPosicionPasajero($dni) == -1) {
                        echo "ingrese el nombre: ";
                        $nuevoNombre = trim(fgets(STDIN));
                        echo "Su apellido: ";
                        $nuevoApellido = trim(fgets(STDIN));
                        echo "Su numero de telefono: ";
                        $nuevoNumeroTelefono = trim(fgets(STDIN));
                        echo 'ingrese su numero de asiento: ';
                        $numAsiento = trim(fgets(STDIN));
                        echo 'ingrese su numero de ticket: ';
                        $numTicket = trim(fgets(STDIN));
                        $importe = $objViaje->venderPasaje($nuevoNombre, $nuevoApellido, $dni, $nuevoNumeroTelefono, $numAsiento, $numTicket, null, null, null, null, null);
                        if ($importe != 0) {
                            echo "se creo el pasajero correctamente :D\nEl precio de su pasaje es: ". $importe."\n"; 
                        } else {
                            echo "no se pudo crear el pasajero :(\n";
                        }
                    } else {
                        echo "\nya existe un pasajero con ese dni :(\n";
                    }
                } else {
                    echo "\n/////////////////////\nOpcion invalida\n/////////////////////\n";
                }
            } else {
                echo "no hay mas asientos disponibles\n";
            }
            break;
        case 2:
            echo "\ningrese los nuevos datos del responsable:\n";
            echo "Ingrese su numero de licencia: ";
            $nuevoNumeroLicencia = trim(fgets(STDIN));
            echo "Su nuevo nombre: ";
            $nuevoNombre = trim(fgets(STDIN));
            echo "Su nuevo apellido: ";
            $nuevoApellido = trim(fgets(STDIN));
            echo "Su nuevo numero de empleado: ";
            $nuevoNumeroEmpleado = trim(fgets(STDIN));
            if ($objViaje->cambiarResponsable($nuevoNumeroLicencia, $nuevoNumeroEmpleado, $nuevoNombre, $nuevoApellido)) {
                echo "se cargaron los nuevos datos correctamente :D\n";
            } else {
                echo "el responsable no tiene el dni que ingreso\n";
            }
            break;
        case 3:
            echo "  1) Modificar el codigo del viaje.\n  2) Modificar destino de viaje.\n";
            $opcionSegundoMenu = trim(fgets(STDIN));
            if ($opcionSegundoMenu == 1) {
                echo "ingrese el nuevo codigo del viaje: ";
                $nuevoCodigoDelviaje = trim(fgets(STDIN));
                $objViaje->setCodigoViaje($nuevoCodigoDelviaje);
                echo "los datos fueron cambiados correctamente :)\n";
            } else if ($opcionSegundoMenu == 2) {
                echo "ingrese el nuevo destino del viaje\n";
                $nuevoDestinoViaje = trim(fgets(STDIN));
                $objViaje->setDestino($nuevoDestinoViaje);
                echo "\nSe cambio el destino exitosamente :)\n";
            } else {
                echo "\n/////////////////////\nOpcion invalida\n/////////////////////\n";
            }
            break;

        case 4:
            echo $objViaje;
            break;
    }
} while ($opcionPrimerMenu != 5);
