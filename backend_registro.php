<?PHP 
    include 'conexion_bd.php';
?>
<?PHP 
    $respuesta=array();

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $hoy=date("Y/m/d H:i:s");
    $milisegundos=strtotime($hoy) * 1000;
    $seconds=$milisegundos/1000 -7*60*60;
    $fecha_creado= date("Y/m/d H:i:s", $seconds);
    $fecha_actualizado = $fecha_creado;

    $conexion=conectarse();
    if($conexion){
        $respuesta["conexion"]=TRUE;
        $consulta="INSERT INTO cliente (id_cliente,nombre,apellido,telefono,correo,contrasena,fecha_creado,fecha_actualizado) 
        VALUES ('".$id."','".$nombre."','".$apellido."','".$telefono."','".$correo."','".$contrasena."','".$fecha_creado."','".$fecha_actualizado."')";
        if(mysqli_query($conexion,$consulta)){
            $respuesta["consulta"]=TRUE;
        }else{
            $respuesta["consulta"]=FALSE;
        }
    }else{
        $respuesta["conexion"]=FALSE;
    }
    mysqli_close($conexion);
    header('Content-Type: application/json');
    echo json_encode($respuesta);
?>