<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <title>Orquesta</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <meta name="csrf-token" content="tu-token-csrf-aqui">

    </head>
</head>

<body>
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/"
                    class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                    id="menu">
                    <li class="nav-item">
                        <a href="{{ route('estudiantes.index') }}" class="nav-link align-middle px-0"
                            id="mostrarPedidosEnProceso">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-sm-inline text-white">Estudiantes</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('notas.index') }}" class="nav-link px-0 align-middle"
                            id="pedidos-terminados-link">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-sm-inline text-white">Notas</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}" class="nav-link px-0 align-middle"
                            id="pedidos-terminados-link">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-sm-inline text-white">Usuarios</span>
                        </a>
                    </li>
                    <!-- Agrega más enlaces aquí -->
                </ul>
                <hr>

            </div>
        </div>
        <div class="container" style="max-width: 80%; overflow-x: auto;">

            <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <form action="{{ route('users.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nombre:</label>
                                        <input type="text" name="name" id="Nombre" class="form-control"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">Apellido:</label>
                                        <input type="text" name="lastname" id="Nombre" class="form-control"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Usuario:</label>
                                        <input type="text" name="email" id="Nombre" class="form-control"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Contraseña:</label>
                                        <input type="text" name="password" id="Nombre" class="form-control"
                                            required>
                                    </div>
                                    {{-- <div class="mb-3">
                            <label for="Genero" class="form-label">Género:</label>
                            <select name="Genero" id="Genero" class="form-select">
                                <option value="1">Profesor</option>
                                <option value="2">Administrador</option>
                                <option value="3">Director</option>
                            </select>
                        </div> --}}
                                    <!-- Agrega más campos según tus necesidades -->


                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container">
                <h1>Lista de Usuarios</h1>
                <table class="table table-bordered">
                    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
                        Agregar nuevo usuario
                    </button>
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Usuario</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuarios)
                            <tr>
                                <td>{{ $usuarios->id }}</td>
                                <td>{{ $usuarios->name }}</td>
                                <td>{{ $usuarios->lastname }}</td>
                                <td>{{ $usuarios->email }}</td>
                                <!-- Agrega más celdas de datos según tus campos -->
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="#" class="btn btn-primary">Editar</a>
                                        <a href="#" class="btn btn-danger">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>

</html>
