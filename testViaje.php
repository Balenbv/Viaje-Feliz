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

do {
    echo "\ningrese una opcion:\n
    1) modificar datos de un viaje precargado\n
    2) crear desde 0 un viaje\n
    3) ver los datos actuales del viaje\n
    4) salir\n\n ";
    $opcion = trim(fgets(STDIN));
    switch ($opcion) {
        case 1:
            do {
                echo "\n**************************************";
                echo "\n1) Modificar un pasajero en especifico\n";
                echo "2) agregar un pasajero nuevo\n";
                echo "3) modificar el responsable del viaje\n";
                echo "4) volver al menu principal\n";
                echo "**************************************\n";
                $opcionModificarCrear = trim(fgets(STDIN));
                switch ($opcionModificarCrear) {
                    case 1:
                        echo "ingrese los siguientes datos:\n";
                        echo "\nSu numero de dni para identificar al pajasero: ";
                        $dni = trim(fgets(STDIN));
                        if ($ObjViaje->encontrarPosicionPasajero($dni) != -1) {
                            echo "\nSu nuevo nombre: ";
                            $nombre = trim(fgets(STDIN));
                            echo "\nSu nuevo apellido: ";
                            $apellido = trim(fgets(STDIN));
                            echo "\nSu nuevo numero de telefono: ";
                            $numTelefono = trim(fgets(STDIN));
                            echo "\n\nse encontro el pasajero con el dni ingresado, sus nuevos datos son :" . $ObjViaje->modificarPasajero($dni, $nombre, $apellido, $numTelefono);
                        } else {
                            echo "/////////////////////////////////////////////////////////////////\nno existe un pasajero con ese DNI, por favor intentalo de nuevo.\n/////////////////////////////////////////////////////////////////\n";
                        }
                        break;

                    case 2:
                        echo "ingrese los datos del pasajero que agregar al vuelo";
                        echo "\nNombre: ";
                        $nombre = trim(fgets(STDIN));
                        echo "\nApellido: ";
                        $apellido = trim(fgets(STDIN));
                        echo "\nnumero de telefono: ";
                        $numTelefono = trim(fgets(STDIN));
                        echo "\nnumero de dni: ";
                        $dni = trim(fgets(STDIN));
                        if ($ObjViaje->cantidadActualPasajeros() + 1 < $ObjViaje->getCantidadMaximaPasajeros()) {
                            if ($ObjViaje->encontrarPosicionPasajero($dni) == -1) {
                                $newObjPasajero = new Pasajero($nombre, $apellido, $dni, $numTelefono);
                                array_push($coleccionPasajeros, $newObjPasajero);
                                echo "\nse agrego al pasajero exitosamente";
                            } else {
                                echo "\n/////////////////////////////////////\nya existe un pasajero con ese DNI\n/////////////////////////////////////";
                            }
                        } else {
                            echo "\n/////////////////////////////////////\nno hay espacio disponible para agregar al pasajero\n/////////////////////////////////////";
                        }

                        break;
                    case 3:
                        echo "ingrese los nuevos datos del responsable";
                        echo "\nIngrese su numero de licencia apra identificarlo: ";
                        $numeroLicencia = trim(fgets(STDIN));
                        echo "Su nuevo nombre: ";
                        $nombre = trim(fgets(STDIN));
                        echo "Su nuevo apellido: ";
                        $apellido = trim(fgets(STDIN));
                        echo "Su nuevo numero de empleado: ";
                        $numeroEmpleado = trim(fgets(STDIN));
                        if ($ObjViaje->cambiarResponsable($numeroLicencia, $numeroEmpleado, $nombre, $apellido) != 'no hay responsable con ese numero de licencia') {
                            echo "//////////////////////////////////////////////\nLos nuevos datos del responsable cargaron correctamente :)\n//////////////////////////////////////////////";
                        } else {
                            echo "//////////////////////////////////////////////\n" . $ObjViaje->cambiarResponsable($numeroLicencia, $numeroEmpleado, $nombre, $apellido) . "\n//////////////////////////////////////////////";
                        }
                        break;
                    default:
                        echo "\nopcion no valida\n\n";
                        break;
                }
            } while ($opcionModificarCrear != 4);

            break;

        case 2:
            echo "\nvamos a crear un viaje desde 0, ingrese el maximo de pasajeros para este vuelo:\n";
            $coleccionPasajeros = [];
            $cantidadMaximaPersonas = trim(fgets(STDIN));
            echo "\nAhora cuantos pasajeros quiere crear:\n";
            $cantidadPasajeros = trim(fgets(STDIN));

            do {
                echo "ingrese los datos del pasajero que agregar al vuelo";
                echo "\nNombre: ";
                $nombre = trim(fgets(STDIN));
                echo "Apellido: ";
                $apellido = trim(fgets(STDIN));
                echo "numero de telefono: ";
                $numTelefono = trim(fgets(STDIN));
                echo "numero de dni: ";
                $dni = trim(fgets(STDIN));
                if (count($coleccionPasajeros) == 0) {
                    array_push($coleccionPasajeros, new Pasajero($nombre, $apellido, $dni, $numTelefono));
                    echo "se agrego al pasajero exitosamente :)\n";
                } else if ($ObjViaje->encontrarPosicionPasajero($dni) != -1) {
                    array_push($coleccionPasajeros, new Pasajero($nombre, $apellido, $dni, $numTelefono));
                } else {
                    echo "\n/////////////////////////////////////\nya existe un pasajero con ese DNI\n/////////////////////////////////////\n";
                }
            } while (count($coleccionPasajeros) != $cantidadPasajeros);
            echo "\nAhora vamos a definir el responsable del viaje:\n";
            echo "\nIngrese su numero de licencia: ";
            $numeroLicencia = trim(fgets(STDIN));
            echo "Su nuevo nombre: ";
            $nombre = trim(fgets(STDIN));
            echo "Su nuevo apellido: ";
            $apellido = trim(fgets(STDIN));
            echo "Su nuevo numero de empleado: ";
            $numeroEmpleado = trim(fgets(STDIN));
            $objResponsable = new ResponsableV($numeroEmpleado, $numeroLicencia, $nombre, $apellido);

            echo "\nPor ultimo vamos a definir el viaje;\n";
            echo "\nIngrese el codigo del vuelo: ";
            $codigoViaje = trim(fgets(STDIN));
            echo "\nIngrese el destino del viaje";
            $destino = trim(fgets(STDIN));
            $ObjViaje = new Viaje($objResponsable, $codigoViaje, $destino, $cantidadMaximaPersonas, $coleccionPasajeros);
            break;
        case 3:
            echo $ObjViaje;
            break;
    }
} while ($opcion != 4);
