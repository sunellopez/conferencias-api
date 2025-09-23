<?php

namespace App\Http\Controllers;

use App\Models\Conferencia;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ConferenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conferencias = Conferencia::all();
        return response()->json([
            'success' => true,
            'data' => $conferencias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_conferencia' => 'required|exists:conferencias,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
        ], [
            'email.unique' => 'El correo ya está registrado.',
        ]);

        $conferencia = Conferencia::find($request->id_conferencia);
        if (!$conferencia) {
            return response()->json(['success' => false, 'message' => 'Conferencia no encontrada'], 404);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'id_conferencia' => $conferencia->id,
            'password' => bcrypt('123456') // Asigna una contraseña por defecto
        ]);

        return response()->json(['success' => true, 'message' => 'Usuario registrado en la conferencia con éxito', 'data' => $user], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Conferencia $conferencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conferencia $conferencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conferencia $conferencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conferencia $conferencia)
    {
        //
    }

    public function inscritos($id)
    {
        $conferencia = Conferencia::with('inscritos')->find($id);
        if (!$conferencia) {
            return response()->json(['success' => false, 'message' => 'Conferencia no encontrada'], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $conferencia
        ]);
    }
}