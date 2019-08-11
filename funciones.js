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
        contrasena: document.getElementById("contrasena").value
    };
    var expresion = /^\s*$/;
    if (datos.idCliente=="" || datos.contrasena=="" || expresion.test(datos.idCliente) || expresion.test(datos.contrasena)) {
        alert("Llene los campos");
    } else {

        $.ajax({
            url: "backend_ingreso.php",
            type: "POST",
            data: datos,
            success: function (response) {
                // response = jQuery.parseJSON(response);
                if (response.conexion == false) {
                    alert("Error en la conexion");
                } else {
                    if (response.consulta == false) {
                        alert("El usuario no existe");
                    } else {
                        alert("INICIO DE SESION EXITOSO");
                    }
                }
            },
            error: function (data) {
                alert("Error interno en el servidor");
            }

        });
    }
}

/*
$('#buscar').on("click",function(){
    $('#lista_publicaciones').html("");

    var dato = {
        tipo: $('#tipo').val(),
        val_min : $('#val_min').val(),
        val_max : $('#val_max').val()
    };
    $.ajax({
        url: "backend_filtro.php",
        type: "post",
        data: dato,
        success: function(response){
            console.log(response);
            if(response.conexion==false){
                alert("Error en la conexion");
            }else{
                if(response.consulta==false){
                    alert("Error al buscar el cliente");
                }else{
                    alert("INICIO DE SESION EXITOSO");
                }
            }
        },
        error: function(data){
            alert("Error interno en el servidor");
        }
    });
    //$('#plantilla').tmpl(datos).appendTo('#l_contactos');

});*/