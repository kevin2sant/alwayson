<?php

if (!empty($argv[1])) {
    $fechaActual = date('Y-m-d');
    $fecha = strtotime ('-'.$argv[1].' day', strtotime($fechaActual));
    $fecha = date('Y-m-d' , $fecha);
}else{
    $fecha = date('Y-m-d');
}

    
    $mysqli = new mysqli('localhost', 'root', '', 'user');

    // ¡Oh, no! Existe un error 'connect_errno', fallando así el intento de conexión
    if ($mysqli->connect_errno) {
      
       
        echo "Error: Fallo al conectarse a MySQL debido a: \n";
        echo "Errno: " . $mysqli->connect_errno . "\n";
        echo "Error: " . $mysqli->connect_error . "\n";
        
        exit;
    }

    $sql = "select * from users";

    $resultado = $mysqli->query($sql);

    foreach($resultado as $key){
      echo $key['nombre'];
    }
?>