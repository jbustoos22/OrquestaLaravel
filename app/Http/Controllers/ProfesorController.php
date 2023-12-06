<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    function findAllProf() {
        $rango = Auth::user()->rango;

        if ($rango == "Administrador") {
            $materias = Profesor::all();
            return response()->json(['materias' => $materias]);
        } else {
            $profesor = Auth::user()->name . ' ' . Auth::user()->lastname;
            $materias = Profesor::all()->where('nombre_apellido', $profesor);

            return response()->json(['materias' => $materias]);
        }
    }
}
