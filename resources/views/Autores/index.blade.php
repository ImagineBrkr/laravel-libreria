@extends('layouts.plantilla')
@section('titulo', 'Autores')
@section('contenido')
<div class="row d-flex justify-content-center">
	@foreach ($autores as $item)
	<div class="col-12 col-sm-6 col-md-4">
		<div class="row"><div class="col-12 d-flex justify-content-center">
			<a href="{{route('autores.show', $item->idAutor)}}"><img src="{{asset('img/'.$item->imagen)}}" class="imagen1" alt="{{$item->nombre}}"></a></div>
		<div class="col-12 d-flex justify-content-center"><a href="{{route('autores.show', $item->idAutor)}}" class="link-dark" style="text-decoration-line: none"><b>{{$item->nombre}}</b></a></div></div></div>
	@endforeach
</div>
@endsection