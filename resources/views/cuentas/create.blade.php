<!DOCTYPE html>
<html>
<head>
  <title>Tabla con Navbar e Imagen de Fondo</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body {
      background-image: url("images/guns-n-roses-estadio-nacionaljpg.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }
  </style>
</head>
<body>

   <nav class="navbar navbar-expand-lg navbar- bg-light">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active text-black" aria-current="page" href="{{route('home.index')}}">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black" href="{{route('cuentas.index')}}">Cuentas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black" href="{{route('perfiles.index')}}">Perfiles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black" href="{{route('imagenes.create')}}">Artista</a>
          </li>
        </ul>
      </div>
  </nav>

<div class="container">
  <h1>Tabla de 3 columnas</h1>

  <table class="table table-bordered table-striped table-hover table-light">
    <thead>
      <tr>
        <th>ID</th>
        <th>Perfil</th>
        <th>Cant. Cuentas</th>
      </tr>
    </thead>
    <tbody>
      @foreach($perfiles as $perfil)
        
      <tr>
        <td class="align-middle">{{ $perfil->id }}</td>
        <td class="align-middle">{{ $perfil->nombre }}</td>
        <td class="align-middle">{{ count($perfil->cuentas) }}</td>
        
      </tr>
      @endforeach
      
    </tbody>
  </table>

</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
