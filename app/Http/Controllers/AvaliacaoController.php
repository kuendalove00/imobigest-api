<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Http\Requests\StoreAvaliacaoRequest;
use App\Http\Requests\UpdateAvaliacaoRequest;

use function Laravel\Prompts\alert;

class AvaliacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avaliacoes = Avaliacao::all();
        return $avaliacoes;
    }

    public function store(StoreAvaliacaoRequest $request)
    {
        $validated = $request->validated();

        $avaliacao = Avaliacao::create($validated);
        return $avaliacao;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $avaliacao = Avaliacao::find($id);
        return $avaliacao;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAvaliacaoRequest $request, int $id)
    {
        $avaliacao = Avaliacao::find($id);

        $validated = $request->validated();
        
        $avaliacao->update($validated);
        return $avaliacao;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $avaliacao = Avaliacao::find($id);
        $avaliacao->delete();
        return $avaliacao;
    }
}
