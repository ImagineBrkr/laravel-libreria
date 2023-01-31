@extends('layouts.plantilla')
@section('titulo', 'Ingreso')
@section('contenido')
<div class="row bodycolor py-3 d-flex justify-content-center">
    <div class="col-12 col-sm-10 col-lg-6">
    <form class="form" action="{{route('ingresar')}}" method="POST">
        @csrf
      <div class="form-group row my-2">
        <label for="usuario" class="col-12 col-sm-2 col-form-label"><b>Usuario</b></label>
        <div class="col-12 col-sm-10"><input type="text" name="usuario" id="usuario" placeholder="Usuario" class="form-control"  maxlength="25" required></div>
      </div>
      @error('usuario')
      <div class="row">
          <strong style="color:red;">{{$message}}</strong>
      </div>
      @enderror
      <div class="form-group row my-2">
        <label for="contraseña" class="col-12 col-sm-2 col-form-label mb-2"><b>Contraseña</b></label>
        <div class="col-12 col-sm-10"><input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" class="form-control"  maxlength="25" required></div>
      </div>  
      @error('contraseña')
      <div class="row">
          <strong style="color:red;">{{$message}}</strong>
      </div>
      @enderror      
      <div class="row my-2">
      <span>¿No tienes cuenta?</span><a href="{{route('registro')}}">Regístrate</a>
    </div>
    <div class="row justify-content-center my-2">
      <div class="col-3 d-flex justify-content-center"><button type="submit" class="btn btn-primary">Enviar</button></div>
    </div>
    </form></div>  
  </div>
@endsection