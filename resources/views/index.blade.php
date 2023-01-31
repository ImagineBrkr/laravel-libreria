@extends('layouts.plantilla')
@section('titulo', 'Inicio')
@section('contenido')
	<div class="row bodycolor">
		<div class="row">
<section style="display:flex"><div class="col-6 col-md-7" style="font-size: 24px; font-family: Arial; margin:10px; display:flex; padding-top: 100px; padding-left: 50px; padding-bottom: 100px;"><h1>Tu biblioteca virtual para leer cuando quieras</h1></div>
		<div class="col-6 col-md-4" style="padding-top: 50px; padding-bottom: 50px"><img src="img/leer.jpg" alt="Imagen" style="width:500px;" class="img-fluid pt-4 pt-md-0"></div>
</section>
</div>

<section>
	<hr>
	<div class="row">
		<div class="col">
		<h1 class="titulo" style="text-align: left;">Recomendaciones</h1>
		<div style="word-spacing: 37px; margin-left: 10px; padding-bottom: 20px; padding-top: 20px">
		<a href="{{route('libros.show', '5')}}"><img src="img/libro1.jpg" class="imagen1" alt="El guardián entre el centeno"></a>
		<a href="{{route('libros.show', '9')}}"><img src="img/libro2.jpg" class="imagen1" alt="Narraciones Extraordinarias"></a>
		<a href="{{route('libros.show', '2')}}"><img src="img/libro3.jpg" class="imagen1" alt="Crimen y castigo"></a>
		<a href="{{route('libros.show', '7')}}"><img src="img/libro4.jpg" class="imagen1" alt="El tambor de hojalata"></a> 
		<a href="{{route('libros.show', '6')}}"><img src="img/libro5.jpg" class="imagen1" alt="El mundo es ancho y ajeno"></a>
	</div>
</section>
</div>
@endsection