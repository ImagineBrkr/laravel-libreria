@extends('layouts.perfil')
@section('contenido.perfil')
<form class="form" action="{{route('perfil.agregarSaldo', $usuario->idUsuario)}}" method="POST">
    @csrf
    <div class="row"><div class="col-6 mt-4"><b>Saldo actual:</b> {{$usuario->saldo}}</div>
    <div class="col-6 form-group">
        <label for="saldo" class="col-form-label"><b>Saldo a agregar</b></label>
        <div><input type="number" name="saldo" id="saldo" placeholder="Saldo" class="form-control" required></div>
        @error('saldo')
        <div class="my-2"><strong>{{$message}}</strong></div>
        @enderror
        <div class="mt-1 d-flex justify-content-center"><button type="submit" class="btn btn-primary">Agregar</button></div>
    </div>
</div>
</form>
@endsection