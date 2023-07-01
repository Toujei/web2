<!DOCTYPE html>
<html>
<head>
  <title>Administrador</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body {
      background-image: url('{{asset("images/images.jpg")}}');
    
      

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
                    <li><a class="dropdown-xitem text-black" href="{{ route('imagenban.index') }}">Banear</a></li>
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
    
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="bg-white shadow border rounded mt-2 mb-2">
                    <h1 class="display-3 fw-bolder"> BANEABLES!!</h1>
                </div>
                @foreach ($artistas as $artista)
                    @foreach ($artista->imagenes as $imagen)
                        
                        @if ($imagen->baneada == 0)
                            <div class="card flex-fill custom-card">
                                <img src="{{ asset('storage/' . $imagen->archivo) }}" class="card-img-top" alt="Imagen">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $imagen->titulo }}</h5>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('imagenes.ban', $imagen->id) }}" class="btn btn-dark btn mx-2">Banear imagen</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
            
            <div class="col-sm-4">
                <div class="bg-white shadow border rounded mt-2 mb-2">
                    <h1 class="display-3 fw-bolder">  BANEADAS!!!</h1>
                </div>
                @foreach ($artistas as $artista)
                    @foreach ($artista->imagenes as $imagen)
                        @if ($imagen->baneada == 1)
                            <div class="card flex-fill custom-card">
                                <div class="card flex-fill custom-card">
                                    <img src="{{ asset('storage/' . $imagen->archivo) }}" class="card-img-top" alt="Imagen">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $imagen->titulo }}</h5>
                                    </div>

                                    <form method="POST" action="{{ route('imagenban.unban', $imagen->id) }}">
                                        @method('put')
                                        @csrf
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger mx-12">Desbanear</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>   