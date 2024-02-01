<?php

namespace App\Http\Controllers;

use App\Models\Notificacao;
use App\Http\Requests\StoreNotificacaoRequest;
use App\Http\Requests\UpdateNotificacaoRequest;

class NotificacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notificacoes = Notificacao::all();
        return $notificacoes;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotificacaoRequest $request)
    {
        $validated = $request->validated();

        $notificacao = Notificacao::create($validated);
        return $notificacao;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $notificacao = Notificacao::find($id);
        return $notificacao;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotificacaoRequest $request, int $id)
    {
        $notificacao = Notificacao::find($id);

        $validated = $request->validated();
        
        $notificacao->update($validated);
        return $notificacao;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $notificacao = Notificacao::find($id);
        $notificacao->delete();
        return $notificacao;
    }
}
