<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Compras</title>
</head>
<body>
    <div class="row d-flex justify-content-center"><div class="col-8">
        <div class="row d-flex justify-content-center">Libro</div>
        <div class="row">
            <div class="col-6">
        <div class="row mx-2"><div class="col"><b>Id:</b> {{$libro->idLibro}}</div></div>
        <div class="row mx-2"><div class="col"><b>Título:</b> {{$libro->titulo}}</div></div>  
        <div class="row mx-2"><div class="col"><b>Autor:</b> {{$libro->autor}}</div></div> 
        <div class="row mx-2"><div class="col"><b>Precio:</b> {{$libro->precio}}</div></div> 
    </div>
    </div>      
        <table class="table my-2">
            <thead>
              <tr>
                <th scope="col-2" class="text-center">IdCompra</th>
                <th scope="col-6">Usuario</th>
                <th scope="col-4" class="text-center">Fecha</th>
              </tr>
            </thead>
            <tbody> 
                @if(count($compras) > 0)
                @foreach ($compras as $item)
                <tr>
                    <td class="text-center">{{$item->idCompra}}</td>
                    <td>{{$item->usuario}}</td>
                    <td class="text-center">{{$item->fechaCompra}}</td>
                  </tr>
                @endforeach
                @else
                <tr><td colspan="3">No hay compras</td></tr>
                @endif
            </tbody>
          </table>
        </div></div>
</body>
</html>