<!DOCTYPE html>
<html>
<head>
    <title>Subir imágenes</title>
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
  <div class="modal fade" id="borrarModal{{$imagen->id}}" tabindex="-1" aria-labelledby="borrarModalLabel{{$imagen->id}}" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="borrarModalLabel{{$imagen->id}}">Consulta de seguridad</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="POST" action="{{route('imagenes.banear',$imagen->id)}}">
                  @method('put')
                  @csrf
                  <div class="modal-body">
                      ¿Banear la imagen <span class="text-danger fw-bold">{{$imagen->titulo}}</span>?
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-danger">Banear imagen</button>
                  </div>
              </form>
          </div>
      </div>
    </div>

    <div class="container">
        <div class="card card-center">
            <div class="card-body">
                <h1 class="card-title">Baneos</h1>
                <form method="POST" action="{{route('imagenes.banear', $imagen->id)}}">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="motivo_ban" class="form-label">Motivo ban</label>
                        <input type="text" id="motivo_ban" name="motivo_ban" class="form-control">
                    </div>

                    <div class="mb-3">
                        <span>{{$imagen->titulo}}</span>
                    </div>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#borrarModal{{$imagen->id}}">Subir</button>
               </form>
            </div>
        </div>
    </div>

   
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
