@extends('layouts.perfil')
@section('contenido.perfil')
          <div class="row"><div class="col"><h3>Información de la cuenta</h3></div></div>
          <div class="row"><div class="col"><b>Nombre de usuario:</b> {{$usuario->usuario}}</div></div>
          <div class="row"><div class="col"><b>Rol:</b> {{$usuario->tipo}}</div></div>
          <div class="row"><div class="col"><b>E-mail:</b> {{$usuario->email}}</div></div>
          <div class="row"><div class="col"><b>Saldo:</b> {{$usuario->saldo}}</div></div>
@endsection