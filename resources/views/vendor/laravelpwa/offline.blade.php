@vite(['resources/css/swal2toast.css', 'resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="./css/app.css"/>
</head>
<body>
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
              Backlog Tracker
            </div>
        </div>
        <div class="d-grid gap-2 mt-3">
            <button class="btn btn-primary disabled" type="button" data-bs-toggle="modal" data-bs-target="#addGameModal">
                Añadir juego
            </button>
        </div>
        <div class="card mt-3">
            <div class="card-body text-bg-info d-flex justify-content-center">
              No hay conexión a internet
            </div>
        </div>
    </div>
</body>
</html>