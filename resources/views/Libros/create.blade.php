@extends('layouts.plantilla')
@section('titulo', 'Libros')
@section('contenido')
<div class="container">
    <div class="row d-flex justify-content-center"><div class="col-8">
    <h3>Registro Nuevo Libro</h3>
    <form method="post" action="{{route('libros.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group my-2">
            <label for="titulo"><b>Título</b></label>
            <input type="text" class="form-control @error('titulo') is-invalid @enderror" maxlength="50" name="titulo" id="titulo" required>
            @error('titulo')
            <span class="invalid feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <div class="row">
        <div class="form-group my-3 col-6">
            <label for="idAutor"><b>Autor</b></label>
            <select class="form-control" name="idAutor" id="idAutor" required>
                <option value="" selected>Listar Autores</option>
                @foreach ($autores as $item)
                <option value="{{$item->idAutor}}">{{$item->nombre}}</option>  
            @endforeach     
            </select>
        </div>
        <div class="col-6 form-check mt-5 mb-3">
            <input class="form-check-input" type="checkbox" value="true" onclick="NewAutor()" name="check" id="check">
            <label class="form-check-label" for="NewAutor">
              ¿No existe el autor?
            </label>
        </div></div>
        <div class="form-group my-3">
            <label for="descripcion"><b>Descripción</b></label>
            <textarea class="form-control @error('descripcion') is-invalid @enderror" maxlength="1000" name="descripcion" id="descripcion" required></textarea>
            @error('descripcion')
            <span class="invalid feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group my-3">
            <label for="precio"><b>Precio</b></label>
            <input type="number" class="form-control @error('precio') is-invalid @enderror" name="precio" id="precio" required>
            @error('precio')
            <span class="invalid feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group my-3">
            <label for="imagen"><b>Ruta de Portada</b> <small>(Si no tiene portada dejar en blanco)</small></label>
            <input type="text" class="form-control @error('imagen') is-invalid @enderror" maxlength="20" name="imagen" id="imagen">
            @error('imagen')
            <span class="invalid feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>

        <div id="divautor" style="display:none">
            <hr>
            <div class="form-group my-2">
                <label for="nombre"><b>Nombre del Autor</b></label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" maxlength="50" name="nombre" id="nombre">
                @error('nombre')
                <span class="invalid feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="biografia"><b>Biografía</b></label>
                <textarea class="form-control @error('biografia') is-invalid @enderror" maxlength="2000" name="biografia" id="biografia"></textarea>
                @error('biografia')
                <span class="invalid feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group my-3">
                <label for="imagenAutor"><b>Ruta de Imagen</b> <small>(Si no tiene imagen dejar en blanco)</small></label>
                <input type="text" class="form-control @error('imagen') is-invalid @enderror" maxlength="20" name="imagenAutor" id="imagenAutor">
                @error('imagenAutor')
                <span class="invalid feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Grabar</button>
    </form></div></div>
</div>

<script  type="text/javascript">
    function NewAutor() {
        var checkBox = document.getElementById("check");
        var text = document.getElementById("divautor");
        if ( checkBox.checked == true) {
            text.style.display = "block";
            document.getElementById("biografia").required = true;
            document.getElementById("nombre").required = true;
            document.getElementById("idAutor").required = false;
            document.getElementById("idAutor").disabled = true;
        } else {
            text.style.display = "none";
            document.getElementById("biografia").required = false;
            document.getElementById("nombre").required = false;
            document.getElementById("idAutor").required = true;
            document.getElementById("idAutor").disabled = false;
        }
    }
</script>
@endsection