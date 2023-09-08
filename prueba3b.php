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
        $cont=0;
        // Verificar que la línea contiene tres elementos separados por coma
        if (count($par) === 3) {
            $fecha = trim($par[0]);
            $dia = trim($par[1]);
            $efem = trim($par[2]);

            // Intentar crear un objeto DateTime, verificar si es válido
            $fechaA = DateTime::createFromFormat('Y-m-d', $fecha);
            
            //determinar el día actual
            $fecha_hoy = date("m-d");
            
                       
            
            if ($fechaA instanceof DateTime) {
                $fechaA = $fechaA->format('m-d');

                // Comparar la fecha formateada con la fecha de hoy
                // Busca si hay efemérides el día actual
                               
                if ($fechaA == $fecha_hoy) {
                    $cont++;
                                        
                    if($cont===1){
                        echo "Hoy $dia es: ";
                    }
                    echo $efem . "<br>";
                                       
                    
                    echo "-----<br>";
                } else {
                    
                    //echo "No hay efemérides para hoy.<br>";
                }


            } else {
                echo "Error al analizar la fecha: $fecha<br>";
                }
            

        }
    }

    
        
    
} else {
    die('El archivo no existe.');
}

?>
