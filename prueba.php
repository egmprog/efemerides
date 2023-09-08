<?php

// Ruta al archivo de texto que contiene el array en formato JSON
$archivo_txt = 'datos.txt';

// Leer el contenido del archivo
$contenido = file_get_contents($archivo_txt);

if ($contenido === false) {
    die('No se pudo leer el archivo.');
}

// Decodificar el JSON en un array de PHP
$datos = json_decode($contenido, true);

if ($datos === null) {
    die('Error al decodificar el JSON.');
}

// Acceder a los datos en el array
$nombres = $datos['nombres'];
$edades = $datos['edades'];

// Hacer algo con los datos
foreach ($nombres as $indice => $nombre) {
    $edad = $edades[$indice];
    echo "Nombre: $nombre, Edad: $edad<br>";
}
?>