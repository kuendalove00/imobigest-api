<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Http\Requests\StoreContratoRequest;
use App\Http\Requests\UpdateContratoRequest;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contratos = Contrato::all();
        return $contratos;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContratoRequest $request)
    {
        $validated = $request->validated();

        $contrato = Contrato::create($validated);
        return $contrato;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $contrato = Contrato::find($id);
        return $contrato;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContratoRequest $request, int $id)
    {
        $contrato = Contrato::find($id);

        $validated = $request->validated();
        
        $contrato->update($validated);
        return $contrato;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $contrato = Contrato::find($id);
        $contrato->delete();
        return $contrato;
    }
}
