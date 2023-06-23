<!DOCTYPE html>
<html>
<head>
  <title>Tabla con Navbar e Imagen de Fondo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <a class="navbar-brand" href="#">Mi Sitio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Acerca</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contacto</a>
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
        {{-- <td class="align-middle">{{ count($perfil->cuentas) }}</td> --}}
      </tr>
      @endforeach
      <!-- Puedes agregar más filas según sea necesario -->
    </tbody>
  </table>

</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
