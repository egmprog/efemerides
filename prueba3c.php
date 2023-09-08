<?php
$cont=0;
$encontrado=false;
$impresos=array();
$impresos2=array();
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
        
        // Verificar que la línea contiene tres elementos separados por coma
        if (count($par) === 3) {
            $fecha = trim($par[0]);
            $dia = trim($par[1]);
            $efem = trim($par[2]);
        

            // Crear un objeto DateTime
            $fechaA = DateTime::createFromFormat('Y-m-d', $fecha);
            $fechaA = $fechaA->format('m-d');

            //determinar el día actual
            $fecha_hoy = date("m-d");


            // Comparar la fecha formateada ($fechaA) con la fecha de hoy
            // Busca si hay efemérides el día actual
           
            
            if ($fechaA == $fecha_hoy) {
                
                //imprimir una sola vez la fecha del día actual
                    if(!in_array($dia,$impresos)){
                        echo "Hoy $dia es: <br>";
                        $impresos[]=$dia;
                        //echo count($impresos);
                    }                
                echo $efem . "<br>";
                $encontrado=true;
                
            } 
                
        }
        
    }

    if(!($encontrado)){

        //imprimir una sola vez el mensaje

        if (!in_array("N", $impresos2)) {
            echo "Hoy no hay efemérides <br>";
            $impresos2[] = "N";
        }
    }  
    
        
    
} else {
    die('El archivo no existe.');
}
