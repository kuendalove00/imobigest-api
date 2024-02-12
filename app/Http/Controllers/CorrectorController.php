<?php

namespace App\Http\Controllers;

use App\Models\Corrector;
use App\Http\Requests\StoreCorrectorRequest;
use App\Http\Requests\UpdateCorrectorRequest;

class CorrectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $correctores = Corrector::with('usuario')->get();
        return $correctores;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCorrectorRequest $request)
    {
        $validated = $request->validated();

        $corrector = Corrector::create($validated);
        return $corrector;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $corrector = Corrector::with('usuario')->find($id);
        return response()->json($corrector);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCorrectorRequest $request, int $id)
    {
        $corrector = Corrector::find($id);

        $validated = $request->validated();
        
        $corrector->update($validated);
        return $corrector;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $corrector = Corrector::find($id);
        $corrector->delete();
        return $corrector;
    }
}
