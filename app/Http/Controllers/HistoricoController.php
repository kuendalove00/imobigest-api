<?php

namespace App\Http\Controllers;

use App\Models\Historico;
use App\Http\Requests\StoreHistoricoRequest;
use App\Http\Requests\UpdateHistoricoRequest;

class HistoricoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historico = Historico::all();
        return $historico;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHistoricoRequest $request)
    {
        $validated = $request->validated();

        $historico = Historico::create($validated);
        return $historico;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $historico = Historico::find($id);
        return $historico;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHistoricoRequest $request, int $id)
    {
        $historico = Historico::find($id);

        $validated = $request->validated();
        
        $historico->update($validated);
        return $historico;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $historico = Historico::find($id);
        $historico->delete();
        return $historico;
    }
}
