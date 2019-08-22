<?PHP 
    require_once 'validar_sesion.php';
    require_once 'conexion_bd.php';
?>
<?PHP 
    $respuesta=array();

    extract($_POST);

    $name = $_FILES['imagen']['name'];
    $tmp_name = $_FILES['imagen']['tmp_name'];
    $ruta="imagenes/".$name;
    move_uploaded_file($tmp_name,$ruta);


    $hoy=date("Y/m/d H:i:s");
    $milisegundos=strtotime($hoy) * 1000;
    $seconds=$milisegundos/1000 -7*60*60;
    $fechaPublicada= date("Y/m/d H:i:s", $seconds);


    $idCliente=$_SESSION["identificacion"];
    $conexion=conectarse();
    if($conexion){
        $respuesta["conexion"]=TRUE;
        // $consulta="SELECT *FROM cliente WHERE idCliente='".$idCliente."' AND contrasena='".$contrasena."'";

        $numero_publicaciones=mysqli_num_rows(mysqli_query($conexion,"SELECT *FROM publicacion WHERE idCliente='".$idCliente."'"));
        if($numero_publicaciones<=3){ //SI EL NUMERO DE PUBLICACIONES NO EXCEDE EL LIMITE
            $consulta="INSERT INTO publicacion (nombre,ubicacion,precio,descripcion,fechaPublicada,estado,negociable,tipoInmueble,urlImagen,idCliente)
            VALUES ('".$nombre."','".$ubicacion."','".$precio."','".$descripcion."','".$fechaPublicada."','".$estado."','".$negociable."','".$tipoInmueble."','".$ruta."','".$idCliente."')";
            $respuesta["asdasd"]=$consulta;

            $result=mysqli_query($conexion,$consulta);
            if($result){
                $respuesta["consulta"]=TRUE;
            }else{
                $respuesta["consulta"]=FALSE;
            }
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