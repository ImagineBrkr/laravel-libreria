@extends('layouts.plantilla')
@section('titulo', $autor->nombre)
@section('contenido')
<h1 class="titulo col-12 mt-4 mb-4">{{$autor->nombre}}</h1>
<div class="col-12"><img src="{{asset('img/'.$autor->imagen)}}" alt="{{$autor->nombre}}" class="imagen img-fluid"></div>
<div class="texto col-12 mt-4 mb-4">{!!$autor->biografia!!}
</div>
@endsection