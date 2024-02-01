<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use GuzzleHttp\Client;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return $clientes;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClienteRequest $request)
    {
        $validated = $request->validated();

        $cliente = Cliente::create($validated);
        return $cliente;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $cliente = Cliente::find($id);
        return $cliente;
    }

   /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteRequest $request, int $id)
    {
        $cliente = Cliente::find($id);

        $validated = $request->validated();
        
        $cliente->update($validated);
        return $cliente;
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return $cliente;
    }
}
