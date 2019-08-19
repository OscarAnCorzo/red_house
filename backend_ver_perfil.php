<?PHP 
    include 'conexion_bd.php';
?>
 
<?PHP 
    $respuesta=array();

    $idCliente=$_POST["idCliente"];
   
    $conexion=conectarse();
    if($conexion){
        $respuesta["conexion"]=TRUE;

        $consulta="SELECT * FROM cliente WHERE idCliente='".$idCliente."'";
        $result=mysqli_query($conexion,$consulta);
        $numero=mysqli_num_rows($result);
        if($numero>0){
            $respuesta["consulta"]=TRUE;
            if($cliente = mysqli_fetch_assoc($result)){
                $respuesta["cliente"]=$cliente;
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



