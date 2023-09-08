<?php

$archivo_txt = 'datos3.txt';

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
        if (count($par) === 3) {
            $fecha = trim($par[0]);
            $dia=trim($par[1]);
            $efem = trim($par[2]);
            $datos[] = array('fecha' => $fecha,'dia' => $dia, 'efem' => $efem);
        }
    }

    // Hacer algo con los datos
    foreach ($datos as $dato) {
        $fechaA = $dato['fecha'];
        $dia = $dato['dia'];
        $efem = $dato['efem'];

        $fechaA= new DateTime($fechaA);
        $fechaA->format('mm-dd');
        
        //fecha del día
        $fecha_hoy = date("mm-dd");
        
        //echo $fecha_hoy;
        
        if($fechaA==$fecha_hoy){
            echo "Hoy: $dia, recordamos: $efem<br>";
            echo "-----<br>" ;
        }else{
            echo "No hay efémerides para hoy <br>";
        }

        //echo "Hoy: $dia, recordamos: $efem<br>";
    }
} else {
    die('El archivo no existe.');
}

?>
