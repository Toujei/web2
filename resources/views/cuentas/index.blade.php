<!DOCTYPE html>
<html>
<head>
  <title>Cuentas listadas</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
    body {
      background-image: url("images/guns-n-roses-estadio-nacional.jpg");
      background-size: cover;

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

<div class="container">
  <h1>Tabla de 3 columnas</h1>

  <table class="table table-bordered table-striped table-hover table-light">
    <thead>
      <tr>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Perfil</th>
        <th>Nro. Cuenta</th>
        <th>Configuracion</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cuentas as $list=> $cuenta)
        
      <tr>
        <td class="align-middle">{{ $cuenta->user }}</td>
        <td class="align-middle">{{ $cuenta->nombre }}</td>
        <td class="align-middle">{{ $cuenta->apellido}}</td>
        <td class="align-middle">{{ $cuenta->perfil->nombre}}</td>
        <td class="align-middle">{{ $list+1}}</td>
        <td class="align-middle">
            <div class="modal fade" id="borrarModal{{$cuenta->user}}" tabindex="-1" aria-labelledby="borrarModalLabel{{$cuenta->user}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="borrarModalLabel{{$cuenta->user}}">Consulta de seguridad</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{route('cuentas.destroy',$cuenta->user)}}">
                            @method('delete')
                            @csrf
                            <div class="modal-body">
                                ¿Borrar la cuenta <span class="text-danger fw-bold">{{$cuenta->user}}</span>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger">Borrar Cuenta</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            
            <button type="button" class="btn btn-sm mx-2 btn-danger @if(Auth::user()->user==$cuenta->user) disabled @endif" data-bs-toggle="modal" data-bs-target="#borrarModal{{$cuenta->user}}">
                <span class="material-icons">delete</span>
            </button>
              
            <a href="{{route('cuentas.edit',$cuenta->user)}}" class="btn btn-sm btn-dark" data-bs-toggle="tooltip" data-bs-title="Editar imagen">
                <span class="material-icons">edit</span>
            </a>
             
          
        </td>
      </tr>
      @endforeach
  
    </tbody>
  </table>

</div>



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>

