<?php

namespace App\Http\Controllers;

use App\Models\Mecanico;
use App\Http\Requests\StoreMecanicoRequest;
use App\Http\Requests\UpdateMecanicoRequest;

class MecanicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mecanicos = Mecanico::all();
        return $mecanicos;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMecanicoRequest $request)
    {
        $validated = $request->validated();

        $mecanico = Mecanico::create($validated);
        return $mecanico;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $mecanico = Mecanico::find($id);
        return $mecanico;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMecanicoRequest $request, int $id)
    {
        $mecanico = Mecanico::find($id);

        $validated = $request->validated();
        
        $mecanico->update($validated);
        return $mecanico;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $mecanico = Mecanico::find($id);
        $mecanico->delete();
        return $mecanico;
    }
}
