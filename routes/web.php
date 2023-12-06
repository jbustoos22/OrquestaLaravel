<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|

Route::get('/', function () {
    return view('home');
});
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/index', [HomeController::class, 'index'])->name('home');
    Route::get('/', [EstudianteController::class, 'index'])->name('estudiantes.index');
    Route::get('/notas', [NotaController::class, 'index'])->name('notas.index');
    Route::post('/notas/buscar',[NotaController::class, 'buscarNotas'])->name('notas.buscar');
    Route::post('/notas/guardar-notas', [NotaController::class, 'guardarNotas'])->name('guardarNotas');
    Route::get('/obtener-materia',[NotaController::class, 'findAllProf'])->name('obtenerMaterias');
    Route::post('/estudiantes/nuevo',[EstudianteController::class, 'store'])->name('estudiantes.store');
    Route::post('/estudiantes/eliminar',[EstudianteController::class, 'destroy'])->name('estudiantes.destroy');
    Route::get('/users',[UserController::class, 'index'])->name('users.index');
    Route::post('/users/store',[UserController::class, 'store'])->name('users.store');
    Route::post('/users/eliminar',[UserController::class, 'destroy'])->name('users.destroy');
});

Route::get('/login',[LoginController::class, 'index'])->name('login.index');

Route::post('/login/procesar',function(){
    $credenciales = request()->only('email', 'password');

    if (Auth::attempt($credenciales)) {
        request()->session()->regenerate();

        return redirect()->route('home')
        ->with('success', 'Ingreso correcto');
    }

    return redirect('/login');
});

Route::get('/logout',function(){
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
});

