@extends('layouts.app', [
    'namePage' => 'Register page',
    'activePage' => 'register',
    'backgroundImage' => asset('assets') . "/img/bg16.jpg",
])

@section('content')

  <div class="content">
    <div class="container">
      <div class="row">


        <div class="col-md-5 ml-auto">
          <div class="info-area info-horizontal mt-5">
            <div class="description">
              <h1 class="info-title">{{ __('Empresas') }}</h1>
            </div>
          </div>
        </div>


        <div class="col-md-4 mr-auto">
          <div class="card card-signup text-center">
            <input type="hidden" id="token">
            <div class="card-header " style="display:block" id="registro">
              <h4 class="card-title">{{ __('Registrarse') }}</h4>
              <div class="card-body ">
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <!--Begin input name -->
                <div class="input-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('telefono') ? ' is-invalid' : '' }}" placeholder="{{ __('Teléfono') }}" type="text" name="telefono" id="telefono" value="{{ old('telefono') }}" required autofocus>
                  @if ($errors->has('telefono'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('telefono') }}</strong>
                    </span>
                  @endif
                </div>
                <!--Begin input email -->
                <div class="input-group {{ $errors->has('correo') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons ui-1_email-85"></i>
                    </div>
                  </div>
                  <input class="form-control{{ $errors->has('correo') ? ' is-invalid' : '' }}" placeholder="{{ __('Correo') }}" type="email" id="correo" name="correo" required>
                 </div>
                 @if ($errors->has('correo'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('correo') }}</strong>
                    </span>
                @endif
                <!--Begin input user type-->
                
                <!--Begin input password -->
                <div class="input-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons objects_key-25"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" id="password" name="password" required>
                  @if ($errors->has('password'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-check text-left">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox">
                    <span class="form-check-sign"></span>
                    {{ __('I agree to the') }}
                    <a href="#something">{{ __('terms and conditions') }}</a>.
                  </label>
                </div>
                <div class="card-footer ">
                  <button type="submit" class="btn btn-primary btn-round btn-lg" onclick="registrar();">{{__('Aceptar')}}</button>
                </div>
              </form>
            </div>
          </div>




          <div class="card-header " style="display:none" id="titular">
              <h4 class="card-title">{{ __('Titular de la Empresa') }}</h4>
              <div class="card-body ">
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <!--Begin input name -->
                <div class="input-group {{ $errors->has('nombre') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('nombre') }}" type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required autofocus>
                  @if ($errors->has('nombre'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                  @endif
                </div>
                <!--Begin input email -->
                <div class="input-group {{ $errors->has('apellidos') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons ui-1_email-85"></i>
                    </div>
                  </div>
                  <input class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" placeholder="{{ __('apellidos') }}" type="text" id="apellidos" name="apellidos" required>
                 </div>
                 @if ($errors->has('apellidos'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('apellidos') }}</strong>
                    </span>
                @endif
                <!--Begin input user type-->
                
                <!--Begin input password -->
                <div class="input-group {{ $errors->has('curp') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons objects_key-25"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('curp') ? ' is-invalid' : '' }}" placeholder="{{ __('curp') }}" type="text" id="curp" name="curp" required>
                  @if ($errors->has('curp'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('curp') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="input-group {{ $errors->has('ine_url') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons objects_key-25"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('ine_url') ? ' is-invalid' : '' }}" placeholder="{{ __('ine_url') }}" type="text" id="ine_url" name="ine_url" required>
                  @if ($errors->has('ine_url'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('ine_url') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="input-group {{ $errors->has('direccion') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons objects_key-25"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('direccion') ? ' is-invalid' : '' }}" placeholder="{{ __('direccion') }}" type="text" id="direccion" name="direccion" required>
                  @if ($errors->has('direccion'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('direccion') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="input-group {{ $errors->has('correo_electronico') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons objects_key-25"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('correo_electronico') ? ' is-invalid' : '' }}" placeholder="{{ __('correo_electronico') }}" type="text" id="correo_electronico" name="correo_electronico" required>
                  @if ($errors->has('correo_electronico'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('correo_electronico') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="input-group {{ $errors->has('numero_telefonicodos') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons objects_key-25"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('numero_telefonicodos') ? ' is-invalid' : '' }}" placeholder="{{ __('numero_telefonicodos') }}" type="text" id="numero_telefonicodos" name="numero_telefonicodos" required>
                  @if ($errors->has('numero_telefonicodos'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('numero_telefonicodos') }}</strong>
                    </span>
                  @endif
                </div>
                
                <div class="card-footer ">
                  <button type="submit" class="btn btn-primary btn-round btn-lg" onclick="registrarTitular();">{{__('Aceptar')}}</button>
                </div>
              </form>
            </div>
          </div>






        </div>
      </div>
    </div>
  </div>
  <script>
    var token = "";
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
     console.log("Entro hasta aquí")
     var nombre = document.getElementById('nombre').value;
     var apellidos =  document.getElementById('apellidos').value;
     var curp = document.getElementById('curp').value;
     var ine_url = document.getElementById('ine_url').value;
     var direccion = document.getElementById('direccion').value;
     var correo_electronico = document.getElementById('correo_electronico').value;
     var numero_telefonico = document.getElementById('numero_telefonicodos').value;

     
     var token = document.getElementById('token').value;
     console.log(telefono)
     console.log(correo)
     console.log(pass)
     console.log(token)
    $.ajax({
            method: "POST",
            url : "https://injeo-rest-server.herokuapp.com/api/titulares-empresas",
            headers: {
            'Content-Type':'application/json',
            'x-token' :  token
            },
            data : JSON.stringify({
               nombre: document.getElementById('nombre').value,
               apellidos : document.getElementById('apellidos').value,
               curp : document.getElementById('curp').value, 
               ine_url : document.getElementById('ine_url').value,
               direccion : document.getElementById('direccion').value,
               correo_electronico : document.getElementById('correo_electronico').value,
               numero_telefonico : document.getElementById('numero_telefonico').value
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
        error: function () {
           console.log("https://injeo-rest-server.herokuapp.com/api/usuarios") 
           console.log("El germa es culito")
        }
    })
}











    </script>
<!--   <script src="{{ URL::to('/js/Login/registrar.js') }}" defer></script> 
 -->@endsection

@push('js')
  <script>
    $(document).ready(function() {
      demo.checkFullPageBackgroundImage();
    });
  </script>
@endpush
