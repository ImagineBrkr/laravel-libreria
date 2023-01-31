@extends('layouts.plantilla')
@section('titulo', 'Libros')
@section('contenido')
  <section>
	<div class="row bodycolor">
		@if(Session::get('rol') == 'ADMIN')
		<div class="row"><div class="col-5"><a href="{{route('libros.create')}}" class="btn btn-primary">Añadir libro</a></div></div>
		@endif
		<div class="row">
		@foreach ($libros as $item)
		<div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4 pb-3">
			<div class="row" style="padding-left: 15px; padding-top: 10px;"><div class="col-12 col-sm-4 d-flex justify-content-center justify-content-sm-start">
			<a href="{{route('libros.show', $item->idLibro)}}"><img src="{{asset('img/'.$item->imagen)}}" class="imagen1 img-fluid" alt="{{$item->titulo}}"></a></div>
			<div class="col-12 col-sm-7 cuadro3 pt-2">
			<div class="titulolibro"><b><a href="{{route('libros.show', $item->idLibro)}}" class="link-dark" style="text-decoration-line: none">{{$item->titulo}}</a></b> </div>
			<div class="tituloautor"><b><a href="{{route('autores.show', $item->idAutor)}}" class="link-dark" style="text-decoration-line: none">{{$item->autor}}</a></b> </div>
			<div class="descripcion">{{$item->descripcion}}</div></div></div>
			</div>
		@endforeach
		</div>
	</div>
</section>
@endsection