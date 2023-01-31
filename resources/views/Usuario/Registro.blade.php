@extends('layouts.plantilla')
@section('titulo', 'Ingreso')
@section('contenido')
<div class="row bodycolor py-3 d-flex justify-content-center">
    <div class="col-12 col-sm-10 col-lg-6">
    <form class="form" action="{{route('registrar')}}" method="POST">
        @csrf
      <div class="form-group row my-2">
        <label for="usuario" class="col-12 col-sm-2 col-form-label"><b>Usuario</b></label>
        <div class="col-12 col-sm-10"><input type="text" name="usuario" id="usuario" placeholder="Nombre de usuario" class="form-control"  maxlength="25" required></div>
      </div>
      <div class="form-group row my-2">
        <label for="email" class="col-12 col-sm-2 col-form-label mb-2"><b>E-mail</b></label>
        <div class="col-12 col-sm-10"><input type="email" id="email" name="email" placeholder="E-mail" class="form-control"  maxlength="50" required></div>
      </div>
      <div class="form-group row my-2">
        <label for="contraseña" class="col-12 col-sm-2 col-form-label mb-2"><b>Contraseña</b></label>
        <div class="col-12 col-sm-10"><input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" class="form-control"  maxlength="25" required></div>
      </div>        
      <div class="row my-2 form-check">
       <div class=col-1><input type="checkbox" class="form-check-input" id="Terminos" required></div>
      <label class="form-check-label" for="Terminos">Acepto los términos</label>
    </div>
    <div class="row justify-content-center my-2">
      <div class="col-3 d-flex justify-content-center"><button type="submit" class="btn btn-primary">Enviar</button></div><div class="col-3 d-flex justify-content-center"><button type="reset" class="btn btn-primary">Limpiar</button></div>      
    </div>
    </form></div>  
  </div>
@endsection