function registrar() {
    event.preventDefault();
     console.log("Entro hasta aquí")
     telefono = document.getElementById('telefono').value;
     correo =  document.getElementById('correo').value;
     pass = document.getElementById('password').value;
     console.log(correo)
     console.log(pass)
    $.ajax({
            method: "POST",
            url : "https://injeo-rest-server.herokuapp.com/api/usuarios",
            data : JSON.stringify({telefono: telefono, correo : correo, password : pass, rol : "EXTERNO_ROLE" }), 
            contentType: "application/json",
            success : function(data){
                  console.log(data)
                  swal("Si se pudo")
                  console.log("Jaló")
            },
        error: function () {
           console.log("https://injeo-rest-server.herokuapp.com/api/auth/login") 
           console.log("El germa es culito")
        }
    })
}