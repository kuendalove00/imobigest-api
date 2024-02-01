<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Http\Requests\StoreVendaRequest;
use App\Http\Requests\UpdateVendaRequest;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendas = Venda::all();
        return $vendas;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVendaRequest $request)
    {
        $validated = $request->validated();

        $venda = Venda::create($validated);
        return $venda;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $venda = Venda::find($id);
        return $venda;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVendaRequest $request, int $id)
    {
        $venda = Venda::find($id);

        $validated = $request->validated();
        
        $venda->update($validated);
        return $venda;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $venda = Venda::find($id);
        $venda->delete();
        return $venda;
    }
}
