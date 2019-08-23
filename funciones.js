function registrarse() {
    var datos = {
        id: document.getElementById("id").value,
        nombre: document.getElementById("nombre").value,
        apellido: document.getElementById("apellido").value,
        telefono: document.getElementById("telefono").value,
        correo: document.getElementById("correo").value,
        contrasena: document.getElementById("contrasena").value
    };
    $.ajax({
        url: "backend_registro.php",
        type: "POST",
        data: datos,
        success: function (response) {
            response = jQuery.parseJSON(response);
            if (response.conexion == false) {
                alert("Error en la conexion");
            } else {
                if (response.consulta == false) {
                    alert("Error al insertar el cliente");
                } else {
                    alert("REGISTRO EXITOSO");
                }
            }
        },
        error: function (data) {
            console.log(data);
        }

    });
}


function ingresar() {
    var datos = {
        idCliente: document.getElementById("idCliente").value,
        contrasena: hex_md5(document.getElementById("contrasena").value)
    };
    var expresion = /^\s*$/;
    if (datos.idCliente == "" || datos.contrasena == "" || expresion.test(datos.idCliente) || expresion.test(datos.contrasena)) {
        alert("Llene los campos");
    } else {

        $.ajax({
            url: "backend_ingreso.php",
            type: "POST",
            data: datos,
            success: function (response) {
                // response = jQuery.parseJSON(response);
                if (typeof  response.conexion != "undefined" && typeof response.consulta != "undefined") {
                    if (response.conexion == false) {
                        alert("Error en la conexion");
                    } else {
                        if (response.consulta == false) {
                            alert("El usuario no existe");
                        } else {
                            location.href = "index.php";
                        }
                    }
                }else{
                    alert("Error del lado del servidor");
                }
            },
            error: function (data) {
                alert("Error interno en el servidor");
            }

        });
    }
}


$('#buscar').on("click", function () {
    $('#lista_publicaciones').html("");

    var dato = {
        tipo: $('#tipo').val(),
        val_min: $('#val_min').val(),
        val_max: $('#val_max').val()
    };
    $.ajax({
        url: "backend_filtro.php",
        type: "post",
        data: dato,
        success: function (response) {
            console.log(response);
            for (var i = 0; i < Object.keys(response.publicaciones).length; i++) {
                $('#plantilla').tmpl(response.publicaciones[i]).appendTo('#lista_publicaciones');
            }
        },
        error: function (data) {
            alert("Error interno en el servidor");
        }
    });


});

function publicar_oferta() {
   
    var datos = new FormData();
    datos.append("nombre",document.getElementById("nombre").value);
    datos.append("ubicacion",document.getElementById("ubicacion").value);
    datos.append("precio",document.getElementById("precio").value);
    datos.append("descripcion",document.getElementById("descripcion").value);
    datos.append("estado",document.getElementById("estado").value);
    datos.append("negociable",document.getElementById("negociable").value);
    datos.append("tipoInmueble",document.getElementById("tipoInmueble").value);
    datos.append("imagen",document.getElementById("urlImagen").files[0]);

    // var datos = {
    //     nombre: document.getElementById("nombre").value,
    //     ubicacion: document.getElementById("ubicacion").value,
    //     precio: document.getElementById("precio").value,
    //     descripcion: document.getElementById("descripcion").value,
    //     estado: document.getElementById("estado").value,
    //     negociable: document.getElementById("negociable").value,
    //     tipoInmueble: document.getElementById("tipoInmueble").value,
    //     urlImagen: document.getElementById("urlImagen").value
    // };
    var expresion = /^\s*$/;
    if (datos.nombre == "" || datos.ubicacion == "" || datos.precio == "" || datos.descripcion == "" || datos.estado == "" || datos.negociable == "" || datos.tipoInmueble == "" || datos.urlImagen == ""
        || expresion.test(datos.nombre) || expresion.test(datos.ubicacion) || expresion.test(datos.precio) || expresion.test(datos.descripcion) || expresion.test(datos.estado) || expresion.test(datos.negociable) || expresion.test(datos.tipoInmueble) || expresion.test(datos.urlImagen)) {
        alert("Llene los campos");
    } else {

        $.ajax({
            url: "backend_publicar_oferta.php",
            type: "POST",
            data: datos,
            processData: false,
            contentType: false,
            success: function (response) {

                // response = jQuery.parseJSON(response);
                if (typeof  response.conexion != "undefined" && typeof response.consulta != "undefined") {
                    if (response.conexion == false) {
                        alert("Error en la conexion");
                    } else {
                        if (response.consulta == false) {
                            alert("Error, es posible que hallas excedido el limite de publicaciones activas");
                        } else {
                            alert("Publicacion creada exitosamente");
                        }
                    }
                } else {
                    alert("Error del lado del servidor");

                }
            },
            error: function (data) {
                console.log(data);
                alert("Error interno en el servidor");
            }

        });
    }
}



function ver_perfil_cliente(e) {
    var datos = {
        idCliente: $(e).parent().parent().find("#idCliente").val()
    };
    $.ajax({
        url: "backend_ver_perfil.php",
        type: "POST",
        data: datos,
        success: function (response) {
            // response = jQuery.parseJSON(response);
            if (response.conexion && response.consulta) {
                if (response.conexion == false) {
                    alert("Error en la conexion");
                } else {
                    if (response.consulta == false) {
                        alert("Error, el cliente no existe");
                    } else {
                        document.getElementById("idCliente_modal").innerHTML=response.cliente.idCliente;
                        document.getElementById("nombre").innerHTML=response.cliente.nombre;
                        document.getElementById("apellido").innerHTML=response.cliente.apellido;
                        document.getElementById("telefono").innerHTML=response.cliente.telefono;
                        document.getElementById("correo").innerHTML=response.cliente.correo;
                        
                    }
                }
            } else {
                alert("Error del lado del servidor");

            }
        },
        error: function (data) {
            alert("Error interno en el servidor");
        }

    });
}

$('#activas').on("click", function () {
    $('#lista_publicaciones').html("");
    console.log('activas');
    var dato = {
        operacion: 'activas'
    };
    $.ajax({
        url: "backend_mis_publicaciones.php",
        type: "post",
        data: dato,
        success: function (response) {
            console.log(response);
            for (var i = 0; i < Object.keys(response.publicaciones).length; i++) {
                $('#plantilla').tmpl(response.publicaciones[i]).appendTo('#lista_publicaciones');
            }
        },
        error: function (data) {
            alert("Error interno en el servidor");
        }
    });


});

$('#inactivas').on("click", function () {
    $('#lista_publicaciones').html("");
    console.log('activas');
    var dato = {
        operacion: 'inactivas'
    };
    $.ajax({
        url: "backend_mis_publicaciones.php",
        type: "post",
        data: dato,
        success: function (response) {
            console.log(response);
            for (var i = 0; i < Object.keys(response.publicaciones).length; i++) {
                $('#plantilla').tmpl(response.publicaciones[i]).appendTo('#lista_publicaciones');
            }
        },
        error: function (data) {
            alert("Error interno en el servidor");
        }
    });
});