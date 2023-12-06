<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all()->sortByDesc('id');
        return view('users.index', compact('usuarios'));
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'password' => 'nullable|string|max:255'
        ]);

        
        $data = $request->all();
        User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return redirect()->route('users.index')
            ->with('success', 'Usuario creado exitosamente.');
    }
}
