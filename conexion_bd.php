<?PHP 
    function conectarse(){
        $conexion = new mysqli("localhost", "root", "", "redhouse");
        if($conexion->connect_error) {
            return false;
        } else {
            return $conexion;
        }
    }
?>