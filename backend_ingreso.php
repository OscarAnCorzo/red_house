<?PHP 
    require_once 'conexion_bd.php';
?>

<?PHP 
    $respuesta=array();
    extract($_POST);


    $conexion=conectarse();
    if($conexion){
        $respuesta["conexion"]=TRUE;
        $consulta="SELECT *FROM cliente WHERE idCliente='".$idCliente."' AND contrasena='".$contrasena."'";
        $result=mysqli_query($conexion,$consulta);
        $numero=mysqli_num_rows($result);
        if($numero>0){
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