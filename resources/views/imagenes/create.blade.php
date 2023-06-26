<!DOCTYPE html>
<html>
<head>
    <title>Subir imágenes</title>
    <!-- Agrega los enlaces a los archivos CSS de Bootstrap -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('images/guns-n-roses-estadio-nacionaljpg.jpg');
            background-size: cover;
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
        <div class="card card-center">
            <div class="card-body">
                <h1 class="card-title">Subir imágenes</h1>
                <form method="POST" action="{{route('imagenes.store')}}" enctype="multipart/form-data">
                    @csrf
        
                    <div class="mb-3">
                        <label for="cuenta_user" class="form-label">Cuenta</label>
                        <input type="text" id="cuenta_user" name="cuenta_user" class="form-control" value="{{old('cuenta_user')}}">
                    </div>

                    <div class="mb-3">
                        <label for="titulo" class="form-label">titulo</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" value="{{old('titulo')}}">
                    </div>

                    <div class="form-group">
                        <label for="imagen">Selecciona una imagen:</label>
                        <input type="file" class="form-control-file" id="imagen" name="imagen">
                    </div>

                    <button type="submit" class="btn btn-primary">Subir</button>
                </form>
            </div>
        </div>
    </div>

   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>