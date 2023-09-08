<?php

$archivo_txt = 'datos2.txt';

// Verificar si el archivo existe
if (file_exists($archivo_txt)) {
    // Leer el archivo línea por línea y almacenar cada línea en un array asociativo
    $datos = array();

    $lineas = file($archivo_txt, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if ($lineas === false) {
        die('No se pudo leer el archivo.');
    }

    foreach ($lineas as $linea) {
        $par = explode(',', $linea);

        // Verificar que la línea contiene dos elementos separados por coma
        if (count($par) === 2) {
            $nombre = trim($par[0]);
            $edad = intval(trim($par[1]));
            $datos[] = array('nombre' => $nombre, 'edad' => $edad);
        }
    }

    // Hacer algo con los datos
    foreach ($datos as $dato) {
        $nombre = $dato['nombre'];
        $edad = $dato['edad'];
        echo "Nombre: $nombre, Edad: $edad<br>";
    }
} else {
    die('El archivo no existe.');
}

?>
