<?PHP 
    include("funciones.php");
    session_start();
    if (!isset($_SESSION['identificacion']) || !isset($_SESSION['contrasena'])){ 
        session_destroy();
        header("Location: ./ingreso.php");
    }  
?>
<!DOCTYPE html>
<html lang="en" id="cosa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingreso</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery-3.4.1.min.js"></script>
    <script src="funciones.js"></script>
    <link rel="stylesheet" href="estilo.css">

</head>
    <?PHP 
        if (isset($_SESSION['identificacion']) || isset($_SESSION['contrasena'])){ 
            encabezadoCliente();
        }  else{
            encabezado();
        }
    ?>

<body id="ingreso">

    <div class="container" id="advanced-search-form">
        <h2>Publicar Oferta</h2>
            <div class="form-group">
                <label for="first-name">Nombre</label>
                <input type="text" class="form-control" id="nombre">
            </div>
            <div class="form-group">
                <label for="last-name">Ubicación</label>
                <input type="text" class="form-control" id="ubicacion">
            </div>
            <div class="form-group">
                <label for="country">Precio</label>
                <input type="text" class="form-control" id="precio">
            </div>
            <div class="form-group">
                <label for="number">Descripción</label>
                <input type="text" class="form-control" id="descripcion">
            </div>
            <div class="form-group">
                <label for="age">Estado</label>
                <input type="text" class="form-control" id="estado">
            </div>
            <div class="form-group">
                <label for="email">Negociable</label>
                <input type="email" class="form-control" id="negociable">
            </div>
            <div class="form-group">
                <label for="category">Tipo de Inmueble</label>
                <input type="text" class="form-control" id="tipoInmueble">
            </div>
            <div class="form-group">
                <label for="education">Imagen</label>
                <input type="file"  id="urlImagen">
            </div>
            <div class="clearfix"></div>
            <button class="btn btn-info btn-lg btn-responsive" onclick="publicar_oferta()"> <span class="glyphicon glyphicon-search"></span>Publicar</button>
    </div>
</body>

</html>