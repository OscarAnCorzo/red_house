<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    session_start();
    include("funciones.php");
    $conexion = conectar();
    $sql = "select * from publicacion limit 3";

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
                                        <span class="tituloPublicacion" style="color:#4CAF50;font-size:25px;">$${precio}</span> - <span class="subtituloPublicacion">
                                        
                                        ${negociable}
                                        </span>
                                    </div>
                                    <div class="imagenPublicacion">
                                        <img src=${urlImagen} alt="Publicacion" style="width: 100%">
                                    </div>
                                    <div class="descripcionPublicacion">
                                        <p>${descripcion} &nbsp <button type="button" class="btn btn-primary"style="padding-top:1%;">Ver mas...</button></p>
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

    <title>Inicio</title>
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
                <div class="jumbotron banner col-md-12">
                    <div class="e" class="container">
                        <h1 class="display-3 texto-banner">Tenemos los mejores inmuebles para ti</h1>
                        <p class="texto-banner">Prestamos los servicios de Arriendos, para la comunidad universitaria de
                            la UIS, además brindamos Asesoría Inmobiliaria y facilitamos la comunicación con los ofertantes. </p>
                    </div>
                </div>

                <hr>

                <div class="container">
                    <h4 class="row col-md-8 fondo"> Buscar por:</h4>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <label> Tipo de inmueble </label>
                            <select id="tipo" class="form-control">
                                <option>Cualquiera</option>
                                <option value="apartamento">Apartamento</option>
                                <option value="habitacion">Habitación</option>
                            </select>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <label> Valor minimo </label>
                            <input id="val_min" type="number" name="val_min" class="form-control">
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <label> Valor maximo</label>
                            <input id="val_max" type="number" name="val_max" class="form-control">
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                        <?PHP
                            if($sesion == TRUE) echo'<div class="btn btn-success botonDetalles btn-block" role="button" id="buscar">Buscar</div>';
                            else echo'<div class="btn btn-success botonDetalles btn-block disabled" role="button" id="buscar">Buscar</div>';
                        ?>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <br>
                    <hr>

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
                                <div class="divPrecio">
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
                                        <?PHP echo $publicacion['descripcion']; ?> &nbsp <button
                                            onclick="ver_perfil_cliente(this)" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-primary"
                                            style="padding-top:1%;">Ver Contacto</button></p>
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