@extends('layouts.app', [
    'namePage' => 'Register page',
    'activePage' => 'register',
    'backgroundImage' => asset('assets') . "/img/bg16.jpg",
])

@section('content')
<script src="{{ URL::to('/assets/js/login/registrar.js') }}" defer></script> 
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
            <input type="hidden" id="usuario_id">
            <input type="hidden" id="titularempresa_id">
          <!-- Empieza el primer formulario -->
            <div class="card-header " style="display:block" id="registro">
              <h4 class="card-title">{{ __('Registrarse') }}</h4>
              <div class="card-body ">
              <form method="POST">
                @csrf
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
<!--Finaliza primer formulario -->


<!--           Formulario del titular de la empresa
 -->          <div class="card-header " style="display:none" id="titular">
              <h4 class="card-title">{{ __('Titular de la Empresa') }}</h4>
              <div class="card-body ">
              <form method="POST">
                @csrf
                <div class="input-group {{ $errors->has('nombre') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre (s)') }}" type="text" name="nombre" id="nombre" onblur="this.value = this.value.toUpperCase();" required autofocus>
                  @if ($errors->has('nombre'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="input-group {{ $errors->has('apellidos') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </div>
                  </div>
                  <input class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" placeholder="{{ __('Apellidos') }}" type="text" id="apellidos" name="apellidos" onblur="this.value = this.value.toUpperCase();" required>
                 </div>
                 @if ($errors->has('apellidos'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('apellidos') }}</strong>
                    </span>
                @endif
                <div class="input-group {{ $errors->has('curp') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons business_badge"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('curp') ? ' is-invalid' : '' }}" placeholder="{{ __('CURP') }}" onblur="this.value = this.value.toUpperCase();" type="text" id="curp" name="curp" required>
                  @if ($errors->has('curp'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('curp') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="input-group {{ $errors->has('ine_url') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons media-1_camera-compact"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('ine_url') ? ' is-invalid' : '' }}" placeholder="{{ __('ine_url') }}" type="file" id="ine_url" name="ine_url" required>
                  @if ($errors->has('ine_url'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('ine_url') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="input-group {{ $errors->has('direccion') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons location_map-big"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('direccion') ? ' is-invalid' : '' }}" placeholder="{{ __('Dirección') }}" type="text" id="direccion" name="direccion" required>
                  @if ($errors->has('direccion'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('direccion') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="input-group {{ $errors->has('correo_electronico') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons ui-1_email-85"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('correo_electronico') ? ' is-invalid' : '' }}" placeholder="{{ __('Correo') }}" type="text" id="correo_electronico" name="correo_electronico" required>
                  @if ($errors->has('correo_electronico'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('correo_electronico') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="input-group {{ $errors->has('numero_telefonicodos') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons tech_mobile"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('numero_telefonicodos') ? ' is-invalid' : '' }}" placeholder="{{ __('Teléfono personal') }}" type="text" id="numero_telefonicodos" name="numero_telefonicodos" required>
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

          <!-- Finaliza segundo formulario-->



        
        
<!--           Formulario de Externo
 -->          <div class="card-header " style="display:none" id="externo">
 <h4 class="card-title">{{ __('Empresa') }}</h4>
              <div class="card-body ">
              <form method="POST">
                @csrf
                <div class="input-group {{ $errors->has('nombre') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre de la empresa') }}" type="text" name="nombreEmpresa" id="nombreEmpresa" onchange="CargarTipoNegocio(); CargarTipoGiro();getLocation();" onblur="this.value = this.value.toUpperCase();" required autofocus>
                  @if ($errors->has('nombre'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="input-group {{ $errors->has('rfc') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </div>
                  </div>
                  <input class="form-control{{ $errors->has('rfc') ? ' is-invalid' : '' }}" placeholder="{{ __('rfc') }}" type="text" id="rfc" name="rfc" onblur="this.value = this.value.toUpperCase();" required>
                 </div>
                 @if ($errors->has('rfc'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('rfc') }}</strong>
                    </span>
                @endif
                <div class="input-group {{ $errors->has('direccion') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons business_badge"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('direccion') ? ' is-invalid' : '' }}" placeholder="{{ __('Dirección') }}" onblur="this.value = this.value.toUpperCase();" type="text" id="direccion" name="direccion" required>
                  @if ($errors->has('direccion'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('direccion') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="input-group {{ $errors->has('numero_telefonicotres') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons media-1_camera-compact"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('numero_telefonicotres') ? ' is-invalid' : '' }}" placeholder="{{ __('Teléfono') }}" type="text" id="numero_telefonicotres" name="numero_telefonicotres" required>
                  @if ($errors->has('numero_telefonicotres'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('numero_telefonicotres') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="input-group {{ $errors->has('pagina_web') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons location_map-big"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('pagina_web') ? ' is-invalid' : '' }}" placeholder="{{ __('Página Web') }}" type="text" id="pagina_web" name="pagina_web" required>
                  @if ($errors->has('pagina_web'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('pagina_web') }}</strong>
                    </span>
                  @endif
                </div>   
                <div class="input-group {{ $errors->has('longitud') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons location_map-big"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('longitud') ? ' is-invalid' : '' }}" placeholder="{{ __('Longitud') }}" type="text" id="longitud" name="longitud" required readonly="true">
                  @if ($errors->has('longitud'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('longitud') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="input-group {{ $errors->has('latitud') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons location_map-big"></i>
                    </div>
                  </div>
                  <input class="form-control {{ $errors->has('latitud') ? ' is-invalid' : '' }}" placeholder="{{ __('Latitud') }}" type="text" id="latitud" name="latitud" required readonly="true">
                  @if ($errors->has('latitud'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('latitud') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="input-group {{ $errors->has('tipoNego') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons location_map-big"></i>
                    </div>
                  </div>
                  
                <select class="form-control" id="tipoNego" name="tipoNego" ></select>
                  @if ($errors->has('tipoNego'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('tipoNego') }}</strong>
                    </span>
                  @endif
                </div>
                
                <div class="input-group {{ $errors->has('giro') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="now-ui-icons location_map-big"></i>
                    </div>
                  </div>
                  
                <select class="form-control" id="giro" name="giro" ></select>
                  @if ($errors->has('giro'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('giro') }}</strong>
                    </span>
                  @endif
                </div>

                <div class="card-footer ">
                  <button type="submit" class="btn btn-primary btn-round btn-lg" onclick="registrarExterno();">{{__('Aceptar')}}</button>
                </div>
              </form>
            </div>
            
          </div>

          <!-- Finaliza Externo-->










        </div>
      </div>
    </div>
  </div>

  
<!--  <script src="{{ asset('/js/login/registrar.js') }}"></script>
 -->@endsection

@push('js')
  <script>
    $(document).ready(function() {
      demo.checkFullPageBackgroundImage();
    });
  </script>
@endpush
