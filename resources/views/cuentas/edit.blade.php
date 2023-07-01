<!DOCTYPE html>
<html>
<head>
  <title>Crear cuenta</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body {
      background-image: url('{{asset("images/9cc591c7f397c5c79e3f00f606bdb927--artist-monet-cloude-monet.jpg") }}');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }
  </style>
  <style>
    
    .text-bordered {
      text-shadow: -2px -2px 0 #000, 2px -2px 0 #000, -2px 2px 0 #000, 2px 2px 0 #000;
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
                  @endif
                    <li><a class="dropdown-item text-black" href="{{ route('imagenban.index') }}">Banear</a></li>
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
      <h1 class="text-light text-bordered col-6">Editar cuenta</h1>
      @if ($errors->any())
        <div class="alert alert-danger">
            <p>Error:</p>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <form method="POST" action="{{route('cuentas.update',$cuenta->user)}}">
          @method('put');
          @csrf
          <label  class="text-light text-bordered" for="cuenta">Cuenta</label>

          <select type="text" id="cuenta" name="cuenta" class="form-control mt-3">
              <option value=1>{{$cuenta->user}}</option>
          </select>
          <div class="form-group">
              <label  class="text-light text-bordered" for="nombre">Nombre</label>
              <input type="text" id="nombre" name="nombre" class="form-control col-3 @error('nombre') is-invalid @enderror" value="{{$cuenta->nombre}}">
          </div>

          <div class="form-group">
              <label  class="text-light text-bordered" for="apellido">Apellido</label>
              <input type="text" id="apelido" name="apellido" class="form-control col-3 @error('apellido') is-invalid @enderror" value="{{ old('apellido') }}">
          </div>

          <div class="form-group">
              <label  class="text-light text-bordered" for="password">Contraseña</label>
              <input type="password" id="password" name="password" class="form-control col-3 @error('password') is-invalid @enderror">
          </div>

          <div class="form-group">
              <label class="text-light text-bordered" for="password2">Confirmar contraseña</label>
              <input type="password" id="password2" name="password2" class="form-control col-md @error('password') is-invalid @enderror">
          </div>

          <select type="text" id="perfil_id" name="perfil_id" class="form-control mt-3">
              <option value=1>Artista</option>
              <option value=2>Administrador</option>
          </select>
          
          <button type="submit" class="btn btn-danger mt-3">Editar cuenta</button>
          
      </form>
  </div>

</div>



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>

