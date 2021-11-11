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
                    
                    document.getElementById("token").value = obj.token;
                    document.getElementById("usuario_id").value = obj.usuario._id;
                    console.log(obj.token);
                    console.log(obj.usuario._id);

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
     archivo = document.getElementById('ine_url').files[0];
     console.log(archivo);

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
                    document.getElementById('registro').style.display = "none";
                    document.getElementById('titular').style.display = "none";  
                    document.getElementById('externo').style.display = "block";
                    const myJSON = JSON.stringify(data);
                    localStorage.setItem("testJSON", myJSON);
                    let text = localStorage.getItem("testJSON");
                    let obj = JSON.parse(text);
                    
                    document.getElementById("titularempresa_id").value = obj._id;
                    console.log(obj._id)
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

function registrarExterno() {
  event.preventDefault();
     nombre = document.getElementById('nombreEmpresa').value;
     rfc =  document.getElementById('rfc').value;
     direccion = document.getElementById('direccion').value;
     numero_telefonico = document.getElementById('numero_telefonicotres').value;
     usuario_id = document.getElementById('usuario_id').value;
     pagina_web = document.getElementById('pagina_web').value;
     longitud = document.getElementById('longitud').value;   
     latitud = document.getElementById('latitud').value;
     titularempresa_id = document.getElementById('titularempresa_id').value;
     tipoNegocio_id = document.getElementById('tipoNego').value;
     giro_id = document.getElementById('giro').value;
     console.log(nombre);
     console.log(rfc);
     console.log(direccion);
     console.log(numero_telefonico);
     console.log(usuario_id);
     console.log(pagina_web);
     console.log(longitud);
     console.log(latitud);
     console.log(titularempresa_id);
     console.log(tipoNegocio_id);
     console.log(giro_id);
    $.ajax({
            method: "POST",   
            url : "https://injeo-rest-server.herokuapp.com/api/externos",   
            headers: {
              'Content-Type':'application/json',
              'x-token' :  document.getElementById('token').value
              } ,        
            data : JSON.stringify({
              nombre : document.getElementById('nombreEmpresa').value,
              rfc :  document.getElementById('rfc').value,
              direccion : document.getElementById('direccion').value,
              numero_telefonico : document.getElementById('numero_telefonicotres').value,
              usuario_id : document.getElementById('usuario_id').value,
              pagina_web : document.getElementById('pagina_web').value,
              longitud : document.getElementById('longitud').value,   
              latitud : document.getElementById('latitud').value,
              titularempresa_id : document.getElementById('titularempresa_id').value,
              tipoNegocio_id : document.getElementById('tipoNego').value,
              giro_id : document.getElementById('giro').value
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
                    swal({
                      type: "success",
                      title: 'Registro con exito',
                                  
                    })
                  
                  }
                  
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
              jsonValue = jQuery.parseJSON( XMLHttpRequest.responseText );
              swal({
                type: "error",
                title: 'Error',
                text: jsonValue.errors[0].msg,             
              })
             
              
          }
    })
}



function CargarTipoNegocio(){
  
  base_url = "https://injeo-rest-server.herokuapp.com/api";

  $.ajax({
    type: "GET",
    url: base_url + '/tipo-negocios', 
    headers: {
      'Content-Type':'application/json',
      'x-token' :  document.getElementById('token').value
      },  
    dataType: "json",
    success: function(data){
     if(data){
      $("#tipoNego").empty();
      $("#tipoNego").prop("disabled",false);
      console.log(data)
      $("#tipoNego").append('<option value="0">---SELECCIONE---</option>');
      for(i=0; i<data.tipos_negocio.length; i++){
        $("#tipoNego").append('<option value='+data.tipos_negocio[i]._id+'>'+data.tipos_negocio[i].tipo+'</option>');
      }  

     }
          
    },
    error: function(data) {
      alert('error');
    }
  });
    
}


function CargarTipoGiro(){
  
  base_url = "https://injeo-rest-server.herokuapp.com/api";

  $.ajax({
    type: "GET",
    url: base_url + '/giros', 
    headers: {
      'Content-Type':'application/json',
      'x-token' :  document.getElementById('token').value
      },  
    dataType: "json",
    success: function(data){
     if(data){
      $("#giro").empty();
      $("#giro").prop("disabled",false);
      console.log(data)
      $("#giro").append('<option value="0">---SELECCIONE---</option>');
      for(i=0; i<data.giros.length; i++){
        $("#giro").append('<option value='+data.giros[i]._id+'>'+data.giros[i].giro+'</option>');
      }  

     }
          
    },
    error: function(data) {
      alert('error');
    }
  });
    
}


function getLocation() {
  if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
  } else {
      x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
document.getElementById('longitud').value = position.coords.longitude;
document.getElementById('latitud').value = position.coords.latitude;

}