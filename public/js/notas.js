
 // Obtener los elementos select
 const materiaSelect = document.getElementById("materiaSelect");
 const profesorSelect = document.getElementById("profesorSelect");

 // Define un objeto con las opciones de profesores para cada estado
 const profesorMateria = {
    IniciaciónMusical: ["Victoria Gil"],
    LenguajeMusical: ["Adeliana Rangel", "Ana Mercado"],
    Percusión: ["Gustavo Rojas", "Leonardo Solano", "Jorge Rodriguez"],
    Piano: ["Joyce Medina", "Adeliana Rangel", "Jahaziel Hernandez", "Marta Infante"],
    Guitarra: ["Liliana Zerpa"],
    Viola: ["Joyce Medina"],
    Violín: ["Adeliana Rangel", "Gustavo Hernandez", "Victoria Gil"],
    Mandolina: ["Liliana Zerpa"],
    Tuba: ["Elik Sosa"],
    Cuatro: ["Liliana Zerpa"],
    Flauta: ["Gustavo Sierra", "Michelle Gutierrez"],
    Violonchello: ["Carmen Rodriguez"],
    Contrabajo: ["Gustavo Ruiz"],
    Trompeta: ["Ruben Ramirez"],
    Saxofón: ["Ricardo Vallegas", "Maikel Velasquez"],
    Clarinete: ["Ricardo Vallegas", "Maikel Velasquez"],
    Fagot: ["Alan Espinoza"],
    Coro: ["Maria Bethancour"],
    Oboe: ["Karla Almas"]
    // Agrega las opciones de profesores para cada estado aquí
};

 // Función para actualizar las opciones del segundo select
 function actualizarProfesores() {
     const materiaSeleccionado = materiaSelect.value;
     const profesores = profesorMateria[materiaSeleccionado] || [];

     // Borra las opciones actuales del segundo select
     profesorSelect.innerHTML = '<option selected>Profesor</option>';

     // Agrega las nuevas opciones del segundo select
     profesores.forEach((profesor) => {
         const option = document.createElement("option");
         option.value = profesor;
         option.textContent = profesor;
         profesorSelect.appendChild(option);
     });
 }

 // Agregar un evento de cambio al primer select
 materiaSelect.addEventListener("change", actualizarProfesores);

 // Inicializar el segundo select con las opciones predeterminadas
 actualizarProfesores();


 // Agrega un evento click a los botones "Calcular"
 document.querySelectorAll(".calcular-btn").forEach(function (boton) {
    boton.addEventListener("click", function () {
      hacerCalculo(this); // Llama a la función haciendo referencia al botón clicado
    });
  });

 function hacerCalculo(boton) {
 // Obtener la fila que contiene el botón presionado
 var fila = boton.parentNode.parentNode;

 // Obtener las celdas de "Previa", "Técnico" y "Final" en la misma fila
 var cellPrevia = fila.cells[2];
 var cellTecnico = fila.cells[3];
 var cellFinal = fila.cells[4];
 var cellDefinitiva = fila.cells[5]; // La celda de "Definitiva"

 // Obtener los valores de las celdas y convertirlos a números
 var previa = parseFloat(cellPrevia.textContent);
 var tecnico = parseFloat(cellTecnico.textContent);
 var final = parseFloat(cellFinal.textContent);

 // Verificar que los valores sean números válidos
 if (!isNaN(previa) && !isNaN(tecnico) && !isNaN(final)) {
     // Calcular la media de los valores y asignarla a la celda de "Definitiva"
     var definitiva = (previa * 0.49) + (tecnico * 0.21) + (final * 0.3);
     cellDefinitiva.textContent = definitiva.toFixed(2); // Mostrar solo 2 decimales
 } else {
     // Si algún valor no es válido, muestra un mensaje de error o realiza una acción adecuada
     alert("Los valores ingresados no son válidos");
 }
}
document.getElementById("actualizarBDButton").addEventListener("click", function() {
    guardarCambios();
});

