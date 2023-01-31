@extends('layouts.perfil')
@section('contenido.perfil')
          <div class="row"><div class="col"><h3>Libros comprados:</h3></div></div>
          
          <div class="row mx-2">
            @if(count($compras) > 0)
            @foreach ($compras as $item)
            <div class="col-6">
              <div class="row mt-2"><div class="col d-flex justify-content-center"><b>{{$item->titulo}}</b></div></div>
              <div class="row"><div class="col d-flex justify-content-center"><a href="{{route('libros.show', $item->idLibro)}}"><img src="{{asset('img/'.$item->imagen)}}" class="imagen1 img-fluid" alt="{{$item->titulo}}"></a></div></div>
            </div>
            @endforeach
             @else
                 <B>Sin libros comprados</B>
             @endif 
        </div>
@endsection