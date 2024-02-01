<?php

namespace App\Http\Controllers;

use App\Models\Interesse;
use App\Http\Requests\StoreInteresseRequest;
use App\Http\Requests\UpdateInteresseRequest;

class InteresseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $interesses = Interesse::all();
        return $interesses;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInteresseRequest $request)
    {
        $validated = $request->validated();

        $interesse = Interesse::create($validated);
        return $interesse;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $interesse = Interesse::find($id);
        return $interesse;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInteresseRequest $request, int $id)
    {
        $interesse = Interesse::find($id);

        $validated = $request->validated();
        
        $interesse->update($validated);
        return $interesse;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $interesse = Interesse::find($id);
        $interesse->delete();
        return $interesse;
    }
}
