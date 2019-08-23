<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    session_start();
    include("funciones.php");
    $conexion = conectar();
    $sql = "select * from publicacion where estado = '1'";

    $r = mysqli_query($conexion, $sql);
    //$publicaciones = mysqli_fetch_array($r);

    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <script id="plantilla" type="text/x-jquery-tmpl">
        <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8 contenidoPublicacion">
                                    <div class="divImagenPerfil">
                                        <img src="imagenes/im_perfil.png" alt="foto de perfil" style="width: 100%; border-radius: 50%;">
                                    </div>
                                    <div class="encabezadoPublicacion">
                                        <span class="tituloPublicacion">${nombre}</span></br>
                                        <span class="subtituloPublicacion">${ubicacion}</span></br>
                                    </div>
                                    <div class="divPrecio">
                                    <div style="width:100%;">
                                            <button type="button" class="btn btn-secondary btm-sm" style="position: relative; float:right; padding:1%; margin-right:10px;">Activo</button>
                                            
                                            <button type="button" class="btn btn-secondary btm-sm" style="position: relative; float:right; padding:1%; margin-right:10px;">Inactivo</button>
                                        </div>
                                        <span class="tituloPublicacion" style="color:#4CAF50;font-size:25px;">$${precio}</span> - <span class="subtituloPublicacion">
                                        
                                        ${negociable}
                                        </span>
                                    </div>
                                    <div class="imagenPublicacion">
                                        <img src=${urlImagen} alt="Publicacion" style="width: 100%">
                                    </div>
                                    <div class="descripcionPublicacion">
                                        <p>${descripcion}</p>
                                    </div>
                                    <div class="botonesPublicacion">
                                        <span class="botonPublicacion"><i class="fas fa-star"></i> 4.5</span>
                                        <span ><i class="fas fa-comment-alt"></i> Comentarios</span>
                                    </div>
                                    
                                </div>
                                <div class="col-md-2">
                                    
                                </div>
                            </div>
                            <br>
    </script>
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>

    <title>Mis  Publicaciones</title>
</head>

<body>
    <?PHP 
    if (!isset($_SESSION['identificacion']) || !isset($_SESSION['contrasena'])){ 
        session_destroy();
        encabezado();
        $sesion = FALSE;
    }else{
        encabezadoCliente();
        $sesion = TRUE;
    }
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 fondo">
                <br>
                <div id="uno-cuenta" class="contenedor">
                <div id="contenido" class="ee">
                    <p id="letra" >
                        <span style="font-size: 50px;"><br><b>¡Hola <?PHP echo $_SESSION['nombre'];?>!</b></span>
                        <br>
                        <span style="font-size: 35px;font-family: Arial, Helvetica, sans-serif;">
                            <br><b>Aqui encontraras tus publicaciones activas e inactivas,<br>
                            ademas podras editarlas cuando quieras.<br>
                            <br>
                            </b>
                        </span>
                    </p>
                    <a class="btn btn-success enlaton2 btn-lg bot" style="    background-color: #1fc8db;
        background-image: linear-gradient(141deg, #9fb8ad 0%, #1fc8db 51%, #2cb5e8 75%);
        color: white;
        opacity: 0.95;" href="index.php">Ir a Inicio</a>
                </div>
</div>
                <hr>

                <div class="container">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div clas="col-md-10" style="width:100%;">
                            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <span class="nav-link active" id="activas" data-toggle="tab"  role="tab" aria-controls="home" aria-selected="true">Activas</span>
                                </li>
                                <li class="nav-item">
                                    <span class="nav-link" id="inactivas" data-toggle="tab" role="tab" aria-controls="contact" aria-selected="false">Inactivas</span>
                                </li>
                            </ul>
                        </div>
                        <br>
                        
                        <div class="col-md-1"></div>
                    </div>
                    <br>

                    <div id="lista_publicaciones">
                        <?PHP
                        while ($publicacion = mysqli_fetch_array($r)) {
                            ?>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8 contenidoPublicacion">
                                <div class="divImagenPerfil">
                                    <img src="imagenes/im_perfil.png" alt="foto de perfil"
                                        style="width: 100%; border-radius: 50%;">
                                </div>
                                <div class="encabezadoPublicacion">
                                    <span class="tituloPublicacion">
                                        <?PHP echo $publicacion['nombre']; ?></span></br>
                                    <span class="subtituloPublicacion">
                                        <?PHP echo $publicacion['ubicacion']; ?></span></br>
                                </div>
                                <div class="divPrecio" >
                                    <div style="width:100%;">
                                        <button type="button" class="btn btn-secondary btm-sm" style="position: relative; float:right; padding:1%; margin-right:10px;">Activo</button>
                                        
                                        <button type="button" class="btn btn-secondary btm-sm" style="position: relative; float:right; padding:1%; margin-right:10px;">Inactivo</button>
                                    </div>
                                    <span class="tituloPublicacion" style="color:#4CAF50;font-size:25px;">$
                                        <?PHP echo $publicacion['precio']; ?></span> - <span
                                        class="subtituloPublicacion">
                                        <?PHP
                                            echo $publicacion['negociable']; ?>
                                    </span>
                                </div>
                                
                                <div class="imagenPublicacion">
                                    <img <?PHP echo 'src=' . $publicacion['urlImagen']; ?> alt="Publicacion"
                                    style="width: 100%">
                                </div>
                                <div class="descripcionPublicacion">
                                    <input id="idCliente" type="text" style="display:none" value=<?PHP echo
                                        $publicacion['idCliente']?>>
                                    <p>
                                        <?PHP echo $publicacion['descripcion']; ?></p>
                                </div>
                                <div class="botonesPublicacion">
                                    <span class="botonPublicacion"><i class="fas fa-star"></i> 4.5</span>
                                    <span><i class="fas fa-comment-alt"></i> Comentarios</span>
                                </div>

                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                        <br>
                        <?PHP
                        }
                        ?>
                    </div>


                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>











    <footer class="footer mt-auto py-3 fondo">
        <div class="container">
            <p>&copy; 2019 | Grupo 5 - Ingenieria de Software I | Todos los derechos reservados</p>
        </div>

    </footer>

    <script src="jquery.min.js"></script>
    <script src="funciones.js"></script>
    <script src="jquery.tmpl.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">DUEÑO DEL INMUEBLE</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                idCliente: <span type="text" id="idCliente_modal"></span>
                                <br><br>
                            </div>
                            <div class="col-6">
                                nombre: <span type="text" id="nombre"></span>
                                <br><br>
                            </div>
                            <div class="col-6">
                                apellido: <span type="text" id="apellido"></span>
                                <br><br>
                            </div>
                            <div class="col-6">
                                telefono: <span type="text" id="telefono"></span>
                                <br><br>
                            </div>
                            <div class="col-12"  style="text-align:center">
                                correo: <span type="text" id="correo"></span>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
</body>

</html>
