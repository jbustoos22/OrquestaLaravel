<!doctype html>
<html lang="en">

<head>
    <title>Orquesta</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <meta name="csrf-token" content="tu-token-csrf-aqui">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100" >
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
                        <!-- Agrega más enlaces aquí -->
                    </ul>
                    <hr>
                </div>
                <a id="salir" class="btn btn-primary" href="/logout" role="button">Salir</a>
            </div>
            <div class="container" style="max-width: 80%; overflow-x: auto;">


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
            Agregar estudiantes
        </button>
<br><br>
        <!-- Modal -->
        <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="{{ route('estudiantes.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="Nombre" class="form-label">Nombre:</label>
                                    <input type="text" name="Nombre" id="Nombre" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Genero" class="form-label">Género:</label>
                                    <select name="Genero" id="Genero" class="form-select">
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="Cedula" class="form-label">Cédula:</label>
                                    <input type="text" name="Cedula" id="Cedula" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="Fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                                    <input type="date" name="Fecha_nacimiento" id="Fecha_nacimiento" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="Instrumento" class="form-label">Instrumento:</label>
                                    <input type="text" name="Instrumento" id="Instrumento" class="form-control">
                                </div>
                                
                                <div id="materiasContainer">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#materiaModal">Agregar Materia Teórica</button>
                                    </div>
                                    <!-- Aquí se mostrarán las materias agregadas dinámicamente -->
                                </div>

                                <div id="catedrasContainer">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#catedraModal">Agregar Catedra</button>
                                    </div>
                                    <!-- Aquí se mostrarán las materias agregadas dinámicamente -->
                                </div>

                                <div class="mb-3" style="display: none;">
                                <label for="Materias_teoricas[]">Materias Teóricas:</label>
    <input type="text" name="Materias_teoricas[]" id="Materias_teoricas">
                                </div>
                                <div class="mb-3" style="display: none;">
                                    <label for="Tutor_teorico[]" class="form-label">Tutor Teórico:</label>
                                    <input type="text" name="Tutor_teorico[]" id="Tutor_teorico" class="form-control">
                                </div>
                                <div class="mb-3" style="display: none;">
                                    <label for="Catedras[]" class="form-label">Cátedras:</label>
                                    <input type="text" name="Catedras[]" id="Catedras" class="form-control">
                                </div>
                                <div class="mb-3" style="display: none;">
                                    <label for="Tutor_catedras[]" class="form-label">Tutor Cátedras:</label>
                                    <input type="text" name="Tutor_catedras[]" id="Tutor_catedras" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="Nombre_representante" class="form-label">Nombre del Representante:</label>
                                    <input type="text" name="Nombre_representante" id="Nombre_representante" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="Ocupacion_representante" class="form-label">Ocupación del Representante:</label>
                                    <input type="text" name="Ocupacion_representante" id="Ocupacion_representante" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="Parentesco" class="form-label">Parentesco con el Estudiante:</label>
                                    <input type="text" name="Parentesco" id="Parentesco" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="Cedula_representante" class="form-label">Cédula del Representante:</label>
                                    <input type="text" name="Cedula_representante" id="Cedula_representante" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="Telefono_estudiantes" class="form-label">Teléfono del Estudiante:</label>
                                    <input type="text" name="Telefono_estudiantes" id="Telefono_estudiantes" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="Telefono_representante" class="form-label">Teléfono del Representante:</label>
                                    <input type="text" name="Telefono_representante" id="Telefono_representante" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="Nombre_emergencia" class="form-label">Nombre en Caso de Emergencias:</label>
                                    <input type="text" name="Nombre_emergencia" id="Nombre_emergencia" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="Numero_emergencia" class="form-label">Número en Caso de Emergencias:</label>
                                    <input type="text" name="Numero_emergencia" id="Numero_emergencia" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="Correo_electronico" class="form-label">Correo Electrónico:</label>
                                    <input type="email" name="Correo_electronico" id="Correo_electronico" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="Direccion" class="form-label">Dirección:</label>
                                    <input type="text" name="Direccion" id="Direccion" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="Fecha_ingreso" class="form-label">Fecha de Ingreso:</label>
                                    <input type="date" name="Fecha_ingreso" id="Fecha_ingreso" class="form-control">
                                </div>
                                <!-- Agrega más campos según tus necesidades -->

                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Guardar Estudiante</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <h1>Lista de Estudiantes</h1>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Cedula</th>
                        <th>Tutor</th>
                        <th>Materias Teóricas</th>
                        <th>Tutor Cátedras</th>
                        <th>Cátedras</th>
                        <!-- Agrega más encabezados de columna según tus campos -->
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estudiantes as $estudiante)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $estudiante->Nombre }}</td>
                        <td>{{ $estudiante->Cedula }}</td>
                        <td>{{ $estudiante->Tutor_teorico }}</td>
                        <td>{{ $estudiante->Materias_teoricas }}</td>
                        <td>{{ $estudiante->Tutor_catedras }}</td>
                        <td>{{ $estudiante->Catedras }}</td>
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
    </div>

   





    <script>
        var modalId = document.getElementById('modalId');

        modalId.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            let button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            let recipient = button.getAttribute('data-bs-whatever');

            // Use above variables to manipulate the DOM
        });
    </script>


    <!-- Modal para agregar materia teórica -->
    <div class="modal fade" id="materiaModal" tabindex="-1" role="dialog" aria-labelledby="materiaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="materiaModalLabel">Agregar Materia Teórica</h5>
                    <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#modalId" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Aquí coloca tus campos de selección de materia y profesor -->
                    <label for="materia">Materia:</label>
                    <select class="form-select" id="materia">
                        <option value="IniciaciónMusical">Iniciación Musical</option>
                        <option value="LenguajeMusical">Lenguaje Musical</option>
                        <!-- Agrega más opciones aquí -->
                    </select>
                    <label for="profesor">Profesor:</label>
                    <input type="text" class="form-control" id="profesor">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalId">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarMateria()" data-bs-toggle="modal" data-bs-target="#modalId">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="catedraModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#modalId" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <!-- Aquí coloca tus campos de selección de materia y profesor -->
                        <label for="materia">Materia:</label>
                        <select class="form-select" id="catedra">
                            <option value="Guitarra">Guitarra</option>
                            <option value="Viola">Viola</option>
                            <option value="Piano">Piano</option>
                            <option value="Violín">Violín</option>
                            <option value="Percusión">Percusión</option>
                            <option value="Mandolina">Mandolina</option>
                            <option value="Tuba">Tuba</option>
                            <option value="Cuatro">Cuatro</option>
                            <option value="Flauta">Flauta</option>
                            <option value="Violonchello">Violonchello</option>
                            <option value="Contrabajo">Contrabajo</option>
                            <option value="Trompeta">Trompeta</option>
                            <option value="Saxofón">Saxofón</option>
                            <option value="Clarinete">Clarinete</option>
                            <option value="Soloprácticasdeorquesta">Solo prácticas de orquesta</option>
                            <option value="Fagot">Fagot</option>
                            <option value="Coro">Coro</option>
                            <option value="Oboe">Oboe</option>
                            <!-- Agrega más opciones aquí -->
                        </select>
                        <label for="profesor">Profesor:</label>
                        <input type="text" class="form-control" id="profesorCatedra">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalId">Close</button>
                    <button type="button" class="btn btn-primary" onclick="agregarCatedra()" data-bs-toggle="modal" data-bs-target="#modalId">Save</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <!-- place footer here -->
    </footer>
    <script>
        var teoricasArray = [];
        var tutorteoricasArray = [];
        var catedrasArray = [];
        var tutorcatedrasArray = [];


        function agregarMateria() {
            // Aquí puedes obtener los valores de la materia y el profesor del modal
            var selectElement = document.getElementById("materia");
            var materia = selectElement.options[selectElement.selectedIndex].text;
            var profesor = document.getElementById("profesor").value;
            
            // Agregar el objeto al array
            teoricasArray.push(materia);
            tutorteoricasArray.push(profesor);


            // Crear un nuevo elemento HTML para mostrar la materia agregada
            var nuevaMateria = document.createElement("div");
            nuevaMateria.innerHTML = "<p><strong>Materia:</strong> " + materia + ", <strong>Profesor:</strong> " + profesor + "</p>";

            // Agregar el nuevo elemento al contenedor de materias
            var materiasContainer = document.getElementById("materiasContainer");
            materiasContainer.appendChild(nuevaMateria);

            // Cerrar el modal
            var modal = new bootstrap.Modal(document.getElementById("materiaModal"));
            modal.hide();
            
            // Actualizar los campos de entrada de materias teóricas
            document.getElementById('Materias_teoricas').value = teoricasArray.join(',');
            document.getElementById('Tutor_teorico').value = tutorteoricasArray.join(',');
        }

        function agregarCatedra() {
            // Aquí puedes obtener los valores de la cátedra y el profesor del modal
            var catedra = document.getElementById("catedra").value;
            var profesor = document.getElementById("profesorCatedra").value;

            catedrasArray.push(catedra);
            tutorcatedrasArray.push(profesor);

            // Crear un nuevo elemento HTML para mostrar la cátedra agregada
            var nuevaCatedra = document.createElement("div");
            nuevaCatedra.innerHTML = "<p><strong>Cátedra:</strong> " + catedra + ", <strong>Profesor:</strong> " + profesor + "</p";

            // Agregar el nuevo elemento al contenedor de cátedras
            var catedrasContainer = document.getElementById("catedrasContainer");
            catedrasContainer.appendChild(nuevaCatedra);

            // Cerrar el modal
            var modal = new bootstrap.Modal(document.getElementById("catedraModal"));
            modal.hide();
            document.getElementById('Catedras').value = catedrasArray.join(',');
            document.getElementById('Tutor_catedras').value = tutorcatedrasArray.join(',');
        }

        /*// Agrega un evento click al botón "Save" del modal
        document.getElementById('guardarDatos').addEventListener('click', function () {

                // Crea un objeto que contiene todos los datos a enviar al servidor
                var datos = {
                    Nombre: "John Doe",
                    Genero: "masculino",
                    Cedula: "123456789",
                    Fecha_nacimiento: "1990-01-01",
                    Instrumento: "si",
                    Materias_teoricas: "Matemáticas",
                    Tutor_teorico: "Tutor Matemáticas",
                    Catedras: "Catedra 1",
                    Tutor_catedras: "Tutor Catedra 1",
                    Nombre_representante: "Jane Doe",
                    Cedula_representante: "987654321",
                    Telefono_estudiantes: "555-123-4567",
                    Telefono_representante: "555-123-4567",
                    Ocupacion_representante: "Docente",
                    Parentesco: "Madre",
                    Numero_estudiante: "12345",
                    Nombre_emergencia: "Emergencia",
                    Numero_emergencia: "555-999-8888",
                    Correo_electronico: "john@example.com",
                    Direccion: "123 Main St",
                    Fecha_ingreso: "2022-01-01"
                };

                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Utiliza la función route para generar la URL completa


        // Realizar una solicitud AJAX para enviar los datos al servidor
        // Realizar una solicitud AJAX para enviar los datos al servidor
        $.ajax({
            type: "POST",
            url: "{{ route('estudiantes.store') }}",
            data: datos,
            headers: {
                'X-CSRF-TOKEN': csrfToken, // Incluye el token CSRF en los encabezados de la solicitud
            },
            success: function (response) {
                // Manejar la respuesta del servidor si es necesario
                console.log(response);
            },
            error: function (error) {
                // Manejar errores si la solicitud no se realiza correctamente
                console.error("Error:", error);
            }
        });
            });*/
    </script>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>