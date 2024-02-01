<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use App\Http\Requests\StoreImovelRequest;
use App\Http\Requests\UpdateImovelRequest;

class ImovelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $imoveis = Imovel::all();
        return $imoveis;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImovelRequest $request)
    {
        $validated = $request->validated();

        $avaliacao = Imovel::create($validated);
        return $avaliacao;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $imovel = Imovel::find($id);
        return $imovel;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImovelRequest $request, int $id)
    {
        $imovel = Imovel::find($id);

        $validated = $request->validated();
        
        $imovel->update($validated);
        return $imovel;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $imovel = Imovel::find($id);
        $imovel->delete();
        return $imovel;
    }
}
