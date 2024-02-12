<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTecnicoRequest;
use App\Http\Requests\UpdateTecnicoRequest;
use App\Models\Tecnico;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tecnicos = Tecnico::all();
        return $tecnicos;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTecnicoRequest $request)
    {
        $validated = $request->validated();

        $tecnico = Tecnico::create($validated);
        return $tecnico;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $tecnico = Tecnico::find($id);
        return $tecnico;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTecnicoRequest $request, int $id)
    {
        $tecnico = Tecnico::find($id);

        $validated = $request->validated();
        
        $tecnico->update($validated);
        return $tecnico;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $tecnico = Tecnico::find($id);
        $tecnico->delete();
        return $tecnico;
    }
}
