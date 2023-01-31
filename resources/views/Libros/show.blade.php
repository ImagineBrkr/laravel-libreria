@extends('layouts.plantilla')
@section('titulo', $libro->titulo)
@section('contenido')
<div class="row d-flex justify-content-center">
  <div class="col-9">
    @if(Session::get('rol') == 'ADMIN')
		<div class="row mt-3"><div class="col"><a href="{{route('compra.reporte', $libro->idLibro)}}" class="btn btn-primary" target="_blank">Obtener reporte de ventas</a></div></div>
		@endif
    <div class="row">
    <div class="row my-5">
<div class="col-4"><img src="{{asset('img/'.$libro->imagen)}}" alt="{{$libro->titulo}}"  class="imagen img-fluid"></div>
<div class="col-4">
    <div class="container">
        <div class="row"><h1 class="titulo col-12 mt-4 mb-4">{{$libro->titulo}}</h1></div>
        <div class="row"><div class="tituloautor"><b><a href="{{route('autores.show', $libro->idAutor)}}" class="link-dark" style="text-decoration-line: none">{{$libro->autor}}</a></b> </div></div>
        <div class="row"><div class="descripcion">{{$libro->descripcion}}</div></div>
    </div>
    </div>
<div class="col-4">
    <div class="container">
        <div class="row"><h3 class="titulo col-12 mt-4 mb-4">Precio</h1></div>
        <div class="row"><h1 class="col-12 d-flex justify-content-center">S/{{$libro->precio}}</h1></div>
        <div class="row d-flex justify-content-center my-3">
          @if(Session::get('compra') == 'COMPRADO')
          <div class="col-12 d-flex justify-content-center"><b>Libro obtenido</b></div>
          @else
          <div class="col-3"><a href="{{route('compra', $libro->idLibro)}}" type="button" class="btn btn-primary">Comprar</a></div>  
          @if(Session::get('deseado') == 'DESEADO')
          <div class="col-12 d-flex justify-content-center"><b>En la lista de deseados</b></div>
          <div class="row"><div class="col-12"><a href="{{route('usuario.quitarDeseado', $libro->idLibro)}}"><i class="bi bi-heart"></i>Quitar de la lista de deseados</a></div></div>
          @else
          <div class="row"><div class="col-12"><a href="{{route('usuario.deseado', $libro->idLibro)}}"><i class="bi bi-heart"></i>Añadir a la lista de deseados</a></div></div>          
          @endif           
          @endif
        </div>
        @error('libro')
        <div class="row"><div class="col-12"><strong>{{$message}}</strong></div></div>  
        @enderror

    </div>
</div></div></div>
<hr>
<div class="row">
<div class="calificar col-6" style="margin-bottom: 5px">Comentarios</div><div class="col-6 d-flex justify-content-center"><b>Nota Promedio: {{$notaProm}}/5</b></div>
</div>
<div class="row mt-4">
  <div class="col-12">
    @if(count($comentario) > 0)
      @foreach ($comentario as $item)
        <div class="row">
        <div class="col-12 mx-2">
        <div class="row mx-2"><div class="col-6"><b>{{$item->apodo}} dice:</b></div><div class="col-6"><b>{{$item->nota}}/5</b></div></div>
        <div class="row mx-2 my-3"><div class="col-12 mx-1 d-block">{{$item->comentario}}</div></div>
        <hr>
        </div></div>
      @endforeach
    @else
    <div class="calificar col-12 mx-4" style="margin-bottom: 5px">Sin comentarios actualmente</div>
    <hr>
    @endif
</div>
</div>
<div class="calificar col-12 mb-2">
  <form class="form" method="post" action="{{route('comentario.store', $libro->idLibro)}}">
    @csrf
    <div class="row mt-4">
      <div class="col-12 my-3">Ingrese su comentario</div>
      <div class="input-group mb-3 col-4">
        <input type="text" class="form-control" placeholder="Apodo" name="apodo"  maxlength="50" id="apodo" required>
        @error('apodo')
<span class="invalid feedback" role="alert">
    <strong>{{$message}}</strong>
</span>
@enderror
      </div>
  <div class="col-12">
  <textarea class="form-control" id="comentario" placeholder="Comentario" name="comentario" maxlength="200" rows="4" required></textarea>
  @error('comentario')
  <span class="invalid feedback" role="alert">
      <strong>{{$message}}</strong>
  </span>
  @enderror</div>
  <div class="col-12">
  <p class="clasificacion">
    <input id="radio1" type="radio" name="estrellas" value="5"  onclick="getRating()" required><label for="radio1">★</label><input id="radio2" type="radio" name="estrellas" value="4" onclick="getRating()"><label for="radio2">★</label><input id="radio3" type="radio" name="estrellas" value="3" onclick="getRating()"><label for="radio3">★</label><input id="radio4" type="radio" name="estrellas" value="2" onclick="getRating()"><label for="radio4">★</label><input id="radio5" type="radio" name="estrellas" value="1" onclick="getRating()"><label for="radio5">★</label>
  </p>
<div style="margin-bottom: 20px;"><label id="texto" style="color:black">Sin calificar</label></div>
@error('estrellas')
<span class="invalid feedback" role="alert">
    <strong>{{$message}}</strong>
</span>
@enderror
</div>
  <div class="col-12"><button type="submit" class="btn btn-primary">Enviar</button></div>
</div>
</form>
</div>
</div>
</div></div>

<script type="text/javascript">
	function getRating() {
  let estrellas = document.querySelector('input[name=estrellas]:checked').value;
  document.getElementById("texto").innerHTML = (
    0 < estrellas ?
    estrellas + " estrella" + (1 < estrellas ? "s" : "") :
    "Sin calificar"
  );}
  </script>

@endsection