<?php

require("conexion.php");

function insertar_datos($con, $nombre, $apellido, $email, $pass){
    $nombreCompleto= $nombre . ' '. $apellido;
    $consulta_insertar= "INSERT INTO usuarios(nombrecompleto, email, pass )  VALUES( '$nombreCompleto', '$email', '$pass') ";

    if (mysqli_query($con, $consulta_insertar)) {
        consultar_datos($con);
    } else {
        echo "Error: " . $consulta_insertar . "<br>" . mysqli_error($con);
    }
}

function consultar_datos($con) {
    $consulta = "SELECT * FROM usuarios";
    $resultado = mysqli_query($con, $consulta);
    $salida = "";

    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $salida .= "<div class='alumno'>ID: " . $fila["id_user"] . " - Nombre: " . $fila["nombrecompleto"] . " - Email: " . $fila["email"] . "</div><hr>";
        }
    } else {
        $salida = "Sin datos ";
    }
    return $salida;
}

function mostrar_asignaturas($con) {
    $consulta = "SELECT * FROM asignaturas";
    $resultado = mysqli_query($con, $consulta);
    $salida = "";

    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $salida .= "<div class='asignatura'>ID: " . $fila["id_asignatura"] . " - Nombre: " . $fila["nombre"] . "</div><hr>";
        }
    } else {
        $salida = "Sin datos ";
    }
    return $salida;
}

function contar_alumnos($con) {
    $consulta = "SELECT COUNT(*) as total_alumnos FROM usuarios";
    $resultado = mysqli_query($con, $consulta);
    $fila = mysqli_fetch_assoc($resultado);
    return $fila['total_alumnos'];
}

function contar_asignaturas($con) {
    $consulta = "SELECT COUNT(*) as total_asignaturas FROM asignaturas";
    $resultado = mysqli_query($con, $consulta);
    $fila = mysqli_fetch_assoc($resultado);
    return $fila['total_asignaturas'];
}

function asignaturas_codigo3($con) {
    $consulta = "SELECT * FROM asignaturas WHERE codigo = 3";
    $resultado = mysqli_query($con, $consulta);
    $salida = "";

    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $salida .= "<div class='asignatura'>ID: " . $fila["id_asignatura"] . " - Nombre: " . $fila["nombre"] . "</div><hr>";
        }
    } else {
        $salida = "Sin datos para código 3";
    }
    return $salida;
}

?>
