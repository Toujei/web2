<!DOCTYPE html>
<html>
<head>
    <title>Imágenes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Imágenes</a>
    </nav>

    <div class="container">
        <div class="row">
            @foreach ($imagenes as $imagen)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset($imagen->archivo) }}" class="card-img-top" alt="Imagen">
                        <div class="card-body">
                            <h5 class="card-title">{{ $imagen->titulo }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
