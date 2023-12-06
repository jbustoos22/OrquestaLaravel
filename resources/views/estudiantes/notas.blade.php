<!doctype html>
<html lang="en">

<head>
  <title>Orquesta</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  

</head>

<body>
  <header class="container">
    <!-- Navbar content here -->
  </header>
  
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
                                <i class="fs-4 bi-house"></i> <span class="ms-1  d-sm-inline text-white">Estudiantes</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('notas.index') }}"  class="nav-link px-0 align-middle" id="pedidos-terminados-link">
                                <i class="fs-4 bi-table"></i> <span class="ms-1  d-sm-inline text-white">Notas</span>
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
                    
                    <a id="salir" class="btn btn-primary" href="/logout" role="button">Salir</a>
                </div>
            </div>
           <div class="container" style="max-width: 80%; overflow-x: auto;">

<h1 class="mt-4">Notas</h1>
<button onclick="test()">Generate PDF</button>

    <form method="POST" action="{{ route('notas.buscar') }}">
    @csrf
    
    @if (Auth::user()->rango == "Administrador")
    <select id="2" name="materia" class="custom-select px-4" style="height: 47px;">
        <option selected>Materias</option>
        <option value="IniciaciónMusical">Iniciación Musical</option>
        <option value="LenguajeMusical">Lenguaje Musical</option>
        <option value="Guitarra">Guitarra</option>
        <option value="Viola">Viola</option>
        <option value="Piano">Piano</option>
        <option value="Violín">Violín</option>
        <option value="Percusión">Percusión</option>
        <option value="Mandolina">Mandolina</option>
        <option value="Tuba">Tuba</option>
        <option value="Cuatro">Cuatro</option>
        <option value="Flauta">Flauta</option>
        <option value="Violonchello">Violonchelo</option>
        <option value="Contrabajo">Contrabajo</option>
        <option value="Trompeta">Trompeta</option>
        <option value="Saxofón">Saxofón</option>
        <option value="Clarinete">Clarinete</option>
        <option value="Soloprácticasdeorquesta">Solo prácticas de orquesta</option>
        <option value="Fagot">Fagot</option>
        <option value="Coro">Coro</option>
        <option value="Oboe">Oboe</option>

    </select>
    @endif
    @if (Auth::user()->rango != "Administrador")        
    <select id="materiaSelect2" name="materia" class="custom-select px-4" style="height: 47px;">
        <option selected>Materias</option>
    </select>
    @endif

    @if (Auth::user()->rango == "Administrador")
        <!-- Segundo elemento select -->
        <select id="profesorSelect" name="profesor" class="custom-select px-4" style="height: 47px;">
            <option selected>Profesores</option>
            <!-- Las opciones de profesores se agregarán dinámicamente aquí -->
        </select>
    @endif

    @if (Auth::user()->rango != "Administrador")
        <select id="profesorSelect2" name="profesor" class="custom-select px-4" style="height: 47px;" hidden>
            <option selected>Profesores</option>
            <!-- Las opciones de profesores se agregarán dinámicamente aquí -->
        </select>
    @endif
    <button type="submit">Buscar</button>
</form>


    <button id="actualizarBDButton" class="btn btn-success mt-3">Guardar Cambios</button>

    <br><br>

    <table class="table table-bordered" id="tablaResultados">
      <tr style="page-break-inside: avoid;">
        <th style="display: none;">ID</th>
        <th>Nombre</th>
        <th>Previa</th>
        <th>Examen Técnico</th>
        <th>Examen Final</th>
        <th>Definitiva</th>
        <th>Observación</th>
        <th>Acciones</th>
      </tr>

      
      <!-- Itera sobre los datos de las notas y muestra cada fila en la tabla -->
      @foreach ($notas as $nota)
      <tr>
        <td style="display: none;">{{ $nota->id }}</td>
        <td>{{ $nota->nombre }}</td>
        <td contenteditable="true" class="numeric">{{ $nota->previa }}</td>
        <td contenteditable="true" class="numeric">{{ $nota->tecnico }}</td>
        <td contenteditable="true" class="numeric">{{ $nota->final }}</td>
        <td>{{ $nota->definitiva }}</td>
        <td contenteditable="true">{{ $nota->observacion }}</td>
        <td>
      <button class="btn btn-primary calcular-btn">Actualizar</button>
    </td>
      </tr>
      @endforeach
    </table>
            
            </div>
        </div>
    </div>
  

    

  <footer class="container mt-3">
    <!-- Footer content here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="{{ asset('js/notas.js') }}"></script>
  <script src="{{ asset('js/html2pdf.bundle.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    const profesorSelect2 = document.getElementById("profesorSelect2");
    var band = 0;
    axios.get('/obtener-materia')
    .then(function (response) {
        // Borra las opciones actuales del select
        const select2 = document.getElementById('materiaSelect2');
        select2.innerHTML = ''; // Borra las opciones actuales del select
        profesorSelect2.innerHTML = ''; // Borra las opciones actuales del select

        // Itera a través de las materias obtenidas y agrega cada una como una opción del select
        for (const profesorId in response.data.materias) {
            const materia = response.data.materias[profesorId].materia;
            const profesor = response.data.materias[profesorId].nombre_apellido;
            const option = document.createElement('option');
            option.value = materia;
            option.textContent = materia;
            const option2 = document.createElement('option');
            option2.value = profesor;
            option2.textContent = profesor;
            select2.appendChild(option);
            if (band == 0) {
                profesorSelect2.appendChild(option2);
                band = 1;
            }
        }
    })
    .catch(function (error) {
        console.error('Error al obtener las materias', error);
    });

  </script>
<style>
  /* Aplicar este estilo para evitar que las filas se dividan entre páginas en el PDF. */
  #tablaResultados tr {
    page-break-inside: avoid;
  }
</style>
</body>

</html>