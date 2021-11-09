    function registrar() {
    event.preventDefault();
     console.log("Entro hasta aquí")
     var telefono = document.getElementById('telefono').value;
     var correo =  document.getElementById('correo').value;
     var pass = document.getElementById('password').value;
     console.log(telefono)
     console.log(correo)
     console.log(pass)
     
    $.ajax({
            method: "POST",
            url : "https://injeo-rest-server.herokuapp.com/api/usuarios",
            data : JSON.stringify({numero_telefonico: document.getElementById('telefono').value, password : document.getElementById('password').value, correo : document.getElementById('correo').value,  rol : "EXTERNO_ROLE" }), 
            contentType: "application/json",
            success : function(data){
              if (data.error) {
                swal("ocurrio un error: " + data.error)
       
        return false;
    } 
                  if(data){
                    console.log(data)
                    document.getElementById('registro').style.display = "none";
                    document.getElementById('titular').style.display = "block";  
                    const myJSON = JSON.stringify(data);
                    localStorage.setItem("testJSON", myJSON);
                    let text = localStorage.getItem("testJSON");
                    let obj = JSON.parse(text);
                    console.log(obj.token)
                    document.getElementById("token").value = obj.token;
                  }
                  
            },
        error: function () {
           console.log("https://injeo-rest-server.herokuapp.com/api/usuarios") 
           console.log("El germa es culito")
        }
    })
}



function registrarTitular() {
  event.preventDefault();
     nombre = document.getElementById('nombre').value;
     apellidos =  document.getElementById('apellidos').value;
     curp = document.getElementById('curp').value;
     ine_url = window.location.origin + "/assets/img/pdf/" + document.getElementById('ine_url').files[0].name;
     direccion = document.getElementById('direccion').value;
     correo_electronico = document.getElementById('correo_electronico').value;
     numero_telefonico = document.getElementById('numero_telefonicodos').value;   
     token = document.getElementById('token').value;
     console.log(nombre);
     console.log(apellidos);
     console.log(curp);
     console.log(ine_url);
     console.log(direccion);
     console.log(correo_electronico);
     console.log(numero_telefonico);
     console.log(token);
    $.ajax({
            method: "POST",   
            url : "https://injeo-rest-server.herokuapp.com/api/titulares-empresas",   
            headers: {
              'Content-Type':'application/json',
              'x-token' :  document.getElementById('token').value
              } ,        
            data : JSON.stringify({
               nombre: document.getElementById('nombre').value,
               apellidos : document.getElementById('apellidos').value,
               curp : document.getElementById('curp').value, 
               ine_url : window.location.origin + "/assets/img/pdf/" + document.getElementById('ine_url').files[0].name,
               direccion : document.getElementById('direccion').value,
               correo_electronico : document.getElementById('correo_electronico').value,
               numero_telefonico : document.getElementById('numero_telefonicodos').value
              }), 
            contentType: "application/json",
            success : function(data){
              if (data.error) {
                swal("ocurrio un error: " + data.error)
       
        return false;
    } 
                  if(data){
                    console.log(data)
                    /* document.getElementById('registro').style.display = "none";
                    document.getElementById('titular').style.display = "block";  
                    const myJSON = JSON.stringify(data);
                    localStorage.setItem("testJSON", myJSON);
                    let text = localStorage.getItem("testJSON");
                    let obj = JSON.parse(text);
                    console.log(obj.token) */
                    swal("segundo formulario")

                  }
                  
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
              jsonValue = jQuery.parseJSON( XMLHttpRequest.responseText );
              swal({
                type: "error",
                title: 'Error',
                text: jsonValue.errors[0].msg,             
              })
              console.error(textStatus);
              console.error(errorThrown); 
              
          }
    })
}

