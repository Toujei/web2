<!DOCTYPE html>
<html>
<head>
    <title>Artista</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('{{asset("images/istockphoto-1183183791-612x612.jpg")}}');

            background-position: center;
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
            <li class="nav-item">
              <a class="nav-link text-black" href="{{ route('perfiles.index') }}">Perfiles</a>
            </li>
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

    <div class="row">
        <div class="card col-3 mx-5">

            <div class="card-body">
                <h1 class="card-title">Sube tu imagen</h1>
                <form method="POST" action="{{route('imagenes.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="titulo" class="form-label">titulo</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" value="{{old('titulo')}}">
                    </div>

                    <div class="form-group">
                        <label for="imagen">Selecciona una imagen:</label>
                        <input type="file" class="form-control-file" id="imagen" name="imagen">
                    </div>

                    <button type="submit" class="btn btn-dark mt-3">Subir</button>
                </form>
                
           </div>
        </div>

        <div class="bg-white col-3 mx-5">
          <div class="bg-white">
              <h3>Tus Fotos</h3>
          </div>
            @foreach($artistas as $artista)       
              @if(Auth::user()->user == $artista->user)
                @foreach($artista->imagenes as $imagen)
                    @if($imagen->baneada == 0)
                        <div class="col d-flex">
                            <div class="card flex-fill custom-card">
                                <img src="{{ asset('storage/' . $imagen->archivo) }}" class="card-img-top" alt="Imagen">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $imagen->titulo }}</h5>
                                </div>

                                <form method="POST" action="{{ route('imagenes.destroy', $imagen->id) }}">
                                    @method('delete')
                                    @csrf
                                    <div class="footer">
                                        <button type="submit" class="btn btn-danger mx-2">Borrar imagen</button>
                                        <a href="{{ route('imagenes.edit', $imagen->id) }}" class="btn btn-dark btn mx-2">Editar imagen</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
              @endif
            @endforeach

        </div>
      
      <div class="bg-white col-3 mx-5">
          <div class="bg-white">
              <h3>Tus Fotos Baneadas</h3>
          </div>
          @foreach($artistas as $artista)       
            @if(Auth::user()->user == $artista->user)
              @foreach($artista->imagenes as $imagen)
                  @if($imagen->baneada == 1)
                      <div class="col d-flex">
                          <div class="card flex-fill custom-card">
                              <img src="{{ asset('storage/' . $imagen->archivo) }}" class="card-img-top" alt="Imagen">
                              <div class="card-body">
                                  <h5 class="card-title">{{ $imagen->titulo }}</h5>
                                  <h6 class="card-subtitle mb-2 text-body-secondary">Motivo: {{$imagen->motivo_ban}}</h6>
                              </div>

                              <form method="POST" action="{{ route('imagenes.destroy', $imagen->id) }}">
                                  @method('delete')
                                  @csrf
                                  <div class="footer">
                                      <button type="submit" class="btn btn-danger mx-2">Borrar imagen</button>
                                      <a href="{{ route('imagenes.edit', $imagen->id) }}" class="btn btn-dark btn mx-2">Editar imagen</a>
                                  </div>
                              </form>
                          </div>
                      </div>
                  @endif
              @endforeach
            @endif
          @endforeach
        </div>
     </div>
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
