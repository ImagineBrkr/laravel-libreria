@extends('layouts.plantilla')
@section('titulo', 'Perfil de '.$usuario->usuario)
@section('contenido')
<div class="row d-flex justify-content-center"><div class="col-8">
    <div class="row"><div class="col"><h3>Mi Cuenta</h3></div></div>
    <hr>
    <div class="row">
      <div class="col-4">
        <div class="row" style="border-style: ridge;">
          <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('perfil', $usuario->idUsuario)}}">Información</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('perfil.compras', $usuario->idUsuario)}}">Mis compras</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('perfil.deseados', $usuario->idUsuario)}}">Mi lista de deseos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('perfil.saldo', $usuario->idUsuario)}}">Agregar saldo</a>
              </li>
            </ul>
          </div>
      </div>
      <div class="col-8">
        @yield('contenido.perfil')
      </div>        
</div></div>
@endsection