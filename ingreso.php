<?PHP 
  session_start();
  if (!isset($_SESSION['identificacion']) || isset($_SESSION['contrasena'])){ 
    session_destroy();
  }  
?>
<!DOCTYPE html>
<html lang="en">

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

<body id="registro">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-group">
                    <label>Identificacion</label>
                    <input id="idCliente" type="text" class="form-control" aria-describedby="emailHelp"
                        placeholder="Identificacion">
                </div>
                <div class="form-group">
                    <label>Contrasena</label>
                    <input id="contrasena" type="password" class="form-control" 
                        placeholder="ejemplo123">
                </div>
                <button onclick="ingresar()" class="btn btn-info">Iniciar Sesion</button>
            </div>
        </div>
    </div>

</body>

</html>