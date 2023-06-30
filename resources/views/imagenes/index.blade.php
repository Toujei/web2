<!DOCTYPE html>
<html>
<head>
    <title>Imágenes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('{{asset("images/5fa5383305a5c.png")}}');
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
                        @if($imagen->baneada == 0)
                            <div class="col-sm-4 d-flex">
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
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
