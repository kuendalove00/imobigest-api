<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use App\Models\Imovel;
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

    public function contrato () {
       $contrato = Contrato::crate();
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
