<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class ClienteController extends Controller
{
    public function store(Request $request)
    {
        $usuario = Usuario::create([
            "papel" => 4,
            "email" => $request->email,
            "password" => $request->password,
            "nome" => $request->nome
        ]);

        $cliente = Cliente::create([
            "nome" => $request->nome,
            "sobrenome" => $request->sobrenome,
            "data_nascimento" => $request->data_nascimento,
            "genero" => $request->genero,
            "telefone" => $request->telefone,
            "id_usuario" => $usuario->id
        ]);

        return response()->json(["success" => true, "data" => $cliente]);
    }
}
