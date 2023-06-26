<!DOCTYPE html>
<html>
<head>
    <title>Imágenes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url("images/guns-n-roses-estadio-nacionaljpg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .navbar {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            margin-bottom: 20px;
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

    <form action="{{ route('imagenes.index') }}" method="GET">
        <select id="imagen" name="artista" class="form-control" onchange="this.form.submit()">
            @foreach($artistas as $artista)
                <option value="{{ $artista->user }}" @if(request('artista') == $artista->user) selected @endif>{{ $artista->user }}</option>
            @endforeach
        </select>
    </form>

    <div class="container">
        <div class="row">
            @foreach ($artistas as $artista)
                @if ($artista->user == request('artista'))
                    @foreach ($artista->imagenes as $imagen)
                        <div class="col-sm-4 d-flex">
                            <div class="card flex-fill custom-card">
                                <img src="{{ asset('storage/' . $imagen->archivo) }}" class="card-img-top" alt="Imagen">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $imagen->titulo }}</h5>
                                </div>

                                <form method="POST" action="{{ route('imagenes.destroy', $imagen->id) }}">
                                    @method('delete')
                                    @csrf
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Borrar imagen</button>
                                        &nbsp;
                                        &nbsp;
                                        <a href="{{ route('imagenes.edit', $imagen->id) }}" class="btn btn-dark btn">Editar imagen</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