function guardarCambios() {
    var tablaResultados = document.getElementById("tablaResultados");
    var datosActualizados = [];

    for (var i = 1; i < tablaResultados.rows.length; i++) {
        var fila = tablaResultados.rows[i];
        var cellID = fila.cells[0];
        var cellPrevia = fila.cells[2];
        var cellTecnico = fila.cells[3];
        var cellFinal = fila.cells[4];
        var cellDefinitiva = fila.cells[5];
        var cellObservacion = fila.cells[6];

        var id = cellID.textContent;
        var previa = cellPrevia.textContent.trim() || "0"; // Establecer en 0 si está vacío
        var tecnico = cellTecnico.textContent.trim() || "0"; // Establecer en 0 si está vacío
        var final = cellFinal.textContent.trim() || "0"; // Establecer en 0 si está vacío
        var definitiva = cellDefinitiva.textContent.trim() || "0"; // Establecer en 0 si está vacío
        var observacion = cellObservacion.textContent.trim() ||" ";

        // Validar que los campos no estén vacíos antes de agregarlos a los datos actualizados
        if (!isNaN(previa) && !isNaN(tecnico) && !isNaN(final) && !isNaN(definitiva)) {
            datosActualizados.push({
                id: id,
                previa: previa,
                tecnico: tecnico,
                final: final,
                definitiva: definitiva,
                observacion: observacion
            });
        }
    }

    // Realiza una solicitud AJAX al servidor para actualizar la base de datos
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/notas/guardar-notas", true); // Debes definir la ruta correcta en tu proyecto

    // Agrega el token CSRF al encabezado
    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    xhr.setRequestHeader("X-CSRF-TOKEN", token);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // Manejar la respuesta del servidor, si es necesario
                console.log("Base de datos actualizada con éxito.");
            } else {
                // Manejar errores si es necesario
                console.error("Error en la solicitud: " + xhr.status);
            }
        }
    };

    // Convierte los datos actualizados a JSON y envíalos al servidor
    var datosJSON = JSON.stringify(datosActualizados);
    xhr.send(datosJSON);
}


// Agregar un evento de entrada a las celdas con la clase "numeric"
document.querySelectorAll('.numeric').forEach(function(cell) {
    cell.addEventListener('input', function() {
        // Validar el contenido como número decimal
        var value = this.textContent;
        if (!/^\d*\.?\d*$/.test(value)) {
            // Si no es un número decimal válido, elimina el contenido no válido
            this.textContent = '';
        }
    });
});

function hideColumn(columnIndex) {
    // Obtener todas las filas de la tabla.
    var tableRows = document.getElementById('tablaResultados').rows;

    // Ocultar la columna especificada para cada fila.
    for (var i = 0; i < tableRows.length; i++) {
      tableRows[i].cells[columnIndex].style.display = 'none';
    }
  }
  function showColumn(columnIndex) {
    // Obtener todas las filas de la tabla.
    var tableRows = document.getElementById('tablaResultados').rows;

    // Mostrar la columna especificada para cada fila.
    for (var i = 0; i < tableRows.length; i++) {
      tableRows[i].cells[columnIndex].style.display = '';
    }
  }
  function test() {
    // Get the element.
    var tableElement = document.getElementById('tablaResultados');

    hideColumn(7);
    // Crear un elemento h1.
    var titleElement = document.createElement('h3');
    titleElement.textContent = 'Notas alumnos';

    // Crear un contenedor para el título y la tabla.
    var containerElement = document.createElement('div');
    containerElement.appendChild(titleElement);
    containerElement.appendChild(tableElement.cloneNode(true)); // Clonar la tabla para evitar manipular la original.


    // Generate the PDF.
    html2pdf().from(containerElement).set({
      margin: 5, // Margen solo en la parte superior (20 unidades)
      filename: 'test.pdf',
      html2canvas: { scale: 3 },
      jsPDF: { orientation: 'portrait', unit: 'mm', format: 'a4', compressPDF: false }
    }).save();
    showColumn(7);
    
  }
