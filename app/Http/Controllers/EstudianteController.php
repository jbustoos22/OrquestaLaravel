<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Nota;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::all()->sortByDesc('id');
        return view('estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        return view('estudiantes.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'Nombre' => 'required|string|max:255',
        'Genero' => 'nullable|string|in:Masculino,Femenino,Otro',
        'Cedula' => 'nullable|string|max:255',
        'Fecha_nacimiento' => 'nullable|date',
        'Instrumento' => 'nullable|string|max:255',
        'Materias_teoricas' => 'array',
        'Tutor_teorico' => 'array', // Cambiar a array
        'Catedras' => 'array', // Cambiar a array
        'Tutor_catedras' => 'array', // Cambiar a array
        'Nombre_representante' => 'nullable|string|max:255',
        'Ocupacion_representante' => 'nullable|string|max:255',
        'Parentesco' => 'nullable|string|max:255',
        'Cedula_representante' => 'nullable|string|max:255',
        'Telefono_estudiantes' => 'nullable|string|max:255',
        'Telefono_representante' => 'nullable|string|max:255',
        'Nombre_emergencia' => 'nullable|string|max:255',
        'Numero_emergencia' => 'nullable|string|max:255',
        'Correo_electronico' => 'nullable|email|max:255',
        'Direccion' => 'nullable|string',
        'Fecha_ingreso' => 'nullable|date',
    ]);

    // Obtén los datos del formulario
    $data = $request->all();
    // Si los campos son arrays, únelos en cadenas separadas por comas
    if (is_array($request->input('Materias_teoricas'))) {
        $data['Materias_teoricas'] = implode(', ', $request->input('Materias_teoricas'));
    }

    if (is_array($request->input('Tutor_teorico'))) {
        $data['Tutor_teorico'] = implode(', ', $request->input('Tutor_teorico'));
    }

    if (is_array($request->input('Catedras'))) {
        $data['Catedras'] = implode(', ', $request->input('Catedras'));
    }

    if (is_array($request->input('Tutor_catedras'))) {
        $data['Tutor_catedras'] = implode(', ', $request->input('Tutor_catedras'));
    }

    Estudiante::create($data);
    $lastInsertId = Estudiante::latest()->first()->id;
    $estudiante = Estudiante::find($lastInsertId);

    // Divide las cadenas en materias y catedras por comas
    $materiasTeoricas = $request->input('Materias_teoricas');
    $tutorTeoricas = $request->input('Tutor_teorico');
    $catedras = $request->input('Catedras');
    $tutorCatedras = $request->input('Tutor_catedras');

    $materias = explode(',', $materiasTeoricas[0]);
    $tutores = explode(',', $tutorTeoricas[0]);
    $catedras_individual = explode(',', $catedras[0]);
    $tutores_catedra = explode(',', $tutorCatedras[0]);
   
    foreach ($materias as $key => $materia) {
        $tutorTeorico = $tutores[$key];
        if(!$materia==""){
        $nota = new Nota();
$nota->nombre = $estudiante->Nombre;
        $nota->id_estudiante = $lastInsertId;
        $nota->materias = $materia;
        $nota->profesor = $tutorTeorico;
        $nota->previa = 0;
        $nota->tecnico = 0;
        $nota->final = 0;
        $nota->definitiva = 0;
        $nota->observacion = '';
        $nota->save();
        }
    }


    foreach ($catedras_individual as $key => $catedra) {
        $tutorCatedra = $tutores_catedra[$key];
        if(!$catedra==""){

        
        $nota = new Nota();
        $nota->nombre = $estudiante->Nombre; // Asigna el nombre del estudiante
        $nota->id_estudiante = $lastInsertId;
        $nota->materias = $catedra;
        $nota->profesor = $tutorCatedra;
        $nota->previa = 0;
        $nota->tecnico = 0;
        $nota->final = 0;
        $nota->definitiva = 0;
        $nota->observacion = '';
        
        $nota->save();
    }
    
}
    return redirect()->route('estudiantes.index')
        ->with('success', 'Estudiante creado exitosamente.');
}
    public function show($id)
    {
        $estudiante = Estudiante::find($id);
        return view('estudiantes.show', compact('estudiante'));
    }

    public function edit($id)
    {
        $estudiante = Estudiante::find($id);
        return view('estudiantes.edit', compact('estudiante'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // Define las reglas de validación aquí
        ]);

        Estudiante::find($id)->update($request->all());

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante actualizado exitosamente.');
    }

    public function destroy($id)
    {
        Estudiante::find($id)->delete();

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante eliminado exitosamente.');
    }
    

    
}
