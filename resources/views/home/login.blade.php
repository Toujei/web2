<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Iniciar sesión</title>
  <style>
    body {
      background-image: url('{{asset("images/fotografia2-e1537978531632.jpg")}}');
      background-size: cover;
      background-position: center;
    }
    .card {
      margin-top: 150px;
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
          <ul>
        </div>
      </div>
    </nav>
  </div>

  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Iniciar sesión</h5>
                @if ($errors->any())
                  <div class="alert alert-warning">
                      @foreach ($errors->all() as $error)
                      {{ $error }}
                      @endforeach
                  </div>
                @endif
                <form method="POST" action="{{route('cuentas.acceso')}}">
                  @csrf

                  <div class="form-group">
                    <label for="user">Usuario</label>
                    <input type="text" id="user" name="user" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" class="form-control">
                  </div>

                  <button type="submit" class="btn btn-danger">Iniciar sesión</button>
                </form>
              </div>
            </div>
          </div>
      </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
