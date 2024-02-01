<?php

namespace App\Http\Controllers;

use App\Models\Manutencao;
use App\Http\Requests\StoreManutencaoRequest;
use App\Http\Requests\UpdateManutencaoRequest;
use App\Models\Interesse;

class ManutencaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manutencoes = Manutencao::all();
        return $manutencoes;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreManutencaoRequest $request)
    {
        $validated = $request->validated();

        $manutencao = Manutencao::create($validated);
        return $manutencao;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $interresse = Interesse::find($id);
        return $interresse;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateManutencaoRequest $request, int $id)
    {
        $manutencao = Manutencao::find($id);

        $validated = $request->validated();
        
        $manutencao->update($validated);
        return $manutencao;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $manutencao = Manutencao::find($id);
        $manutencao->delete();
        return $manutencao;
    }
}
