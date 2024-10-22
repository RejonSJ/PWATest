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
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addGameModal">
                Añadir juego <i class="fa-solid fa-circle-plus fa-fw"></i>
            </button>
        </div>
        <div class="row mt-3">
            @foreach ($games as $game)
            <div class="col-12">
                <div class="card mb-3" onclick="editar({{json_encode($game)}})">
                    <div class="row g-0">
                    <div class="col-sm-auto d-flex">
                        <img src="{{$game->image}}" class="img-fluid rounded custom-image">
                    </div>
                    <div class="col-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{$game->name}}</h5>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-12">
                                    @switch($game->review)
                                        @case('positive')
                                            <p class="card-text mb-0 text-success"><i class="fa-solid fa-thumbs-up fa-fw"></i> Positivo</p>
                                            @break
                                        @case('negative')
                                            <p class="card-text mb-0 text-danger"><i class="fa-solid fa-thumbs-down fa-fw"></i> Negativo</p>
                                            @break
                                        @default
                                            <p class="card-text mb-0 text-secondary"><i class="fa-solid fa-minus fa-fw"></i> Sin review</p>
                                    @endswitch
                                </div>
                                <div class="col-12 col-sm-6 col-md-12">
                                    @switch($game->status)
                                        @case('1')
                                            <p class="card-text mb-0 text-primary"><b><i class="fa-solid fa-square-check fa-fw"></i> Completado</b></p>
                                            @break
                                        @default
                                            <p class="card-text mb-0 text-secondary"><i class="fa-regular fa-square fa-fw"></i> Sin completar</p>
                                    @endswitch
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        {{ $games->links() }}
    </div>

    {{-- CREATE FORM --}}
    <form method="post" id="creategame" action="{{route('creategame')}}" autocomplete="off">
        @csrf
        <div class="modal fade" id="addGameModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="addGameModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar juego</h1>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3">
                            <label for="basic-url" class="form-label">Nombre</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="name-modal" name="name" placeholder="Ingresar nombre del juego">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="basic-url" class="form-label">Imagen</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="image-modal" name="image" placeholder="Ingresar url de la imagen">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
                </div>
            </div>
        </div>
    </form>

    {{-- DELETE FORM --}}
    <form method="post" id="deletegame" action="{{route('deletegame')}}" autocomplete="off">
        @method('POST')
        @csrf
        <input type="hidden" id="id-modal-delete" name="id">
    </form>

    {{-- PUT FORM --}}
    <button class="d-none" type="button" id="openEditModal" data-bs-toggle="modal" data-bs-target="#updateGameModal"></button>
    <form method="post" id="updategame" action="{{route('updategame')}}" autocomplete="off">
        @method('PUT')
        @csrf
        <div class="modal fade" id="updateGameModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="addGameModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar juego</h1>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id-modal-edit" name="id">
                    <div class="row">
                        <div class="mb-3">
                            <label for="basic-url" class="form-label">Nombre</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="name-modal-edit" name="name" placeholder="Ingresar nombre del juego">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="basic-url" class="form-label">Imagen</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="image-modal-edit" name="image" placeholder="Ingresar url de la imagen">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="basic-url" class="form-label">Review</label>
                            <div class="input-group">
                                <select class="form-control" id="review-modal-edit" name="review">
                                    <option value="none">Pendiente</option>
                                    <option value="positive">Positivo</option>
                                    <option value="negative">Negativo</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="basic-url" class="form-label">Estado</label>
                            <div class="input-group">
                                <select class="form-control" id="status-modal-edit" name="status">
                                    <option value="0">Pendiente</option>
                                    <option value="1">Completado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(Session::has('success'))
<script>
    Swal.fire({
        position: 'top-end',
        text: '{{$message = Session::get('success')}}',
        icon: 'success',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        toast: true,
        iconColor: 'white',
        customClass: {
            popup: 'colored-toast'
        },
    })
</script>
@endif
<script>
    function editar(game){
        document.getElementById('id-modal-edit').value = game.id;
        document.getElementById('name-modal-edit').value = game.name;
        document.getElementById('image-modal-edit').value = game.image;
        document.getElementById('review-modal-edit').value = game.review;
        document.getElementById('status-modal-edit').value = game.status;
        $('#openEditModal').click();
    }
    function eliminar(){
        id = document.getElementById('id-modal-edit').value;
        document.getElementById('id-modal-delete').value = id;
        document.getElementById("deletegame").submit();
    }
</script>