<?PHP 
    function conectarse(){
        $conexion = new mysqli("localhost", "root", "123456", "redhouse");
        if($conexion->connect_error) {
            return false;
        } else {
            return $conexion;
        }
    }
?>