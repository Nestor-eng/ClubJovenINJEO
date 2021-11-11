function loger() {
    event.preventDefault();
     console.log("Entro hasta aquí")
     correo =  document.getElementById('correo').value;
     pass = document.getElementById('pass').value;
     console.log(correo)
     console.log(pass)
    $.ajax({
            method: "POST",
            url : "https://injeo-rest-server.herokuapp.com/api/auth/login",
            data : JSON.stringify({ correo : document.getElementById('correo').value, password : document.getElementById('pass').value }), 
            contentType: "application/json",
            success : function(data){
                  console.log(data)
                  console.log("Jaló")
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