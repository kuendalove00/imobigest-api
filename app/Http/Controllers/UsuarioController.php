<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return $usuarios;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {
        $validated = $request->validated();

        /*if($validated->fails()){
            return response()->json([
                'status' => false,
                'messagem' => 'Erro de validação',
                'erros' => $validated->errors()
            ], 401);
        }*/

        $usuario = Usuario::create($validated);
        return response()->json([
            'status' => true,
            'messagem' => 'Usuario criado com sucesso',
            
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $usuario = Usuario::find($id);
        return $usuario;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, int $id)
    {
        $usuario = Usuario::find($id);

        $validated = $request->validated();
        
        $usuario->update($validated);
        return $usuario;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        return $usuario;
    }
}
