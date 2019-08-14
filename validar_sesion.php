<?PHP 
    session_start();
    if (!isset($_SESSION['identificacion']) || !isset($_SESSION['contrasena'])){ 
        session_destroy();
        header("Location:./index.php");
    }  
?>