<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUsuarioRequest;

use function Laravel\Prompts\alert;

class AuthController extends Controller
{
    //

    public function registar(StoreUsuarioRequest $request)
    {
        $validated = $request->validated();

        if($validated->fails()){
            return response()->json([
                'status' => false,
                'messagem' => 'Erro de validação',
                'erros' => $validated->errors()
            ], 401);
        }

        $usuario = Usuario::create($validated);
        return response()->json([
            'status' => true,
            'messagem' => 'Usuario criado com sucesso',
            
        ], 200);
    }

    public function login(Request $request)
    {

        $credenciais = $request->only('email', 'password');
        
        if(!$token = Auth::attempt($credenciais)){
            return response()->json([
                'status' => false,
                'erro' => 'Credenciais Invalidas'
            ], 401);
        }        

        $usuario = Usuario::where('email', $request->email)->first();

        return response()->json([
            'status' => true,
            'messagem' => 'Usuario criado com sucesso',
            'data'=> [
                'token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ]
        ], 200);
    }

    public function logout()
    {

    }
}
