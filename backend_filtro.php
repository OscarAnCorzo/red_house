<?PHP 
    require_once 'conexion_bd.php';
?>

<?PHP 
    $respuesta=array();
    extract($_POST);

    if( $val_min == "" && $val_max == "" && $tipo == "Cualquiera" ){
        $consulta = "SELECT * FROM publicacion";
    }else{
        if( $val_min != "" && $val_max == "" && $tipo == "Cualquiera" ){
            $consulta = "SELECT * FROM publicacion WHERE precio >". $val_min ."";
        }else{
            if( $val_max != "" && $val_min == "" && $tipo == "Cualquiera" ){
                $consulta = "SELECT * FROM publicacion WHERE precio <". $val_max ."";
            }else{
                if( $val_max == "" && $val_min == "" && $tipo != "Cualquiera" ){
                    $consulta = "SELECT * FROM publicacion WHERE  tipoInmueble='". $tipo ."'";
                }else{
                    if( $val_max != "" && $val_min != "" && $tipo == "Cualquiera" ){
                        $consulta = "SELECT * FROM publicacion WHERE precio <". $val_max ." AND precio >".$val_min."";
                    }else{
                        if( $val_max != "" && $val_min == "" && $tipo != "Cualquiera" ){
                            $consulta = "SELECT * FROM publicacion WHERE precio <". $val_max ." AND tipoInmueble='".$tipo."'";
                        }else{
                            if( $val_max == "" && $val_min != "" && $tipo != "Cualquiera" ){
                                $consulta = "SELECT * FROM publicacion WHERE precio >". $val_min ." AND tipoInmueble='".$tipo."'";
                            }else{
                                $consulta = "SELECT * FROM publicacion WHERE precio >". $val_min ." AND tipoInmueble='".$tipo."' AND precio <".$val_min."";
                            }
                        }
                    }
                }
            }
        }
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