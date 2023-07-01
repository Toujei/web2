<!DOCTYPE html>
<html lang="es">

<style>
  body {
    background: url('{{asset("images/Explora-las-obras-de-arte-de-tus-pintores-favoritos-en-WikiArt.jpg")}}') no-repeat center center fixed;
    background-size: cover;
  }
</style>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  

  <title>Fotografias</title>
</head>
<body>
  <div class="container-fluid px-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        @if(auth()->check())
            <span class="navbar-text">Usuario: {{ Auth::user()->user }}</span>
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active text-black" aria-current="page" href="{{ route('home.index') }}">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-black" href="{{ route('imagenes.index') }}">Fotos</a>
            </li>
            @if(Gate::allows('listado'))
            <li class="nav-item">
              <a class="nav-link text-black" href="{{ route('perfiles.index') }}">Perfiles</a>
            </li>
            @endif
            @if(auth()->check())
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Cuenta
                </a>
                <ul class="dropdown-menu dropdown-menu-danger bg-light">
                  <li><a class="dropdown-item text-black" href="{{ route('imagenes.create') }}">Tus fotos</a></li>
                  @if(Gate::allows('listado'))
                    <li><a class="dropdown-item text-black" href="{{ route('cuentas.create') }}">Crear cuentas</a></li>
                    <li><a class="dropdown-item text-black" href="{{ route('imagenban.index') }}">Banear</a></li>
                  @endif
                    <li><a class="dropdown-item text-black" href="{{ route('cuentas.index') }}">Cuentas</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item text-black" href="{{ route('cuentas.logout') }}">Cerrar sesion</a></li>
                </ul>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
  </div>


  <section class="py-5">
    <div class="container">
      
      <div class="row">
        <div class="col-md-6">
          <div class="card mb-6">
            <div class="card-body">
              <h5 class="card-title">Fotografias</h5>
              <p class="card-text">Aqui podras ver todas las fotografias de tus artistas favoritos :).</p>
              <a href="{{route('imagenes.index')}}" class="btn btn-dark">Ver Fotografias</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card mb-6">
            <div class="card-body">
              <h5 class="card-title">Cuentas</h5>
              <p class="card-text">Ya tienes cuenta o quieres crearte una?, click en Ver cuenta para acceder.</p>
              <a href="{{route('cuentas.create')}}" class="btn btn-dark">Ver Cuenta

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

</script>

</body>
