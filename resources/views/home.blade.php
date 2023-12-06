<!doctype html>
<html lang="en">

<head>
  <title>Index Notas</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>


<div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="{{ route('estudiantes.index') }}" class="nav-link align-middle px-0" id="mostrarPedidosEnProceso">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-sm-inline text-white">Estudiantes</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('notas.index') }}"  class="nav-link px-0 align-middle" id="pedidos-terminados-link">
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
                    <a class="btn btn-primary" href="/logout" role="button">Salir</a>
                </div>
            </div>
            <div class="container">
                <h1>Bienvenid@, {{ Auth::user()->name }} {{ Auth::user()->lastname }} {{ Auth::user()->rango }}</h1>
            </div>
        </div>
    </div>

   


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
