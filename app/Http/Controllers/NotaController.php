<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Profesor;

class NotaController extends Controller
{
    
    public function index()
    {
        $rango = Auth::user()->rango;
        if ($rango == "Administrador") {
            $notas = Nota::all(); // Obtener todos los registros de la tabla 'notas'
    
            return view('estudiantes.notas', compact('notas'));
        }

        $profesor = Auth::user()->name . ' ' . Auth::user()->lastname;
        $notas = Nota::all()->where('profesor', $profesor); // Obtener todos los registros de la tabla 'notas'
    
        return view('estudiantes.notas', compact('notas'));
    }
    function findAllProf()
    {
        $rango = Auth::user()->rango;
        if ($rango == "Administrador") {
            $materias = Profesor::all();

            return response()->json(['materias' => $materias]);
        }

        $profesor = Auth::user()->name . ' ' . Auth::user()->lastname;

        $materias = Profesor::all()->where('nombre_apellido', $profesor);
        return response()->json(['materias' => $materias]);
    }

    public function buscarNotas(Request $request)
    {
        try {
            $materia = $request->input('materia');
            $profesor = $request->input('profesor');
            // Realiza una comprobación para modificar la materia si es "IniciaciónMusical"
            if ($materia === "IniciaciónMusical") {
                $materia = "Iniciacion musical";
            }
            if ($materia === "LenguajeMusical") {
                $materia = "Lenguaje Musical";
            }

            // Realiza la consulta en la base de datos para obtener las notas
            $notas = Nota::where('materias', $materia)
                ->where('profesor', $profesor)
                ->get();

            // Devuelve la vista con los resultados
            return view('estudiantes.notas', ['notas' => $notas]);
        } catch (\Exception $e) {
            dd($e->getMessage()); // Imprime el mensaje de error en el navegador
        }
    }
    public function guardarNotas(Request $request)
    {
        try {
            // Obtén los datos enviados a través de la solicitud AJAX
            $datosActualizados = $request->input();

            // Recorre los datos y actualiza las notas en la base de datos
            foreach ($datosActualizados as $dato) {
                $nota = Nota::find($dato['id']);
                $nota->previa = $dato['previa'] ?? 0; // Establecer en 0 si es nulo
                $nota->tecnico = $dato['tecnico'] ?? 0; // Establecer en 0 si es nulo
                $nota->final = $dato['final'] ?? 0; // Establecer en 0 si es nulo
                $nota->definitiva = $dato['definitiva'] ?? 0; // Establecer en 0 si es nulo
                $nota->observacion = $dato['observacion'] ?? "";
                $nota->save();
            }

            return response()->json(['message' => 'Notas actualizadas con éxito']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500); // Devuelve el mensaje de error al cliente
        }
    }
}
