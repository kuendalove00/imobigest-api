<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\ClienteImovel;
use App\Models\Contrato;
use App\Models\Imovel;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ImoveisController extends Controller
{
    public function index() {
        if (\request()->has('slug')){
            $slug = \request()->get('slug');
            return Imovel::where('slug', $slug)->first();
        }
        return Imovel::all();
    }

    public function interesse() {
        try {
            $cliente = Usuario::with("cliente")->where("email", \request()->get('email'))->first();
            $imovel = Imovel::findOrFail(\request()->get('imovel_id'));
            ClienteImovel::create([
                "cliente_id" => $cliente->cliente->id,
                "imovel_id" => $imovel->id
            ]);
            return response()->json(["success" => true]);
        } catch (\Exception $exception){
            return response()->json(["success" => false, "msg" => $exception->getMessage()], 400);
        }

    }

    public function bySlug($slug) {
        $imovel = Imovel::where('slug', $slug)->first();
        if ($imovel){
            return $imovel;
        }else {
            return [];
        }
    }
}
