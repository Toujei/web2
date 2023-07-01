<!DOCTYPE html>
<html>
<head>
    <title>Subir imágenes</title>
    <!-- Agrega los enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('images/images.jpg');
            
        }

        .card-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
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
                    <li><a class="dropdown-item text-black" href="{{ route('cuentas.index') }}">Cuentas</a></li>
                    <li><a class="dropdown-item text-black" href="{{ route('imagenban.index') }}">Banear</a></li>
                  @endif
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

    <div class="container">
        <div class="card card-center">
            <div class="card-body">
                <h1 class="card-title">Editar imagen</h1>
                <form method="POST" action="{{route('imagenes.update', $imagen->id)}}">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" value="{{$imagen->titulo}}">
                    </div>
                    


                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>
        </div>
    </div>

   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
