@extends('layouts.user')

@section('contenido')       
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">REGISTRO NUEVO USUARIO</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido-->
                              <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="id_usuario" class="col-md-4 col-form-label text-md-right">{{ __('CI') }}</label>
                            <div class="col-md-6">
                                <input id="id_usuario" type="text" class="form-control @error('id_usuario') is-invalid @enderror" name="id_usuario" value="{{ old('id_usuario') }}" required autocomplete="id_usuario" autofocus>

                                @error('id_usuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre_usuario" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombre_usuario" type="text" class="form-control @error('nombre_usuario') is-invalid @enderror" name="nombre_usuario" value="{{ old('nombre_usuario') }}" required autocomplete="nombre_usuario" autofocus>

                                @error('nombre_usuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido_paterno_usuario" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>
                            <div class="col-md-6">
                                <input id="apellido_paterno_usuario" type="text" class="form-control @error('apellido_paterno_usuario') is-invalid @enderror" name="apellido_paterno_usuario" value="{{ old('apellido_paterno_usuario') }}" required autocomplete="apellido_paterno_usuario" autofocus>

                                @error('apellido_paterno_usuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido_materno_usuario" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Materno') }}</label>
                            <div class="col-md-6">
                                <input id="apellido_materno_usuario" type="text" class="form-control @error('apellido_materno_usuario') is-invalid @enderror" name="apellido_materno_usuario" value="{{ old('apellido_materno_usuario') }}" required autocomplete="apellido_materno_usuario" autofocus>

                                @error('apellido_materno_usuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="celular_usuario" class="col-md-4 col-form-label text-md-right">{{ __('Nro. Celular') }}</label>
                            <div class="col-md-6">
                                <input id="celular_usuario" type="text" class="form-control @error('celular_usuario') is-invalid @enderror" name="celular_usuario" value="{{ old('celular_usuario') }}" required autocomplete="celular_usuario" autofocus>

                                @error('celular_usuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direccion_usuario" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>
                            <div class="col-md-6">
                                <input id="direccion_usuario" type="text" class="form-control @error('direccion_usuario') is-invalid @enderror" name="direccion_usuario" value="{{ old('direccion_usuario') }}" required autocomplete="direccion_usuario" autofocus>

                                @error('direccion_usuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="correo_electronico_usuario" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="correo_electronico_usuario" type="email" class="form-control @error('correo_electronico_usuario') is-invalid @enderror" name="correo_electronico_usuario" value="{{ old('correo_electronico_usuario') }}" required autocomplete="correo_electronico_usuario">

                                @error('correo_electronico_usuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="grado_instruccion_usuario" class="col-md-4 col-form-label text-md-right">{{ __('Grado Academico') }}</label>
                            <div class="col-md-6">
                                <input id="grado_instruccion_usuario" type="text" class="form-control @error('grado_instruccion_usuario') is-invalid @enderror" name="grado_instruccion_usuario" value="{{ old('grado_instruccion_usuario') }}" required autocomplete="grado_instruccion_usuario" autofocus>

                                @error('grado_instruccion_usuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="estado_usuario" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
                            <div class="col-md-6">
                                <input id="estado_usuario" type="text" class="form-control @error('estado_usuario') is-invalid @enderror" name="estado_usuario" value="{{ old('estado_usuario') }}" required autocomplete="estado_usuario" autofocus>

                                @error('estado_usuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo_usuario" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>
                            <div class="col-md-6">
                                <input id="tipo_usuario" type="text" class="form-control @error('tipo_usuario') is-invalid @enderror" name="tipo_usuario" value="{{ old('tipo_usuario') }}" required autocomplete="tipo_usuario" autofocus>

                                @error('tipo_usuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                              <!--Fin Contenido-->
                           </div>
                        </div>
                        
                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
@endsection
