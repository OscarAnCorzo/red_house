function registrarse(){
    var datos={
        id: document.getElementById("id").value,
        nombre: document.getElementById("nombre").value,
        apellido: document.getElementById("apellido").value,
        telefono: document.getElementById("telefono").value,
        correo: document.getElementById("correo").value,
        contrasena: document.getElementById("contrasena").value
    }
    $.ajax({
        url: "backend_registro.php",
        type: "POST",
        data: datos,
        success: function(response){
            response=jQuery.parseJSON(response);
            if(response.conexion==false){
                alert("Error en la conexion");
            }else{
                if(response.consulta==false){
                    alert("Error al insertar el cliente");
                }else{
                    alert("REGISTRO EXITOSO");
                }
            }
        },
        error: function(data){
            alert("Ocurrio un error interno en el servidor");
        }
    
    });
}


function ingresar(){
    var datos={
        id: document.getElementById("id").value,
        contrasena: document.getElementById("contrasena").value
    }

    $.ajax({
        url: "backend_ingreso.php",
        type: "POST",
        data: datos,
        success: function(response){
            response=jQuery.parseJSON(response);

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
            alert("erro");
            alert("Ocurrio un error interno en el servidor");
        }
    
    });

    return false;
}