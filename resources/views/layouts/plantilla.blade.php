<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('titulo')</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilos.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body class="container-fluid">
		<div class="table" style="margin-bottom: 0px;">
<header></header>
<div class="row" style="border-width: 1px;	border-style: solid;">
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFCC00">
<div class="col-6"><img src="{{asset('img/logo2.png')}}" alt="Logo" class="img-fluid" style="width: 20%;"></div>    
    <div class="col-6" style="text-align: right"><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <ul class="navbar-nav" >        
        <li class="nav-item"><a class="nav-link" style="font-size: 18px;" href="{{route('inicio')}}"><b>Inicio</b></a></li>
        <li class="nav-item"><a class="nav-link" style="font-size: 18px;" href="{{route('autores.index')}}"><b>Autores</b></a></li>
        <li class="nav-item"><a class="nav-link" style="font-size: 18px;" href="{{route('libros.index')}}"><b>Libros</b></a></li>
        @if(Session::has('usuario')) 
        @php
         $idUsuario = Session::get('usuario')   
        @endphp
        <li class="nav-item"><a class="nav-link" style="font-size: 18px;" href="{{route('perfil', $idUsuario)}}"><b>Ver perfil</b></a></li>
        <li class="nav-item"><a class="nav-link" style="font-size: 18px;" href="{{route('salir')}}"><b>Salir</b></a></li>
        @else
        <li class="nav-item"><a class="nav-link" style="font-size: 18px;" href="{{route('ingreso')}}"><b>Iniciar sesión</b></a></li>
        <li class="nav-item"><a class="nav-link" style="font-size: 18px;" href="{{route('registro')}}"><b>Registrarse</b></a></li>
        @endif
	</ul>
      </div></div>
  </nav></div>
  <section class="bodycolor row">	
      @yield('contenido')

    </section>
    <footer>
        <div class="row" style="margin-bottom: 0px;">
            <div class="col" style="background-color: #97473E; color: white; text-align: right; word-spacing: 30px; padding-right: 30px;">
                <a href="https://www.facebook.com/"><img src="{{asset('img/iconFB.png')}}" alt="Facebook" class="imagenred"></a> 
        <a href="https://twitter.com/home"><img src="{{asset('img/iconTwitter.png')}}" alt="Twitter" class="imagenred"></a> 
        <a href="https://www.instagram.com/"><img src="{{asset('img/iconInstagram.png')}}" alt="Instagram" class="imagenred"></a>
            </div>
            </div></footer>
        </div>
    </body>
    </html>
