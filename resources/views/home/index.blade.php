<!DOCTYPE html>
<html lang="es">

<style>
  body {
    background: url('images/conciertos-fiestas-pilar-2022-zaragoza-donde-comprar-entradas_98.jpg') no-repeat center center fixed;
    background-size: cover;
  }
</style>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <title>Tu Sitio Web - Home</title>
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


  

  <header class="text-black text-center py-5">
    <div class="container">
      <h1 class="display-4 txt">Bienvenido a tu Sitio Web</h1>
      <p class="lead">Aquí puedes agregar un eslogan o una breve descripción de tu sitio.</p>
      <a href="#" class="btn btn-dark btn-lg">¡Empecemos!</a>
    </div>
  </header>

  <section class="py-5">
    <div class="container">
      
      <div class="row">
        <div class="col-md-6">
          <div class="card mb-6">
            <img src="imagen-servicio-1.jpg" class="card-img-top" alt="Imagen del Servicio 1">
            <div class="card-body">
              <h5 class="card-title">Fotografias</h5>
              <p class="card-text">Aqui podras ver todas las fotografias de tus artistas favoritos :).</p>
              <a href="{{route('imagenes.index')}}" class="btn btn-dark">Ver Fotografias</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card mb-6">
            <img src="imagen-servicio-2.jpg" class="card-img-top" alt="Imagen del Servicio 2">
            <div class="card-body">
              <h5 class="card-title">Cuentas</h5>
              <p class="card-text">Ya tienes cuenta o quieres crearte una?, click en Ver cuenta para acceder.</p>
              <a href="#" class="btn btn-dark">Ver Cuenta

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
