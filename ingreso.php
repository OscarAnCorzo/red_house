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
    <!-- <div class="container">
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
    </div> -->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <section class="login-block">
        <div class="container cc">
            <div class="row">
                <div class="col-md-4 login-sec">
                    <h2 class="text-center">Iniciar Sesión</h2>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase">Identificación</label>
                        <input id="idCliente" type="text" class="form-control" placeholder="">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-uppercase">Contraseña</label>
                        <input id="contrasena" type="password" class="form-control" placeholder="">
                    </div>


                    <div class="form-check">
                        <button onclick="ingresar()" class="btn btn-login float-right">Submit</button>
                    </div>

                </div>
                <div class="col-md-8 banner-sec">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block img-fluid"
                                    src="./imagenes/fondo.jpg" alt="First slide">
                                
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid"
                                src="./imagenes/fondo.jpg" alt="First slide">

                                
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid"
                                src="./imagenes/fondo.jpg" alt="First slide">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>
</body>

</html>