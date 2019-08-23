<?PHP 
    require_once 'conexion_bd.php';
?>

<?PHP 
    $respuesta=array();
    extract($_POST);

    if( $operacion == 'activas' ){
        $consulta = "SELECT * FROM publicacion where estado = '1'";
    }else{
        $consulta = "SELECT * FROM publicacion where estado = '0'";
    }

    $conexion=conectarse();
    if($conexion){
        $respuesta["conexion"]=TRUE;
        //$consulta = "SELECT * FROM publicacion";
        $result=mysqli_query($conexion,$consulta);
        $numero=mysqli_num_rows($result);
        if($numero>0){
            $respuesta['publicaciones'] = array();
            $i=0;
            while($p = mysqli_fetch_assoc($result)){
                $respuesta['publicaciones'][$i] = $p;
                $i++;
            }

            $respuesta["consulta"]=TRUE;
        }else{
            $respuesta["consulta"]=FALSE;
        }
    }else{
        $respuesta["conexion"]=FALSE;
    }
    $respuesta["cosa"]=$consulta;

    mysqli_close($conexion);
    header('Content-Type: application/json');
    echo json_encode($respuesta);

?>