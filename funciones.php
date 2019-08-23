<?PHP
	function conectar(){
        if (!($conn = @mysqli_connect("localhost", "root", "", "redhouse", "3306")))
        {

            echo "Error conectando a la base de datos.";

            exit();
        }

        return $conn;
    }

	function encabezado(){
		if(isset($_SESSION['correo'])){
            encabezadoCliente();
		}else encabezado0();
	}

	function encabezado0(){
		echo '<nav class="navbar navbar-expand-lg navbar-light bg-light col-md-12" style="background:#4CAF50 !important">
        <a class="navbar-brand" href="#" style="color:white">RED HOUSE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown" >
            <ul class="navbar-nav" >
                <li class="nav-item active" >
                    <a class="nav-link letra_enca" href="index.php" >Inicio<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
        <ul class="nav justify-content-end" >
            <li class="nav-item">
                <a class="nav-link active letra_enca" href="ingreso.php">Iniciar Sesión</a>
            </li>
        </ul>
    </nav>';
	}

	function encabezadoCliente(){
		echo '<nav class="navbar navbar-expand-lg navbar-light bg-light col-md-12" style="background:#4CAF50 !important">
        <a class="navbar-brand" style="color:white" href="#">RED HOUSE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown" >
            <ul class="navbar-nav" >
                <li class="nav-item active" >
                    <a class="nav-link letra_enca" href="index.php" >Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link letra_enca" href="misPublicaciones.php">Mis Publicaciones</a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link letra_enca" href="publicar_oferta.php">Publicar</a>
                </li>
            </ul>
        </div>
        <ul class="nav justify-content-end" >
            <li class="nav-item">
                <a class="nav-link active letra_enca" href="cerrar_sesion.php">Salir</a>
            </li>
        </ul>
    </nav>';
	}

	// function encabezadoAdmin(){
	// 	echo '<nav class="navbar navbar-expand-lg navbar-light bg-light col-md-12" style="background:#4CAF50 !important">
    //     <a class="navbar-brand" href="#" style="color:WHITE">RED HOUSE</a>
    //     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    //         <span class="navbar-toggler-icon"></span>
    //     </button>
    //     <div class="collapse navbar-collapse" id="navbarNavDropdown" >
    //         <ul class="navbar-nav" >
    //             <li class="nav-item active" >
    //                 <a class="nav-link letra_enca" href="#" >Inicio<span class="sr-only">(current)</span></a>
    //             </li>
    //             <li class="nav-item active ">
    //                 <a class="nav-link letra_enca" href="miPublicacion.php">Publicaciones</a>
    //             </li>
    //             <li class="nav-item active ">
    //                 <a class="nav-link letra_enca" href="#">Estadisticas</a>
    //             </li>
    //         </ul>
    //     </div>
    //     <ul class="nav justify-content-end" >
    //         <li class="nav-item">
    //             <a class="nav-link active letra_enca" href="#">salir</a>
    //         </li>
    //     </ul>
    // </nav>';
	// }
?>