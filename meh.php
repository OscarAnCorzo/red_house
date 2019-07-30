<?PHP 
    $hoy=date("Y/m/d H:i:s");
    echo $hoy;
    echo "        -------------     ";
    $milisegundos=strtotime($hoy) * 1000;
    echo $milisegundos;
    echo "        -------------     ";
    $seconds=$milisegundos/1000 -7*60*60;
    echo date("Y/m/d H:i:s", $seconds);

    
    //  $fecha_creado = date["Y"]."-".date["m"]."-".date["d"]." ".date["H"]-7).":".date["Y"].":".date["Y"];    
    // echo date["Y"];
    // echo $fecha_creado;
?>